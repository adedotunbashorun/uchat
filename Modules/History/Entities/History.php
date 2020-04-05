<?php namespace Modules\History\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class History extends Base {

    use PresentableTrait;

    protected $table = 'history';

    protected $presenter = 'Modules\History\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    protected $appends = ['user_name', 'href'];

    /**
     * lists.
     */
    public $order = 'id';
    public $direction = 'desc';

    /**
     * History item morph to model.
     */
    public function historable()
    {
        return $this->morphTo();
    }

    /**
     * History item belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    /**
     * Get user name.
     *
     * @return string\null
     */
    public function getUserNameAttribute()
    {
        if ($this->user) {
            return $this->user->first_name.' '.$this->user->last_name;
        }

        return;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return $value;
    }

    /**
     * Get title (overwrite Base model method).
     *
     * @return string|null
     */
    public function getHrefAttribute()
    {
        if ($this->historable) {
            return $this->historable->editUrl();
        }

        return;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return format_date($value);
    }
}