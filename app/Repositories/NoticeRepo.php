<?php namespace App\Repositories;
use App\Repositories\Base\BaseRepo;
use App\Models\Notice;

/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 12/03/15
 * Time: 1:31
 */

class NoticeRepo extends BaseRepo {

    public function getModel()
    {
        return new Notice();
    }

    public function getOrderByDate()
    {
        return $this->getModel()
                    ->orderBy('created_at','DESC')
                    ->get();
    }
}