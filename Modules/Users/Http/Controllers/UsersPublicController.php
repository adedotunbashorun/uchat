<?php namespace Modules\Users\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Users\Events\UserHasRegistered;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Http\Requests\ProfileUpdateFormRequest;
use Modules\Users\Repositories\UserInterface as Repository;
use Illuminate\Support\Facades\Hash;
use Request;

class UsersPublicController extends BasePublicController
{

    use FormBuilderTrait;

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function getArtisanRegister()
    {
        return view('users::public.artisan-register');
    }

    public function resendActivation()
    {
        $user = current_user();
        event(new UserHasRegistered($user));
        flash('Activation link resent to '.$user->email,'success');
        return redirect()->back();
    }


}
