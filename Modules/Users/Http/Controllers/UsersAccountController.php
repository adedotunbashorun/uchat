<?php namespace Modules\Users\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Facades\FileUpload;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\ProfileUpdateFormRequest;
use Modules\Users\Repositories\UserInterface as Repository;
use Request;

class UsersAccountController extends BasePublicController
{

    use FormBuilderTrait;

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $model = current_user();
        $form = $this->form(config('users.form'), [
            'method' => 'POST',
            'url' => route('profile.update'),
            'model' => $model
        ]);

        return view('users::public.index')
            ->with(compact('form','model'));
    }

    public function getChangePassword()
    {
        $model = current_user();

        $form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
            'url' => route('profile.change-password.post'),
        ]);


        /*  $vendor_form = $this->form('Vendors\Forms\VendorsForm',[
            'model'=>$model->vendor
        ]);*/

        return view('users::public.change-password')
            ->with(compact('form'));
    }

    public function postChangePassword(ChangePasswordFormRequest $request)
    {
        try{
            $data = $request->all();
            $data['password']  = \Hash::make($data['password']);
            $model = $this->repository->update(current_user(), $data);

            /*
            $email_data['password'] = $data['password'];
            $email_data['email'] = $model->email;
            $email_data['user_name'] = $model->first_name.' '.$model->last_name;

            event(new PasswordWasChangedEvent($email_data));*/
            /*flash()->success('Your account has been successfully updated');*/
            $message = 'Your password has been successfully updated';
            if($request->ajax()) return response()->json($message, 200);

            return redirect()->back()->withSuccess($message);
        }catch(\Exception $e){
            $message = trans('core::global.error_exception_msg'); //$message = $e->getMessage();
            if($request->ajax()) return response()->json($message, 400);
            return redirect()->back()->withError($message);
        }
    }

    public function update(ProfileUpdateFormRequest $request)
    {
        try{
            $data = $request->all();
            $this->repository->update(current_user(), $data);
            $message = 'Your account has been successfully updated';
            if($request->ajax()) return response()->json($message, 200);

            return redirect()->back()->withSuccess($message);
        }catch(\Exception $e){
            $message = trans('core::global.error_exception_msg'); //$message = $e->getMessage();
            if($request->ajax()) return response()->json($message, 400);
            return redirect()->back()->withError($message);
        }
    }
}
