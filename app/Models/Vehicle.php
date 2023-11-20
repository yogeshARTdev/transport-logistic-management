<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $table="vehicle";

    protected $fillable = [ 'vehicle_type', 'registration_number', 'registration_certificate', 'insurence_file', 'fc_certificate' ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class,'vehicle_type','id');
    }
}
