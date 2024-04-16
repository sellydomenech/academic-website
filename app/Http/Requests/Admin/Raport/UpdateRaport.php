<?php

namespace App\Http\Requests\Admin\Raport;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRaport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.raport.edit', $this->raport);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'student_id' => ['sometimes', 'integer'],
            'class_group_id' => ['sometimes', 'integer'],
            'given_in' => ['nullable', 'string'],
            'signed_at' => ['nullable', 'date'],
            'published' => ['sometimes', 'boolean'],
            'moral_religious' => ['nullable', 'string'],
            'social_emotion' => ['nullable', 'string'],
            'speaking' => ['nullable', 'string'],
            'cognitive' => ['nullable', 'string'],
            'physical' => ['nullable', 'string'],
            'art' => ['nullable', 'string'],
            'sick' => ['sometimes', 'integer'],
            'permission' => ['sometimes', 'integer'],
            'absence' => ['sometimes', 'integer'],
            'note' => ['nullable', 'string'],
            
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
