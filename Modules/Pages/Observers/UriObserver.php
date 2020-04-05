<?php

namespace Modules\Pages\Observers;

use Modules\Pages\Entities\Page;

class UriObserver
{
    /**
     * On create, update uri.
     *
     * @param Page $model
     *
     * @return void
     */
    public function creating(Page $model)
    {
        $model->uri = $this->incrementWhileExists($model, $model->slug);
    }

    /**
     * On update, change uri.
     *
     * @param Page $model
     *
     * @return void
     */
    public function updating(Page $model)
    {
        $parentUri = $this->getParentUri($model);

        if ($parentUri) {
            $uri = $parentUri;
            if ($model->slug) {
                $uri .= '/'.$model->slug;
            }
        } else {
            $uri = $model->slug;
        }

        $model->uri = $this->incrementWhileExists($model, $uri, $model->id);
    }

    /**
     * Get parent page’s URI.
     *
     * @param Page $model
     *
     * @return string
     */
    private function getParentUri(Page $model)
    {
        if ($parentPage = $model->parent) {
            return $parentPage->uri;
        }

        return;
    }

    /**
     * Check if uri exists.
     *
     * @param Page $model
     * @param string          $uri
     * @param int             $id
     *
     * @return bool
     */
    private function uriExists(Page $model, $uri, $id)
    {
        $query = $model->where('uri', $uri);
        if ($id) {
            $query->where('id', '!=', $id);
        }

        if ($query->first()) {
            return true;
        }

        return false;
    }

    /**
     * Add '-x' on uri if it exists in page_translations table.
     *
     * @param Page $model
     * @param string          $uri
     * @param int             $id
     *
     * @return string|null
     */
    private function incrementWhileExists(Page $model, $uri, $id = null)
    {
        if (!$uri) {
            return;
        }

        $originalUri = $uri;

        $i = 0;
        // Check if uri is unique
        while ($this->uriExists($model, $uri, $id)) {
            $i++;
            // increment uri if it exists
            $uri = $originalUri.'-'.$i;
        }

        return $uri;
    }
}
