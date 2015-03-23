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

    public function encrypt()
    {
        $data = $this->getModel()->where('password',null)->get();

        foreach($data as $user)
        {
            return substr($user->email,0,strpos($user->email,'@'));
            $user->password = \Hash::make(substr($user->email,0,strpos($user->email,'@')));
        }
    }
}