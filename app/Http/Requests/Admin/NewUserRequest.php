<?php

namespace Traydes\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Traydes\Http\Requests\Request;

class NewUserRequest extends Request
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
        return [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|min:6|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
