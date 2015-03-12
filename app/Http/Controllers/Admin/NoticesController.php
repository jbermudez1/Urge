<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 10/03/15
 * Time: 10:56
 */

use App\Repositories\NoticeRepo;
use App\Helpers\FormX;


class NoticesController extends CrudController {

    protected $rules = array(
        'id_user' => 'required',
        'name'=> 'required',
        'description' => 'required',
    );
    protected $module = '_categories';
    public function __construct(CategoryRepo $categoryRepo)
    {
        parent::__construct();
        $this->repo = $categoryRepo;
    }
    public function fields($data = null)
    {
        if($data)
        {
            return FormX::make()
                ->hidden('id_user',$data->id_user)
                ->input('name','Nombre:','Nombre',$data->name)
                ->textarea('description','Descripcion:','Ingrese Descripcion',$data->description);
        }
        else
        {
            return FormX::make()
                ->hidden('id_user',\Auth::id())
                ->input('name','Nombre:','Nombre')
                ->textarea('description','Descripcion:','Ingrese Descripcion');
        }
    }
}