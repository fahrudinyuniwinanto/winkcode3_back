<?="<?php //generated at ".date("Y-m-d H:i:s")?>

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
@if ($h->softdeletes)
use Illuminate\Database\Eloquent\SoftDeletes;
@endif

class {{$h->tblUper}} extends Model {

@if ($h->softdeletes)
use SoftDeletes;
@endif

protected $connection = 'mysql';
public $incrementing = {{$h->autoincrement==1?'true':'false'}};//kalo pk bukan autoincrement set ke false
public $timestamps = {{$h->timestamps==1?'true':'false'}};
protected $hidden = [];
protected $table = '{{$h->tblLower}}';
protected $primaryKey = "{{$h->pk}}";
protected $fillable = [
<?php foreach ($dataFields as $key => $v): ?>
'{{$v->COLUMN_NAME}}',
<?php endforeach?>
];

public function rel_created_by() {
return $this->belongsTo(Users::class, 'created_by');
}

}