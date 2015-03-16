<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryGuide extends  Model{
    protected $table ='categoryguides';
    protected $fillable = ['description','id_user'];

    public $relations = ['user'];
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

}