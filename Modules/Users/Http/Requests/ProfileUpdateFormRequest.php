<?php
namespace Modules\Users\Http\Requests;

use Modules\Core\Http\Requests\AbstractFormRequest;

class ProfileUpdateFormRequest extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            //'email'=>'required|email|unique:users',
            'first_name'=>'required',
            'last_name'=>'required'
        ];

        return $rules;
    }
}
