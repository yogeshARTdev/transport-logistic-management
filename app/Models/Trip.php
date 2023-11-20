<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public $table = 'trip';
    protected $fillable = [ 'vehicle_id', 'driver_id', 'goods_id', 'quantity', 'from', 'to' ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
