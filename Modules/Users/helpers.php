<?php

function current_user(){
    return app('Modules\Users\Repositories\AuthenticationInterface')->check();
}

function current_user_groups($all=false){
    $user = current_user();
    if($user){
        $groups = $user->groups();
        return ($all) ? $groups : $groups->first();
    }
    return false;
}

function is_parent_group(){
    $group = current_user_groups();
    if($group && $group->name == 'Parent') return true;
    return false;
}

function is_admin_group(){
    $group = current_user_groups();
    if($group && $group->name == 'Admin') return true;
    return false;
}

function current_user_email(){
    $user = current_user();
    if($user){
        return $user->email;
    }
    return '';
}

function is_user_current($user_id)
{
    $user = current_user();
    if (isset($user)){
        if ($user_id == current_user()->id)
        {
            return true;
        }
    }
    return false;
}

function generate_password(){
    $password = substr(md5(rand()), 0, 7);
    return $password;
}

function has_access($permission)
{
    return app('Modules\Users\Repositories\AuthenticationInterface')->hasAccess($permission);
}