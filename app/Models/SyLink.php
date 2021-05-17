<?php //generated at 2021-03-28 20:24:16
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyLink extends Model {
	
		use SoftDeletes;
	
	protected $connection = 'mysql';
	public $incrementing = 1;
	public $timestamps = 1;
	protected $hidden = [];
	//protected $dates = ['deleted_at'];
	protected $table = 'sy_link';
	protected $primaryKey = "id";
	protected $fillable = [
		'id',
		'rel',
		'key1',
		'key2',
		'key3',
		'key4',
		'key5',
		'tbl1',
		'tbl2',
		'tbl3',
		'tbl4',
		'tbl5',
		'created_by',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function rel_created_by() {
		return $this->belongsTo('App\Model\User', 'created_by');
	}

}