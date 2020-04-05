<?php
namespace Modules\Pages\Repositories;

use Config;
use DB;
use Event;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Input;
use Log;
use Modules\Core\Repositories\RepositoriesAbstract;
use Modules\Pages\Repositories\PageInterface;

class EloquentPage extends RepositoriesAbstract implements PageInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new model
     *
     * @param  array $data
     * @return mixed Model or false on error during save
     */
    public function create(array $data)
    {
        // Create the model
        $model = $this->model->fill($data);

        if ($model->save()) {
            $this->buildLookup($model);
            return $model;
        }

        return false;
    }

    /**
     * Update an existing model
     *
     * @param array  Data needed for model update
     * @return boolean
     */
    public function update(array $data)
    {
        $model = $this->model->find($data['id']);

        $model->fill($data);

        // $this->syncRelation($model, $data, 'galleries');

        if ($model->save()) {
            $this->buildLookup($model);
            $this->resetChildrenUri($model);
            return $model;
        }

        return $model;
    }

    /**
     * Get a page by its uri
     *
     * @param  string $uri
     * @return Modules\Pages\Entities\Page $model
     */
    public function getFirstByUri($uri)
    {
        $model = $this->model->where('uri', $uri)
            ->where('status', 1)
            // ->where('is_home', 0)
            ->firstOrFail();
        return $model;
    }

    /**
     * Get submenu for a page
     *
     * @return Collection
     */
    public function getSubMenu($uri, $all = false)
    {
        $rootUriArray = explode('/', $uri);
        $index = 0;
        if(count($rootUriArray) > 1 ){
            $index = count($rootUriArray) - 2;
        }
        if($index != 0){
            $uri = $rootUriArray[0];
            $uri .= '/'.$rootUriArray[$index];
        }else{
            $uri = $rootUriArray[$index];
        }
        //dd($uri);
        /*if (isset($rootUriArray[1])) { // i
            $uri .= '/' . $rootUriArray[1]; // add next part of uri in locale
        }*/

        $query = $this->model
            ->select('*')
            ->addSelect('pages.id AS id')
            ->where('uri', '!=', $uri)
            ->where('uri', 'LIKE', $uri . '%');

        if (!$all) {
            $query->where('status', 1);
        }

        $models = $query->order()->get()->nest();

        return $models;
    }

    /**
     * Get pages linked to module to build routes
     *
     * @return array
     */
    public function getForRoutes()
    {
        $pages = $this->model
            ->where('module', '!=', '')
            ->get()
            ->all();

        return $pages;
    }

    /**
     * Get all uris
     *
     * @return array
     */
    public function allUris()
    {
        return $this->model->lists('uri', 'id');
    }

    /**
     * Get sort data
     *
     * @param  integer $position
     * @param  array $item
     * @return array
     */
    protected function getSortData($position, $item)
    {
        return [
            'position' => $position,
            'parent_id' => $item['parent_id']
        ];
    }

    /**
     * Get all pages for a select/options
     *
     * @return array
     */

    public function allForSelect()
    {
        $pages = $this
            ->all([], true)
            ->nest()
            ->listsFlattened();

        return ['' => ''] + $pages;
    }


    private function resetChildrenUri(Model $page)
    {
        foreach ($page->children as $childPage) {
            $childPage->uri = NULL;
            $childPage->save();
            $this->resetChildrenUri($childPage);
        }
    }

    private function buildLookup($model)
    {
        if (!is_null($model->parent)) {
            $parent_uri = $model->parent->uri;
            $model->uri = $parent_uri . '/' . $model->slug;
            $model->save();
        } else {
            $model->uri = $model->slug;
            $model->save();
        }
    }

    public function getForDataTable()
    {
        $query = $this->model
            ->leftJoin('pages as parent_page', 'parent_page.id', '=', 'pages.parent_id')
            ->select([
                'pages.id as page_id',
                'pages.title',
                'parent_page.title as parent_title',
                'pages.uri',
                'pages.status'
            ]);

        return $query;
    }
}
