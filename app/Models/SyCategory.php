<?php //generated at 2021-03-28 21:01:58
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyCategory extends Model {
	
		use SoftDeletes;
	
	protected $connection = 'mysql';
	public $incrementing = 1;
	public $timestamps = 1;
	protected $hidden = [];
	//protected $dates = ['deleted_at'];
	protected $table = 'sy_category';
	protected $primaryKey = "id";
	protected $fillable = [
		'id',
		'name',
		'value',
		'note',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
		'deleted_at',
	];

	public function rel_created_by() {
		return $this->belongsTo('App\Model\User', 'created_by');
	}

}