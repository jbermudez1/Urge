<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:13
 */

namespace App\Repositories;


use App\Models\Town;
use App\Repositories\Base\BaseRepo;

class TownRepo extends BaseRepo {

    public function getModel()
    {
        return new Town();
    }

}