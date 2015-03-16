<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:11
 */

namespace App\Models;

use App\Models\BaseModel;

class Town extends BaseModel {

    protected $table = 'towns';
    protected $fillable = ['description','observation'];

}