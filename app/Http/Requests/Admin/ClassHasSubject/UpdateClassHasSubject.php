<?php

namespace App\Http\Requests\Admin\ClassHasSubject;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateClassHasSubject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.class-has-subject.edit', $this->classHasSubject);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'class_group_id' => ['sometimes', 'integer'],
            'subject_id' => ['sometimes', 'integer'],
            'day' => ['nullable', 'string'],
            
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
            $this->merge(['class_group_id'=> null]);
        } elseif (count($this->class_group_selected) == 1) {
            $this->merge(['class_group_id'=> $this->class_group_selected[0]['id']]);
          } else {
            $this->merge(['class_group_id'=> $this->class_group_selected['id']]);
          }

          if (empty($this->subject_selected)) {
            $this->merge(['subject_id'=> null]);
        } elseif (count($this->subject_selected) == 1) {
            $this->merge(['subject_id'=> $this->subject_selected[0]['id']]);
          } else {
            $this->merge(['subject_id'=> $this->subject_selected['id']]);
          }
    }
}
