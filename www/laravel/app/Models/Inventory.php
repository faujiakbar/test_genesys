<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'harga',
        'stok'
    ];

    protected $table = "inventory";
    protected $primaryKey = "inventory_id";
}
