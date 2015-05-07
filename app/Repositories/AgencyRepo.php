<?php
/**
 * Created by PhpStorm.
 * User: julia_000
 * Date: 06/05/2015
 * Time: 3:37 PM
 */

namespace app\Repositories;
use app\Models\Agency;
use App\Repositories\Base\BaseRepo;


class AgencyRepo extends BaseRepo {
    public function getModel()
    {
        return new Agency();
    }

}