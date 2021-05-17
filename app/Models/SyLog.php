<?php //generated at 2021-03-28 20:51:55
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyLog extends Model {
	
		use SoftDeletes;
	
	protected $connection = 'mysql';
	public $incrementing = 1;
	public $timestamps = 1;
	protected $hidden = [];
	//protected $dates = ['deleted_at'];
	protected $table = 'sy_log';
	protected $primaryKey = "id";
	protected $fillable = [
		'id',
		'trs',
		'doc_no',
		'activity',
		'tag',
		'ip_client',
		'created_by',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function rel_created_by() {
		return $this->belongsTo('App\Model\User', 'created_by');
	}

}