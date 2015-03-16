<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:09
 */

namespace App\Models;

use App\Models\BaseModel;

class Procedure extends BaseModel {

    protected $table ='procedures';
    protected $fillable = ['description'];

}