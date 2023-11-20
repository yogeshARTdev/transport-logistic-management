<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $table = 'driver';
    protected $fillable = [ 'name', 'mobile', 'license', 'license_file', 'address', 'state_id', 'city', 'zip' ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
