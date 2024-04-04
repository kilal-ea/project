<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'idS', 'idCity', 'status'
    ];

    /**
     * Get the user that owns the client.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idS');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'idCity');
    }
}
