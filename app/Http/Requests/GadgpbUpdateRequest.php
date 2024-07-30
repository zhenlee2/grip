<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GadgpbUpdateRequest extends FormRequest
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
            'gadar_id' => 'required|integer',
            'mandate' => 'required',
            'result' => 'required',
            'activity' => 'nullable',
            'dataDiv' => 'required',
            'dataSec' => 'required',
            'justification' => 'required',
            'remark' => 'required',
            'rawunit' => 'required',
        ];
    }
}
