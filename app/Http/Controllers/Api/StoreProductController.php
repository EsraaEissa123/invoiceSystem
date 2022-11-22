<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Client\Request;

class StoreProductController extends Controller
{
    public function StoreProduct(StoreProductRequest $request){
        $amount = $request->amount;
         $product = Product::findOrFail($request->product_id);
         $product -> inventories()
         ->attach($request->inventory_id,['amount' => $amount]);
         $product->amount += $amount;
         $product->save();
         return "product has been added to the selected inventory";
    }
}
