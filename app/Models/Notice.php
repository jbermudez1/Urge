<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 24/02/15
 * Time: 12:41
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

    protected $table ='notices';
    protected $fillable = ['image','title','description','tags','id_user'];
    public $relations = ['user'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('Admin\Models\User','id','id_user');
    }
}