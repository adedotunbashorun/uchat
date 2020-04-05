<?php namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Settings\Repositories\SettingInterface as Repository;

class SettingsController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = $this->repository->all();

        $drivers = config('myapp.mail_drivers',[]);

        if((app()->environment() == 'local')){
            $drivers['log'] = 'Log';
        }

        $form = $this->form(config('settings.form'), [
            'method' => 'POST',
            'url' => route('admin.settings.store'),
            'model'=>$data,
            'data'=>[
                'drivers'=>$drivers
            ]
        ]);
        if((app()->environment() == 'local'))
        {
            $form = $form->modify('mail_driver', 'select', [
                'selected' => 'log'
            ]);
        }else{
            $form = $form->modify('mail_driver','select',[
                'selected' => config('myapp.mail_driver')
            ]);
        }

        return view('settings::admin.index')
            ->with(compact('form','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->repository->store($data);

        return redirect()->route('admin.settings.index')
            ->withSuccess(trans('core::global.new_record'));
    }

    /**
     * Delete image.
     *
     * @return null
     */
    public function deleteImage()
    {
        $this->repository->deleteImage();
    }

}
