<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AngkatanRequest extends Request
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
            'lembaga_id'=>'required',
            'nama_diklat'=>'required',
            'tahun'=>'required',
            'angkatan'=>'required',
            'jenis_diklat'=>'required'
        ];
    }
}
