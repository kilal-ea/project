<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'citys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'idsec',
    ];

    /**
     * Get the sector that the city belongs to.
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'idsec', 'id');
    }
}
