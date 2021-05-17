<?php //generated at 2021-05-17 09:04:16
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = true; //kalo pk bukan autoincrement set ke false
    public $timestamps    = true;
    protected $hidden     = [];
    protected $table      = 'desa';
    protected $primaryKey = "id_desa";
    protected $fillable   = [
        'id_desa',
        'desa',
        'id_kecamatan',
        'note',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
    ];

    public function rel_created_by()
    {
        return $this->belongsTo(Users::class, 'created_by');
    }

    public function rel_kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

}
