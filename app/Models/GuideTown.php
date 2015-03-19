<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:06
 */

namespace App\Models;

use App\Models\BaseModel;

class GuideTown extends BaseModel {

    protected $table = 'guidetowns';
    protected $fillable = ['id_guide','id_town','description','url','tags'];

    public $relations = ['guide','town'];

    public function guide()
    {
        return $this->hasOne('App\Models\Guide','id','id_guide');
    }

    public function town()
    {
        return $this->hasOne('App\Models\Town','id','id_town');
    }
}