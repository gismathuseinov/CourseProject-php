<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Complaint extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'min:8', 'max:70'],
            'company_name' => ['required','string','min:5','max:70'],
            'complaint_title' => ['required','string','min:20','max:300'],
            'complaint_body' => ['required','string','min:100','max:10000'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Zəhmət olmasa email adresinizi girin',
            'email.max' => 'Daxil etdiyiniz email  uzundur',
            'email.min' => 'Daxil etdiyiniz email  qısadır',

            'company_name.required' => 'Zəhmət olmasa şikayətçi olduğunuz şirkət adını daxil edin ',
            'company_name.max' => 'Daxil etdiyiniz şirkət adı  uzundur',
            'company_name.min' => 'Daxil etdiyiniz şirkət adı   qısadır',

            'complaint_title.min' => 'Daxil etdiyiniz başlıq məlumatı  qısadır',
            'complaint_title.max' => 'Daxil etdiyiniz başlıq məlumatı  uzundur',
            'complaint_title.required' => 'Zəhmət olmasa başlıq qeyd edin',

            'complaint_body.required' => 'Zəhmət olmasa şikayətinizi daxil edin',
            'complaint_body.min' => 'Daxil etdiyiniz məlumat  qısadır',
            'complaint_body.max' => 'Daxil etdiyiniz məlumat  uzundur',
        ];
    }
}
