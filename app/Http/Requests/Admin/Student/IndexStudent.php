<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.student.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,first_name,last_name,nick_name,registration_number,gender,place_of_birth,date_of_birth,email,status,child,number_of_children,father_name,father_occupation,father_phone_number,mother_name,mother_occupation,mother_phone_number,emergency_contact_name,emergency_contact_occupation,emergency_contact_phone_number,registration_date,start_date,end_date,class_id,login_id,enabled|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
