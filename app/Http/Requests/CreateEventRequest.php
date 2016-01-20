<?php

namespace Blooddivision\Http\Requests;

use Blooddivision\Http\Requests\Request;

class CreateEventRequest extends Request
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
        /**
        * Rules for creating an event
        * @return array
        */
        return [
            'event_name'        => 'required',
            'event_game'        => 'required',
            'event_date'        => 'required',
            'event_start_time'  => 'required',
            'event_end_time'    => 'required',
            'event_desc'        => 'required'
        ];
    }
}
