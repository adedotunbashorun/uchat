<?php

namespace Modules\Menus\Forms;

use Kris\LaravelFormBuilder\Form;

class MenusForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('class', 'text')
            ->add('status', 'select', [
                'choices' => ['1' => 'live', '0' => 'draft'],
                'empty_value' => '- Select status -'
            ]);
    }
}
