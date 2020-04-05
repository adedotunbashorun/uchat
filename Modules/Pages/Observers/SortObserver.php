<?php

namespace Modules\Pages\Observers;

use Modules\Pages\Entities\Page;

class SortObserver
{
    /**
     * On update, update children uris.
     *
     * @param Page $model
     *
     * @return void
     */
    public function updating(Page $model)
    {
        if ($model->isDirty('parent_id')) {
            foreach (config('translatable.locales') as $locale) {
                $model->translate($locale)->uri = '';
            }
        }
    }
}
