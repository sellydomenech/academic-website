<?php

namespace App\Http\Requests\Admin\StudentHasClass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreStudentHasClass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.student-has-class.create');
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
        if (!empty($this->class_group_selected))
            $this->merge(['class_group_id'=> $this->class_group_selected['id']]);

        if (!empty($this->student_selected))
            $this->merge(['student_id'=> $this->student_selected['id']]);

    }
}
