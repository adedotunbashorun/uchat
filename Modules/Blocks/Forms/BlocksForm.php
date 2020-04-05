<?php

namespace Modules\Blocks\Forms;

use Kris\LaravelFormBuilder\Form;

class BlocksForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('slug', 'text')
            ->add('link', 'text')
            ->add('link_label', 'text')
            ->add('image', 'file')
            ->add('status', 'select', [
                'choices' => ['1' => 'live', '0' => 'draft'],
            ])
            ->add('content', 'textarea',[
                'attr'=>['class'=>'form-control','rows' => 3]
            ]);
    }
}
