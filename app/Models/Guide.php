<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 16:56
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Guide  extends Model{
    protected $table = 'guides';
    protected $fillable = ['description','id_user','id_category_guide'];

    public $relations =['user','categoryguide'];
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

    public function categoryguide()
    {
        return $this->hasOne('App\Models\CategoryGuide','id','id_category_guide');
    }
}