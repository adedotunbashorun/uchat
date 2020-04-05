<?php namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    protected $guarded = ['_token','exit'];


}