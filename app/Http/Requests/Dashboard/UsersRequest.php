<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if($this->id){
            $rules['email'] =  'required|email|unique:users,email,'.$this->id;
            $rules['password'] =  'nullable|min:6';

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
