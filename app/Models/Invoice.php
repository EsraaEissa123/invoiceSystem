<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    use HasFactory;
    protected $fillable = ['code', 'total', 'status','paid', 'type'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'make_invoices_purchases','supplier_id', 'product_id','invoice_id')->withPivot('amount', 'purchase_price')->withTimestamps();    }
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class);
    }
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'make_invoices_purchases','supplier_id', 'product_id','invoice_id')->withPivot('amount', 'purchase_price')->withTimestamps();

    }
    
    public function sellProducts()
    {
        return $this->belongsToMany(Product::class, 'make_invoices_sales','customer_id', 'product_id','invoice_id')->withPivot('amount', 'sell_price')->withTimestamps();
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'make_invoices_sales','customer_id', 'product_id','invoice_id')->withPivot('amount', 'sell_price')->withTimestamps();
        
    }
}
