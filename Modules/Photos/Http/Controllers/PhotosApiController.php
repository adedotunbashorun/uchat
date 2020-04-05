<?php namespace Modules\Photos\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Facades\FileUpload;
use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Photos\Repositories\PhotoInterface as Repository;

class PhotosApiController extends BaseApiController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function upload(Request $request)
    {
        try{
            $data = $request->all();
            $response_data = [];
            if (!empty($data['files'])) {
                foreach ($data['files'] as $file)
                {
                    $file = FileUpload::handle($file, 'uploads/photos');
                    $file_name = $file['filename'];
                    $response_data[] = \Photos::create(['image'=>$file_name])->id;
                }
            }
            if(!count($response_data)) throw new \Exception('An error occurred');
            return \Response::json($response_data, 200);
        }catch(\Exception $e){
            return \Response::json($e->getMessage(), 400);
        }
    }
}
