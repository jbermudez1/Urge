<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:10
 */

namespace app\Repositories;


use App\Models\CategoryGuide;
use App\Repositories\Base\BaseRepo;

class CategoryGuideRepo extends BaseRepo {

    public function getModel()
    {
        return new CategoryGuide();
    }

}