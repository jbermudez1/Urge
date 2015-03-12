<?php
use Illuminate\Database\Seeder;
use App\Repositories\UserRepo;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 12/03/15
 * Time: 1:25
 */

class UserTableSeeder extends Seeder {

    public function run()
    {
        $userRepo = new UserRepo();
        $userRepo->create([
            'first_name' => 'Yoel',
            'last_name' => 'Monzon',
            'email' => 'admin@hotmail.com',
            'password' => 'admin',
            'type' => 'administrator'
        ]);
    }
}