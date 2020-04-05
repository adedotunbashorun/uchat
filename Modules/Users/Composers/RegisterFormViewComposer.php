<?php namespace Modules\Users\Composers;

use Kris\LaravelFormBuilder\FormBuilderTrait;

class RegisterFormViewComposer
{
    use FormBuilderTrait;

    public function compose($view)
    {
        $view->register_form = $this->form('Users\Forms\UsersForm', [
            'method' => 'POST',
            'route' => 'register.post'
        ]);

        /*$view->vendor_form = $this->form(config('vendors.form'), [
            'method' => 'POST',
        ]);*/
    }
}
