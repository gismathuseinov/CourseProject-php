<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Complaint extends FormRequest
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
           'email'=>'required|email|min:8|max:70',
            'compname'=>'required|string|min:5|max:70',
            'complainetname'=>'required|string|min:30|max:300',
            'complainet'=>'required|string|min:100|max:10000',
        ];
    }
    public function messages()
    {
       return[
            'email.required'=>'Zəhmət olmasa email adresinizi girin',
            'email.max'=>'Daxil etdiyiniz email  uzundur',
            'email.min'=>'Daxil etdiyiniz email  qısadır',

           'compname.required'=>'Zəhmət olmasa şikayətçi olduğunuz şirkət adını daxil edin ',
           'compname.max'=>'Daxil etdiyiniz ad  uzundur',
           'compname.min'=>'Daxil etdiyiniz ad  qısadır',

           'complainetname.min'=>'Daxil etdiyiniz məlumat  qısadır',
           'complainetname.max'=>'Daxil etdiyiniz məlumat  uzundur',
           'complainetname.required'=>'Zəhmət olmasa başlıq qeyd edin',

           'complainet.required'=>'Zəhmət olmasa şikayətinizi daxil edin',
           'complainet.min'=>'Daxil etdiyiniz məlumat  qısadır',
           'complainet.max'=>'Daxil etdiyiniz məlumat  uzundur',
       ];
    }
}
