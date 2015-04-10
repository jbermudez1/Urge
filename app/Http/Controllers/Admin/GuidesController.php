<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 9/04/15
 * Time: 20:46
 */

namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;
use App\Repositories\GuideRepo;
use App\Repositories\CategoryGuideRepo;

class GuidesController extends CrudController {

    protected $rules = array(
        'description' => 'required',
        'id_user'=> 'required|integer|min:1',
        'id_category_guide' => 'required|integer|min:1'
    );

    protected $module = '_guides';
    protected $categoryGuideRepo;

    public function __construct(GuideRepo $guideRepo, CategoryGuideRepo $categoryGuideRepo)
    {
        parent::__construct();
        $this->repo = $guideRepo;
        $this->categoryGuideRepo = $categoryGuideRepo;
    }

    public function fields($data = null)
    {
        if($data)
        {
            return FormX::make()
                ->select('id_category_guide','Categoria de Guia:',$this->categoryGuideRepo->lists(),$data->id_categpru_guide)
                ->input('description','Descripcion:','Descripcion',$data->description)
                ->hidden('id_user', $data->id_user);

        }
        else
        {
            return FormX::make()
                ->select('id_category_guide','Categoria de Guia:',$this->categoryGuideRepo->lists())
                ->input('description','Descripcion:','Descripcion')
                ->hidden('id_user', \Auth::id());
        }
    }


}