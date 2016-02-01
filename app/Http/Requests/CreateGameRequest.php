<?php

namespace Blooddivision\Http\Requests;

use Blooddivision\Http\Requests\Request;

class CreateGameRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_name' => 'required'
        ];
    }
}
