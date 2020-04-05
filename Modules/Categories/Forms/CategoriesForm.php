<?php

namespace Modules\Categories\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('amount', 'text')
            ->add('body', 'textarea',[
                'attr'=>['class'=>'form-control summernote']
            ]);
    }
}
