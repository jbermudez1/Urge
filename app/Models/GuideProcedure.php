<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:06
 */

namespace App\Models;

use App\Models\BaseModel;

class GuideProcedure extends BaseModel {

    protected $table = 'guideprocedures';
    protected $fillable = ['id_guide','id_procedure','id_town','url','tags','is_enabled'];

    public $relations = ['guide','procedure','town'];

    public function guide()
    {
        return $this->hasOne('App\Models\Guide','id','id_guide');
    }

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure','id','id_procedure');
    }

    public function town()
    {
        return $this->hasOne('App\Models\Town','id','id_town');
    }
}