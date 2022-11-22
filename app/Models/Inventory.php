<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['name','location','type'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
