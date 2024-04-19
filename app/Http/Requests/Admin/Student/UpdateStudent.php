<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.student.edit', $this->student);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['sometimes', 'string'],
            'nick_name' => ['sometimes', 'string'],
            'registration_number' => ['nullable', 'string'],
            'gender' => ['sometimes', 'string'],
            'place_of_birth' => ['sometimes', 'string'],
            'date_of_birth' => ['nullable', 'date'],
            'address' => ['sometimes', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'status' => ['nullable', 'string'],
            'child' => ['nullable', 'integer'],
            'number_of_children' => ['nullable', 'integer'],
            'father_name' => ['nullable', 'string'],
            'father_occupation' => ['nullable', 'string'],
            'father_phone_number' => ['nullable', 'string'],
            'mother_name' => ['nullable', 'string'],
            'mother_occupation' => ['nullable', 'string'],
            'mother_phone_number' => ['nullable', 'string'],
            'family_address' => ['nullable', 'string'],
            'emergency_contact_name' => ['nullable', 'string'],
            'emergency_contact_occupation' => ['nullable', 'string'],
            'emergency_contact_phone_number' => ['nullable', 'string'],
            'emergency_contact_address' => ['nullable', 'string'],
            'registration_date' => ['nullable', 'date'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'class_id' => ['nullable', 'integer'],
            'login_id' => ['nullable', 'integer'],
            'enabled' => ['sometimes', 'boolean'],
            
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

    protected function prepareForValidation()
    { 
        if (empty($this->class_group_selected)) {
            $this->merge(['class_id'=> null]);
        } elseif (count($this->class_group_selected) == 1) {
            $this->merge(['class_id'=> $this->class_group_selected[0]['id']]);
          } else {
            $this->merge(['class_id'=> $this->class_group_selected['id']]);
          }

          if (empty($this->admin_user_selected)) {
            $this->merge(['login_id'=> null]);
        } elseif (count($this->admin_user_selected) == 1) {
            $this->merge(['login_id'=> $this->admin_user_selected[0]['id']]);
          } else {
            $this->merge(['login_id'=> $this->admin_user_selected['id']]);
          }
    }

}
