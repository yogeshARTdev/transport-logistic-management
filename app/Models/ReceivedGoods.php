<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedGoods extends Model
{
    use HasFactory;

    public $table = 'received_goods';
    protected $fillable = [ 'good_id', 'category_id', 'supplier_id', 'client_id', 'quantity', 'size', 'weight', 'amount' ];

    public function good()
    {
        return $this->belongsTo(Goods::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
