<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/03/15
 * Time: 2:02
 */

namespace app\Repositories;


use App\Models\GuideTown_Procedure;
use App\Repositories\Base\BaseRepo;

class GuideTown_ProcedureRepo extends BaseRepo {

    public function getModel()
    {
        return new GuideTown_Procedure();
    }

}