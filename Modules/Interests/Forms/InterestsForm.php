<?php

namespace Modules\Interests\Forms;

use Kris\LaravelFormBuilder\Form;

class InterestsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
