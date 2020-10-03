<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        'name'=>'required',
        'cantidad'=>'required',
        'peso'=>'required',
        'unidad'=>'required',
        'price'=>'required',
        'iva'=>'required',
        ];
    }

    public function messages(){
        return[
           'name.required'=> 'El Campo Es Requerido',
           'cantidad.required'=> 'El Campo Es Requerido',
           'peso.required'=> 'El Campo Es Requerido',
           'unidad.required'=> 'El Campo Es Requerido',
           'price.required'=> 'El Campo Es Requerido',
           'iva.required'=> 'El Campo Es Requerido',
           

        ];
    }







}
