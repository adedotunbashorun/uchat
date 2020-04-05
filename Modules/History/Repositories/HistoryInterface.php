<?php namespace Modules\History\Repositories;

use Modules\Core\Repositories\RepositoryInterface;

interface HistoryInterface extends RepositoryInterface
{

    /**
     * Clear history.
     *
     * @return bool
     */
    public function clear();
}