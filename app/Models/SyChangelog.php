<?php //generated at 2021-05-09 08:26:16
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyChangelog extends Model {

use SoftDeletes;

protected $connection = 'mysql';
public $incrementing = true;//kalo pk bukan autoincrement set ke false
public $timestamps = true;
protected $hidden = [];
protected $table = 'sy_changelog';
protected $primaryKey = "id";
protected $fillable = [
'id',
'label',
'group',
'icon',
'link',
'status',
'version',
'note',
'changed_at',
'created_at',
'updated_at',
'created_by',
'updated_by',
'deleted_at',
];

public function rel_created_by() {
return $this->belongsTo(Users::class, 'created_by');
}

}