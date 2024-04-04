<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trucks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idS', 'idcity', 'idstock',
    ];

    /**
     * Get the user that owns the truck.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idS', 'id');
    }

    /**
     * Get the city that the truck belongs to.
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'idcity', 'id');
    }

    /**
     * Get the stock that the truck belongs to.
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'idstock', 'id');
    }
}