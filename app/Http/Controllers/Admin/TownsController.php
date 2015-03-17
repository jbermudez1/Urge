<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 11:33
 */

namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;

use App\Repositories\TownRepo;

class TownsController extends CrudController {

    protected $rules = array(
        'description' => 'required',
        'observation'=> 'required'
    );
    protected $module = '_towns';

    public function __construct(TownRepo $townRepo)
    {
        parent::__construct();
        $this->repo = $townRepo;
    }

    public function fields($data = null)
    {
        if($data)
        {
            return FormX::make()
                    ->input('description','Descripcion:','Descripcion',$data->description)
                    ->textarea('observation','Observacion:','Observacion',$data->observation);
        }
        else
        {
            return FormX::make()
                ->input('description','Descripcion:','Descripcion')
                ->textarea('observation','Observacion:','Observacion');
        }
    }

}