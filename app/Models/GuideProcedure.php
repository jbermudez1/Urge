<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 16/03/15
 * Time: 17:06
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GuideProcedure extends Model {

    protected $table = 'guideprocedures';
    protected $fillable = ['id_guide','id_procedure','id_town','url','tags','is_enabled'];

    public $relations = ['guide','procedure','town'];
    public $timestamps = true;

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