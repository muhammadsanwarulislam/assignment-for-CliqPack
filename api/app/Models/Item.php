<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'quantity', 'inventory_id'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
