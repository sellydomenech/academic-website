<?php

namespace App\Http\Requests\Admin\Raport;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRaport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.raport.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'integer'],
            'class_group_id' => ['required', 'integer'],
            'given_in' => ['nullable', 'string'],
            'signed_at' => ['nullable', 'date'],
            'published' => ['required', 'boolean'],
            'moral_religious' => ['nullable', 'string'],
            'social_emotion' => ['nullable', 'string'],
            'speaking' => ['nullable', 'string'],
            'cognitive' => ['nullable', 'string'],
            'physical' => ['nullable', 'string'],
            'art' => ['nullable', 'string'],
            'sick' => ['required', 'integer'],
            'permission' => ['required', 'integer'],
            'absence' => ['required', 'integer'],
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
