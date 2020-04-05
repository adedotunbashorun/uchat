<?php namespace Modules\Pages\Http\Requests;

use Modules\Core\Http\Requests\AbstractFormRequest;

class ContactForm extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            'name'=>'required|min:4',
            'message'=>'required',
            'email'=>'email'
        ];

        return $rules;
    }
}
