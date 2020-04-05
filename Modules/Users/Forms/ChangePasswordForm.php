<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class ChangePasswordForm extends Form
{
    public function buildForm()
    {
        $this
             ->add('password', 'password',[
                  'attr'=>[
                      'class'=>'form-control',
                      'required'
                  ]
              ])
             ->add('confirm_password', 'password',[
                    'label'=>'Confirm Password',
                    'attr'=>[
                        'class'=>'form-control',
                        'required'
                    ]
                ]);
    }
}