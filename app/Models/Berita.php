<?php //generated at 2021-04-12 11:32:49
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model {

use SoftDeletes;

protected $connection = 'mysql';
public $incrementing = true;
public $timestamps = true;
protected $hidden = [];
//protected $dates = ['deleted_at'];
protected $table = 'berita';
protected $primaryKey = "id_berita";
protected $fillable = [
'id_berita',
'judul',
'isi',
'deskripsi',
'note',
'created_at',
'created_by',
'updated_at',
'deleted_at',
];

public function rel_created_by() {
return $this->belongsTo('App\Model\User', 'created_by');
}

}