<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:09
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model {

    protected $table ='procedures';
    protected $fillable = ['description'];

    public $relations = [];
    public $timestamps = true;

}