<?php //generated at 2021-04-04 10:27:02
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyAccess extends Model {

use SoftDeletes;

protected $connection = 'mysql';
public $incrementing = true;
public $timestamps = true;
protected $hidden = [];
//protected $dates = ['deleted_at'];
protected $table = 'sy_access';
protected $primaryKey = "id";
protected $fillable = [
'id',
'accessname',
'accessgroup',
'location',
'note',
'created_by',
'created_at',
'updated_at',
'deleted_at',
];

public function rel_created_by() {
return $this->belongsTo('App\Model\User', 'created_by');
}

}