<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'bail|required|string',
            'email' => 'bail|required|email|string|unique:users',
            'image' => 'bail|required|image',
            'role' => 'bail|required|string|in:admin,member',
            'password' => 'bail|required|string|confirmed|min:8',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'bail|required|string',
                'email' => 'bail|required|email|string|unique:users,id,:id',
                'image' => 'bail|nullable|image',
                'role' => 'bail|required|string|in:admin,member',
                'password' => 'bail|nullable|string|confirmed|min:8',
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'image' => 'Profile image',
        ];
    }
}
