<?php

namespace Modules\Core\Observers;

class SlugObserver
{
    public function saving($model)
    {
        $slug = $model->slug ? str_slug($model->slug) : (($model->title) ? str_slug($model->title) :  str_slug($model->name));
        // slug = null if empty string
        $model->slug = $slug ?: '/';

        if ($slug) {
            $i = 0;
            // Check uri is unique
            while ($this->slugExists($model)) {
                $i++;
                // increment slug if exists
                $model->slug = $slug.'-'.$i;
            }
        }
    }

    private function slugExists($model)
    {
        $query = $model::where('slug', $model->slug);
        if ($model->id) {
            $query->where('id', '!=', $model->id);
        }

        return (bool) $query->count();
    }
}
