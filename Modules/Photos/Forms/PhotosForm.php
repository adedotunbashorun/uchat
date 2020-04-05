<?php

namespace Modules\Photos\Forms;

use Kris\LaravelFormBuilder\Form;

class PhotosForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
