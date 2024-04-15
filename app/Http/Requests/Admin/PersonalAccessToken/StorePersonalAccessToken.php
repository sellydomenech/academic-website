<?php

namespace App\Http\Requests\Admin\PersonalAccessToken;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePersonalAccessToken extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.personal-access-token.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tokenable_type' => ['required', 'string'],
            'tokenable_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'token' => ['required', Rule::unique('personal_access_tokens', 'token'), 'string'],
            'abilities' => ['nullable', 'string'],
            'last_used_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
            
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
