<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','amount','category_id'];

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
}
