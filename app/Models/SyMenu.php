<?php //generated at 2021-04-12 13:37:04
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyMenu extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    public $incrementing  = true;
    public $timestamps    = true;
    protected $hidden     = [];
//protected $dates = ['deleted_at'];
    protected $table      = 'sy_menu';
    protected $primaryKey = "id";
    protected $fillable   = [
        'id',
        'label',
        'redirect',
        'url',
        'parent',
        'icon',
        'order_no',
        'note',
        'page',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_at',
    ];

    public function rel_created_by()
    {
        return $this->belongsTo('App\Model\User', 'created_by');
    }

    public function rel_symenu()
    {
        return $this->hasMany(SyMenu::class, 'parent', 'id');
    }
    public function rel_parent()
    {
        return $this->belongsTo(SyMenu::class, 'parent', 'id');
    }

}
