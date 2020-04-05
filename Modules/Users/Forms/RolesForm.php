<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class RolesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text',[
                'label'=>'Name',
                'attr'=>[
                    'class'=>'form-control',
                ]
            ])
            ->add('slug', 'text',[
                'label'=>'Slug',
                'attr'=>[
                    'class'=>'form-control',
                ]
            ]);

    }
}