<?php

namespace Modules\Core\Traits;


use Illuminate\Support\Facades\Redirect;

trait RedirectingTrait {
    protected function redirectRoute($route, $params = array(), $data = array())
    {
        return Redirect::route($route, $params)->with($data);
    }
    protected function redirectBack($data = array())
    {
        return Redirect::back()->withInput()->withErrors($data);
    }

    protected function redirectRouteWithErrors($route, $data = array(), $params = array())
    {
        return Redirect::route($route, $params)->withErrors($data);
    }

    protected function redirectIntended($default = null)
    {
        return Redirect::intended($default);
    }

    protected function redirectTo($url)
    {
        return Redirect::to($url);
    }

    protected function redirectGuest($url,$data=array())
    {
        return Redirect::guest($url)->withErrors($data);
    }
}