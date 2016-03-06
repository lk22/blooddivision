<?php

namespace Blooddivision\Http\Requests;

use Blooddivision\Http\Requests\Request;

class ManageUserRequest extends Request
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
        return [
            'avatar' => 'mimes:jpeg,png,jpg',
            'cover'  => 'mimes:jpeg,png,jpg',
            'name'   => 'required|unique:users,name,' . auth()->user()->id,
            'email'  => 'email|required',
            'description' => 'min:10|max:255'
        ];
    }
}
