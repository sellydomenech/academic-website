<?php

namespace App\Http\Requests\Admin\RaportHasMark;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRaportHasMark extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.raport-has-mark.edit', $this->raportHasMark);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'raport_id' => ['sometimes', 'integer'],
            'subject_id' => ['sometimes', 'integer'],
            'mark' => ['sometimes', 'string'],
            'note' => ['sometimes', 'string'],
            
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
        if (empty($this->raport_selected)) {
            $this->merge(['raport_id'=> null]);
        } elseif (count($this->raport_selected) == 1) {
            $this->merge(['raport_id'=> $this->raport_selected[0]['id']]);
          } else {
            $this->merge(['raport_id'=> $this->raport_selected['id']]);
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
