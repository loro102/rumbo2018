<?php

namespace App\Http\Requests;

use function auth;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
            'nombre'=>'required',
            'apellidos'=>'required',
            'nif'=>'required|CiNif',
            'direccion'=>'nullable',
            'codigopostal'=>'nullable',
            'localidad'=>'nullable',
            'provincia'=>'nullable',
            'fechanacimiento'=>'nullable|dateformat:Y-m-d',
            'country'=>'ES',
            'telefono1'=>'nullable|phone:ES',
            'telefono2'=>'nullable|phone:ES',
            'movil'=>'nullable|phone:ES,mobile',
            'email'=>'nullable|email',
            'iban'=>'nullable|iban',
            'nota'=>'nullable'
        ];
    }

}
