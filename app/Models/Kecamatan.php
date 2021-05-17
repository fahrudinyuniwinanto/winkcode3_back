<?php //generated at 2021-05-17 09:01:17
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model {

use SoftDeletes;

protected $connection = 'mysql';
public $incrementing = true;//kalo pk bukan autoincrement set ke false
public $timestamps = true;
protected $hidden = [];
protected $table = 'kecamatan';
protected $primaryKey = "id_kecamatan";
protected $fillable = [
'id_kecamatan',
'kecamatan',
'id_kabupaten',
'note',
'created_at',
'created_by',
'updated_at',
'updated_by',
'deleted_at',
];

public function rel_created_by() {
return $this->belongsTo(Users::class, 'created_by');
}

}