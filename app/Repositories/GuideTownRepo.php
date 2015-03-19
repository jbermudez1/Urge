<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:11
 */

namespace App\Repositories;


use App\Models\GuideProcedure;
use App\Models\GuideTown;
use App\Repositories\Base\BaseRepo;

class GuideTownRepo extends BaseRepo {

    public function getModel()
    {
        return new GuideTown();
    }

}