<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 12:54
 */

namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;

use App\Repositories\CategoryGuideRepo;

class CategoryGuidesController extends CrudController {

    protected $rules = array(
        'description' => 'required',
        'id_user' => 'required'
    );

    protected $module = '_categoryguides';

    function __construct(CategoryGuideRepo $categoryGuideRepo)
    {
        parent::__construct();
        $this->repo = $categoryGuideRepo;
    }

    function fields($data = null)
    {
        if($data)
        {
            return FormX::make()
                ->hidden('id_user',$data->id_user)
                ->input('description','Descripcion:','Descripcion',$data->description);
        }
        else
        {
            return FormX::make()
                ->hidden('id_user',\Auth::id())
                ->input('description','Descripcion:','Descripcion');
        }
    }

}