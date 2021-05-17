<?php //generated at 2021-02-23 14:48:27
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketWisata extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = 1;
    public $timestamps    = 1;
    protected $hidden     = [];
    //protected $dates = ['deleted_at'];
    protected $table      = 'paket_wisata';
    protected $primaryKey = "id";
    protected $fillable   = [
        'id',
        'id_destinasi',
        'nama_paket_wisata',
        'deskripsi',
        'harga',
        'alamat',
        'kontak_person',
        'titik_koordinat',
        'note',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rel_created_by()
    {
        return $this->belongsTo('App\Model\User', 'created_by');
    }

}
