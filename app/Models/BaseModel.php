<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:25
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    public $relations = [];
    public $timestamps = true;
}