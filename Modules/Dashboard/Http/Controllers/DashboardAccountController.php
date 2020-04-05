<?php namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardAccountController extends Controller  {

    public function __construct()
    {
        $this->middleware('auth.account');
    }
	public function index()
	{
		return view('dashboard::public.index');
	}

}