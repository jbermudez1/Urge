<?php namespace App\Http\Controllers\Admin;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 10/03/15
 * Time: 10:56
 */

use App\Repositories\NoticeRepo;
use App\Http\Controllers\Admin\CrudController;
use App\Helpers\FormX;
use App\Helpers\UploadX;
use Illuminate\Http\Request;


class NoticesController extends CrudController {

    protected $rules = array(
        'id_user' => 'required',
        'title' => 'required',
        'description' => 'required',
    );
    protected $module = '_notices';

    public function __construct(NoticeRepo $noticeRepo)
    {
        parent::__construct();
        $this->repo = $noticeRepo;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $success = true;
        $message = "Registro guardado exitosamente";
        $record = null;
        if(!$request->hasFile('image'))
        {
            $message = 'Ingrese una imagen';
            $success = false;
            return compact('success','message','record');
        }

        $validator = \Validator::make($data, $this->rules);
        if ($validator->passes())
        {
            $record = $this->repo->create($data);

            $image = UploadX::uploadFile($request->file('image'),'notices',$record->id);
            $record->image = $image['url'];
            $record->save();

            return compact('success','message','record');
        }
        else
        {
            $success=false;
            $message = $validator->messages();
            return compact('success','message','record');
        }
    }
    public function update(Request $request,$id)
    {
        $record = $this->repo->findOrFail($id);
        $data = $request->all();;
        if($request->hasFile('image'))
        {
            // Delete old image
            $deleteImage = $this->repo->findOrFail($id);
            UploadX::deleteFile($deleteImage->image);

            // Upload new image
            $image = UploadX::uploadFile($request->file('image'),'notices',$id);
            $data['image'] = $image['url'];

        }
        $validator = \Validator::make($data, $this->rules);
        $success = true;
        $message = "Registro guardado exitosamente";

        if ($validator->passes())
        {
            $record = $this->repo->update($record, $data);
            return compact('success','message','record');
        }
        else
        {
            $record=null;
            $success=false;
            $message='Ocurrio un errord';
            return compact('success','message','record');
        }
    }
    public function destroy($id)
    {
        $deleteImage = $this->repo->findOrFail($id);
        UploadX::deleteFile($deleteImage->image);
        $this->repo->delete($id);
        return ['success'=>'true','message'=>'Registro eliminado exitosamente'];
    }

    public function fields($data = null)
    {
        if($data)
        {
            return FormX::make()
                ->hidden('id_user',$data->id_user)
                ->input('title','Titulo:','Titulo',$data->title)
                ->input('place','Lugar:','Lugar',$data->place)
                ->textarea('description','Descripcion:','Ingrese Descripcion',$data->description)
                ->tags('tags','Tags:',$data->tags)
                ->file_image('image','Imagen:',$data->image);
        }
        else
        {
            return FormX::make()
                ->hidden('id_user',\Auth::id())
                ->input('title','Titulo:','Titulo')
                ->input('place','Lugar:','Lugar')
                ->textarea('description','Descripcion:','Ingrese Descripcion')
                ->tags('tags','Tags:')
                ->file_image('image','Imagen:');
        }
    }
}