<?php

namespace App\Http\Requests\Admin\ClassGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateClassGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.class-group.edit', $this->classGroup);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'class_name' => ['sometimes', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'semester' => ['nullable', 'string'],
            'year_of_study' => ['nullable', 'string'],
            'teacher_id' => ['nullable'],
            
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
        if (empty($this->teacher_selected)) {
            $this->merge(['teacher_id'=> null]);
        } elseif (count($this->teacher_selected) == 1) {
            $this->merge(['teacher_id'=> $this->teacher_selected[0]['id']]);
          } else {
            $this->merge(['teacher_id'=> $this->teacher_selected['id']]);
          }
    }
}
