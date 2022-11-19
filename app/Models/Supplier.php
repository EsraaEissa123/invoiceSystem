<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
