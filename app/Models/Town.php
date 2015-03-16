<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:11
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model {

    protected $table = 'towns';
    protected $fillable = ['description','observation'];

    public $relations = [];
    public $timestamps = true;

}