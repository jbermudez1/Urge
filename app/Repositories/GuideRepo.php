<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:07
 */

namespace App\Repositories;


use App\Models\Guide;
use App\Repositories\Base\BaseRepo;

class GuideRepo extends BaseRepo {

    public function getModel()
    {
        return new Guide();
    }
}