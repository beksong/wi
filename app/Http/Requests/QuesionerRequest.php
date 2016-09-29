<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuesionerRequest extends Request
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
            //
            'mentoring_id'=>'required',
            'quesioner_id'=>'required',
            'answer'=>'required',
        ];
    }
}
