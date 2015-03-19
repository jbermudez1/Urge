<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:00
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CrudController;
use App\Repositories\ProcedureRepo;
use App\Helpers\FormX;

class ProceduresController extends CrudController {
    protected $rules = array(
        'title' => 'required',
        'description' => 'required',
        'type'=> 'required'
    );

    protected $module = '_procedures';

    public function __construct(ProcedureRepo $procedureRepo)
    {
        parent::__construct();
        $this->repo = $procedureRepo;
    }

    public function fields($data = null)
    {
        $type = [
            'town'  => 'Municipio',
            'state' => 'Estado'
        ];

        if($data)
        {
            return FormX::make()
                ->input('title','Titulo:','Titulo',$data->title)
                ->textarea('description','Descripcion:','Descripcion',$data->description)
                ->select('type','Tipo:',$type,$data->type);
        }
        else
        {
            return FormX::make()
                ->input('title','Titulo:','Titulo')
                ->textarea('description','Descripcion:','Descripcion')
                ->select('type','Tipo:',$type);
        }
    }

}