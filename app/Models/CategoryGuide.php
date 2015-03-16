<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:04
 */

namespace App\Models;

use App\Models\BaseModel;

class CategoryGuide extends  BaseModel {
    protected $table ='categoryguides';
    protected $fillable = ['description','id_user'];

    public $relations = ['user'];

    public function user()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

}