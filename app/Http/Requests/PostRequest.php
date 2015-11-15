<?php

namespace Traydes\Http\Requests;

use Illuminate\Support\Facades\Auth;

use Traydes\Http\Requests\Request;

class PostRequest extends Request
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
            /*'images' => 'mimes:jpeg,bmp,png',*/
            'price' => 'required|integer',
            'title' => 'required|min:5|max:255|unique:posts',
            'content' => 'required|min:5',
        ];
    }
}
