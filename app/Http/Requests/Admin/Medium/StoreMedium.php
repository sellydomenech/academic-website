<?php

namespace App\Http\Requests\Admin\Medium;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMedium extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.medium.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'model_type' => ['required', 'string'],
            'model_id' => ['required', 'string'],
            'uuid' => ['nullable', Rule::unique('media', 'uuid'), 'string'],
            'collection_name' => ['required', 'string'],
            'name' => ['required', 'string'],
            'file_name' => ['required', 'string'],
            'mime_type' => ['nullable', 'string'],
            'disk' => ['required', 'string'],
            'conversions_disk' => ['nullable', 'string'],
            'size' => ['required', 'string'],
            'order_column' => ['nullable', 'integer'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'manipulations' => ['required', 'string'],
            'custom_properties' => ['required', 'string'],
            'generated_conversions' => ['required', 'string'],
            'responsive_images' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
