<?php //generated at 2021-04-30 10:36:13
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DestinasiWisata extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = true;
    public $timestamps    = true;
    protected $hidden     = [];
//protected $dates = ['deleted_at'];
    protected $table      = 'destinasi_wisata';
    protected $primaryKey = "id";
    protected $fillable   = [
        'id',
        'nama_destinasi_wisata',
        'deskripsi',
        'alamat',
        'fasilitas',
        'kontak_person',
        'sosmed',
        'id_kecamatan',
        'id_desa',
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

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

}
