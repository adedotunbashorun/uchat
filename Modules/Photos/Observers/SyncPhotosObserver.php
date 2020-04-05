<?php

namespace Modules\Photos\Observers;

class SyncPhotosObserver
{
    public function saved($model)
    {
        $photos = request()->input('uploaded_photos');
        if (!empty($photos))
        {
            $photos = json_decode($photos);
            $model->photos()->sync($photos);
        }

    }
}
