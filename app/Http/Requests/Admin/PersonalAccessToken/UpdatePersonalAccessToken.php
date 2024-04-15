<?php

namespace App\Http\Requests\Admin\PersonalAccessToken;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePersonalAccessToken extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.personal-access-token.edit', $this->personalAccessToken);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tokenable_type' => ['sometimes', 'string'],
            'tokenable_id' => ['sometimes', 'string'],
            'name' => ['sometimes', 'string'],
            'token' => ['sometimes', Rule::unique('personal_access_tokens', 'token')->ignore($this->personalAccessToken->getKey(), $this->personalAccessToken->getKeyName()), 'string'],
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
