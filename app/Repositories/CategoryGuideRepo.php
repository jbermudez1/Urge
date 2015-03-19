<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:10
 */

namespace App\Repositories;


use App\Models\CategoryGuide;
use App\Repositories\Base\BaseRepo;

class CategoryGuideRepo extends BaseRepo {

    public function getModel()
    {
        return new CategoryGuide();
    }

    public function lists()
    {
        return $this->getModel()
                    ->orderBy('description','ASC')
                    ->lists('description','id');
    }

}