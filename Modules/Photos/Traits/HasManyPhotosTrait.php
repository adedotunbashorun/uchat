<?php
/**
 * Created by PhpStorm.
 * User: adedolapoo
 * Date: 10/9/2019
 * Time: 12:56 PM
 */

namespace Modules\Photos\Traits;

use Modules\Photos\Entities\Photo;

trait HasManyPhotosTrait {

    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
    }
}