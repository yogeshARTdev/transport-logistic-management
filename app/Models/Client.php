<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $table = 'client';
    protected $fillable = [ 'name', 'email', 'gstin', 'mobile', 'address', 'city', 'state_id', 'zip' ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
