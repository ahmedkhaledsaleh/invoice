<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules =  [
            'name' => ['required', 'string', 'max:50', 'unique:roles'],
        ];

        if($this->id){
            $rules['name'] =  'required|string|unique:roles,name,'.$this->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'The Field Is Rquired'
        ];
    }
}
