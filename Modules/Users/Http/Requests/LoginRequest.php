<?php namespace Modules\Users\Http\Requests;

use Modules\Core\Http\Requests\AbstractFormRequest;

class LoginRequest extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        return $rules;
    }
}
