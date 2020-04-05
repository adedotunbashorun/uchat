<?php

namespace Modules\History\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Modules\History\Entities\History;

trait Historable
{
    /**
     * boot method.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::created(function (Model $model) {
            $model->writeHistory('created', $model->present()->title);
        });
        static::updated(function (Model $model) {
            if ($model->isDirty('status')) {
                $action = $model->status ? 'set online' : 'set offline';
                $model->writeHistory($action, $model->present()->title);
            }
            $model->writeHistory('updated', $model->present()->title);
        });
        static::deleting(function (Model $model) {
            $model->writeHistory('deleted', $model->present()->title);
        });
    }

    /**
     * Write History row.
     *
     * @param string $action
     * @param string $title
     * @param string $locale
     *
     * @return void
     */
    public function writeHistory($action, $title = null, $locale = null)
    {
        $history = app('Modules\History\Repositories\HistoryInterface');
        $data['historable_id'] = $this->getKey();
        $data['historable_type'] = get_class($this);
        $data['user_id'] = $this->getUserId();
        $data['title'] = $title;
        $data['icon_class'] = $this->iconClass($action);
        $data['historable_table'] = $this->getTable();
        $data['action'] = $action;
        $history->create($data);
    }

    /**
     * Return icon class for each action.
     *
     * @param string $action
     *
     * @return string|null
     */
    private function iconClass($action = null)
    {
        switch ($action) {
            case 'deleted':
                return 'fa-trash';
                break;

            case 'updated':
                return 'fa-edit';
                break;

            case 'created':
                return 'fa-plus-circle';
                break;

            case 'set online':
                return 'fa-toggle-on';
                break;

            case 'set offline':
                return 'fa-toggle-off';
                break;

            default:
                return;
                break;
        }
    }

    /**
     * Get current user id.
     *
     * @return int|null
     */
    private function getUserId()
    {
        if ($user = current_user()) {
            return $user->id;
        }

        return;
    }

    /**
     * Model has history.
     */
    public function history()
    {
        return $this->morphMany('Modules\History\Models\History', 'historable');
    }
}
