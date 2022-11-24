<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','purchase_price','sell_price','amount','category_id'];

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class,'store_product_inventory','product_id','inventory_id')->withPivot('amount')->withTimestamps();
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
    public function transactionInventories()
    {
        return $this->belongsToMany(Inventory::class,'store_product_inventory','product_id','inventory_id')->withPivot('amount')->withTimestamps();
    }
}

