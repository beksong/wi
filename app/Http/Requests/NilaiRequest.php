<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NilaiRequest extends Request
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
            'widyaiswara_id'=>'required',
            'matadiklat_id'=>'required',
            'angkatan_id'=>'required',
            'tgl'=>'required',
            'jp'=>'required'
        ];
    }
}
