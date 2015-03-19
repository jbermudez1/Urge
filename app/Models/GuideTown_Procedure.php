<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/03/15
 * Time: 1:59
 */

namespace App\Models;


class GuideTown_Procedure extends BaseModel {

    protected $table = 'guidetowns_procedures';
    protected $fillable = ['id_guide_town','id_town','is_enabled'];

    public $relations = ['guidetown','town'];

    public function guidetown()
    {
        return $this->hasOne('App\Models\GuideTown','id','id_guide_town');
    }

    public function town()
    {
        return $this->hasOne('App\Models\Town','id','id_town');
    }

}