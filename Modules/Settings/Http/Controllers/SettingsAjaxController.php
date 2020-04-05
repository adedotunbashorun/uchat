<?php namespace Modules\Settings\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\Settings\Http\Requests\FormRequest;
use Modules\Settings\Repositories\SettingInterface as Repository;

class SettingsAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function sendTestMail()
    {
        try{
            \Mail::send('settings::_test_email', compact('user', 'code'), function ($m) {
                $email = request()->get('test_email');
                $from_address = config('myapp.mail_from_address');
                $from_name = config('myapp.mail_from_name');
                $m->from($from_address,$from_name);
                $m->to($email)->subject('Test email from '.$from_name.' website');
            });
            return [
                'response'=>'success',
                'message'=>'Email successfully sent to '.request()->get('test_email')
            ];
        }
        catch (\Exception $e){
            return [
                'response'=>'error',
                'message'=>$e->getMessage()
            ];
        }

    }

}
