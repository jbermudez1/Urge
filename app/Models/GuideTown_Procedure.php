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
    protected $fillable = ['id_guide_town','id_procedure','url','is_enabled','price','id_agency'];

    public $relations = ['guidetown','procedure','agency'];

    public function guidetown()
    {
        return $this->hasOne('App\Models\GuideTown','id','id_guide_town');
    }

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure','id','id_procedure');
    }

    public function agency()
    {
        return $this->hasOne('App\Models\Agency','id','id_agency');
    }

}