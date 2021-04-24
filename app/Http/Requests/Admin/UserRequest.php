<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'min:5|max:20|nullable',
            'dob' => 'required',
        ];
        if(!$this->user):
            $rules += ['email'=>'required|email|unique:users'];
        else:
            $rules += ['email'=>'required|email|unique:users,email,'.$this->user->id];
        endif;
        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter first name',
            'last_name.required' => 'Please enter last name',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
            'email.unique' => 'Email already exists',
            'password.min' => 'please enter at least 5 characters',
            'password.max' => 'please enter valid password',
            'dob.required' => 'Please select date',
        ];
    }
}
