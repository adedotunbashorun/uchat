<?php

namespace Modules\Users\Http\Controllers;


use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Collective\Bus\Dispatcher;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Laravel\Socialite\Facades\Socialite;
use Modules\Core\Traits\RedirectingTrait;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Http\Requests\LoginRequest;
use Modules\Users\Http\Requests\RegisterFormRequest;
use Modules\Users\Http\Requests\ResetRequest;
use Modules\Users\Repositories\AuthenticationInterface;
use Modules\Users\Repositories\UserInterface;
use Modules\Users\Services\UserRegistration;
use Modules\Users\Exceptions\InvalidOrExpiredResetCode;
use Modules\Users\Exceptions\UserNotFoundException;
use Modules\Interests\Entities\Interest;
use DB;

class AuthController extends Controller {

    use FormBuilderTrait, RedirectingTrait;
    /**
     * @var UserInterface
     */
    private $repository;

    public function __construct(AuthenticationInterface $auth)
    {

        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('users::login');
    }

    public function getPayment()
    {
        $user = session('new_user');
        return view('modules.pages.public.payment');
    }

    public function postLogin(LoginRequest $request)
    {
        try{
            $remember = (bool) $request->get('remember_me', false);

            $user = $this->auth->login([
                'login'    => $request->email,
                'password' => $request->password,
            ], $remember);

            if($request->ajax()){
                return response()->json('Login Successful!', 200);
            }

            return $this->getAuthRedirect($user);

        }catch(\Exception $e){
            $message = $e->getMessage();
            if($e instanceof NotActivatedException) {
                $message = 'Account not yet validated. Please check your email.';
            }
            if($e instanceof ThrottlingException) {
                $delay = $e->getDelay();
                $message =  "Your account is blocked for {$delay} second(s).";
            }
            if($request->ajax()){
                return response()->json($message, 400);
            }
            return redirect()->back()->withError($message);
        }
    }

    public function postRegister(RegisterFormRequest $request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $user = app(UserRegistration::class)->register($request->all());
            $interests = $request->interests;
            foreach ($interests as $key => $interest) {
                $int = Interest::where('id',$interest)->first();
                if(empty($int)) {
                    $int = Interest::create(['name' => $interest, 'status' => 1]);
                }
                $user->interests()->attach($int->id);
            }
            DB::commit();
            session('new_user','');
            session('new_user', $user);
            if($request->ajax()){
                return response()->json("Thank you, Your registration was successful!", 200);
            }
            return redirect()->back()->withSuccess('');
        } catch (\Exception $e) {
            DB::rollback();
            if($request->ajax()){
                $message = trans('core::global.error_exception_msg'); //$message = $e->getMessage();
                return response()->json($e->getMessage(), 400);
            }     
            return redirect()->back();
        }
    }

    public function getActivate($userId, $code)
    {
        if ($this->auth->activate($userId, $code))
        {

            return redirect()->to('login')
                ->withSuccess(trans('Account activated you can now login'));
        }

        return redirect()->to('register')
            ->withError(trans('There was an error with the activation'));
    }

    public function getLogout()
    {
        $user = current_user();
        $redirect = url('login');
        if ($user)
        {
            switch ($user->roles()->first()->slug)
            {
                case 'artisan':
                case 'user':
                    $redirect = url('login');
                    break;
                default:
                    $redirect = url('auth/login');
            }
        }
        $this->auth->logout();

        session()->forget('checkout_data');

        return redirect($redirect);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function getAuthRedirect($user)
    {
        $message =  'You are successfully logged in';
        switch ($user->roles()->first()->slug)
        {
            case 'user':
                $route = url('/');
                return redirect()->intended($route)
                    ->withSuccess($message);
                break;
            default:
                return redirect()->intended('admin/dashboard')
                    ->withSuccess($message);
        }
    }

    public function getReset()
    {
        $form = $this->form('Users\Forms\AuthForm', [
            'method' => 'POST',
            'route'  => 'reset.post'
        ]);

        return view('users::public.reset.begin')->with('form', $form);
    }

    public function postReset(ResetRequest $request)
    {
        try
        {
            app(Dispatcher::class)->dispatchFrom('Modules\Users\Commands\BeginResetProcessCommand', $request);
        } catch (UserNotFoundException $e)
        {
            \Notification::error(trans('no user found'));

            return redirect()->back()->withInput();
        }

        \Notification::success(trans('Password reset link sent to your email address'));

        return redirect('login');
    }

    public function getResetComplete()
    {
        $form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
        ]);

        return view('users::public.reset.complete')->with(compact('form'));
    }

    public function postResetComplete($userId, $code, ChangePasswordFormRequest $request)
    {
        try
        {
            app(Dispatcher::class)->dispatchFromArray(
                'Modules\Users\Commands\CompleteResetProcessCommand',
                array_merge($request->all(), ['userId' => $userId, 'code' => $code])
            );
        } catch (UserNotFoundException $e)
        {
            \Notification::error(trans('user no longer exists'));

            return redirect()->back()->withInput();
        } catch (InvalidOrExpiredResetCode $e)
        {
            \Notification::error(trans('invalid/expired reset code'));

            return redirect()->back()->withInput();
        }

        \Notification::success(trans('Password has been reset. You can now login with your new password.'));

        return redirect('login');
    }
}