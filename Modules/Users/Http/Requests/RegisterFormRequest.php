<?php
namespace Modules\Users\Http\Requests;

use Modules\Core\Http\Requests\AbstractFormRequest;

class RegisterFormRequest extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ];
        if(app()->environment() == 'production'){
            $rules =  $rules + ['g-recaptcha-response' => 'required|captcha'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
    }
}
