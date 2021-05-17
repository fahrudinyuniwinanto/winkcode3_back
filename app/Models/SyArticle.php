<?php //generated at 2021-03-28 21:06:01
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyArticle extends Model {
	
		use SoftDeletes;
	
	protected $connection = 'mysql';
	public $incrementing = 1;
	public $timestamps = 1;
	protected $hidden = [];
	//protected $dates = ['deleted_at'];
	protected $table = 'sy_article';
	protected $primaryKey = "id";
	protected $fillable = [
		'id',
		'judul',
		'sub_judul',
		'jenis',
		'note',
		'created_at',
		'created_by',
		'deleted_at',
		'updated_at',
	];

	public function rel_created_by() {
		return $this->belongsTo('App\Model\User', 'created_by');
	}

}