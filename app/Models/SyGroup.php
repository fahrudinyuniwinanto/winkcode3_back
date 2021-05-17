<?php //generated at 2021-04-04 10:26:40
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyGroup extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = true;
    public $timestamps    = true;
    protected $hidden     = [];
//protected $dates = ['deleted_at'];
    protected $table      = 'sy_group';
    protected $primaryKey = "id";
    protected $fillable   = [
        'id',
        'name',
        'note',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    public function rel_created_by()
    {
        return $this->belongsTo('App\Model\User', 'created_by');
    }

    public function isallow()
    {
        return $this->belongsTo('App\Model\User', 'created_by');
    }

}
