<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:06
 */

namespace App\Repositories;


use App\Models\Procedure;
use App\Repositories\Base\BaseRepo;

class ProcedureRepo extends BaseRepo {

    public function getModel()
    {
        return new Procedure();
    }

}