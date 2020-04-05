<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class AuthForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', 'email',[
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Username',
                    'autocomplete'=>'off',
                    'required'
                ]
            ])
            ->add('password', 'password',[
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Password',
                    'autocomplete'=>'off',
                    'required',
                ]
            ])
            ->add('login', 'submit',[
                'attr'=>[
                    'class'=>'btn dark uppercase btn-block'
                ]
            ]);
    }
}