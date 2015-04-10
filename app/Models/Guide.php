<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 16:56
 */

namespace App\Models;

use App\Models\BaseModel;

class Guide  extends BaseModel {
    protected $table = 'guides';
    protected $fillable = ['description','id_user','id_category_guide'];

    public $relations =['user','categoryguide'];

    public function user()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

    public function category_guide()
    {
        return $this->hasOne('App\Models\CategoryGuide','id','id_category_guide');
    }
}