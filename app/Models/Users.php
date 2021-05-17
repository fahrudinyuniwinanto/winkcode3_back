<?php //generated at 2021-02-08 13:47:03
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = 1;
    public $timestamps    = 1;
    // protected $hidden = [];
    //protected $dates = ['deleted_at'];
    protected $table      = 'users';
    protected $primaryKey = "id";
    protected $fillable   = [
        'id',
        'id_group',
        'password',
        'username',
        'email_verified_at',
        'nama_lengkap',
        'email',
        'gender',
        'nomor_hp',
        'note',
        'remember_token',
        'created_at',
        'created_by',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function group()
    {
        // echo('xx');
        return $this->belongsTo(\App\Models\SyGroup::class, 'id_group', 'id');
    }

}
