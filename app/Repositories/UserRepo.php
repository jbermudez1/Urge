<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepo;
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 24/02/15
 * Time: 13:32
 */

class UserRepo extends BaseRepo {

    public function getModel()
    {
        return new User();
    }
}