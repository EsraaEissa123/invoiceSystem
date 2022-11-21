<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{

    public function index()
    {
        $supplier = Supplier::get();
        return SupplierResource::collection($supplier);
    }


    public function store(SupplierRequest $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required|string|unique:suppliers|min:5|max:255',
        //         'phone' => 'required|string|unique:suppliers|min:11|max:255'

        //     ]
        // );
        // if ($validator->fails()) {
        //     return response()->json(
        //         [
        //             'error' => true,
        //             'errors' => $validator->errors()
        //         ],
        //         422
        //     );
        // }

        $supplier = new Supplier(['name' => $request->name, 'phone' => $request->phone]);
        $supplier->save();
        return  new SupplierResource($supplier);
    }


    public function show(Supplier $supplier)
    {
        return  new SupplierResource($supplier);
    }


    public function update(SupplierRequest $request, Supplier $supplier)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required|string|unique:suppliers|min:5|max:255',
        //         'phone' => 'required|string|unique:suppliers|min:11|max:255'

        //     ]
        // );
        // if ($validator->fails()) {
        //     return response()->json(
        //         [
        //             'error' => true,
        //             'errors' => $validator->errors()
        //         ],
        //         422
        //     );
        // }
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->save();
        return  new SupplierResource($supplier);
    }


    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        // return response()->json(null, 204);
        return response()->json(
            [
                'error' => false,
                'message' => " the supplier with  $supplier->id is deleted successfully"
            ],
            200
        );
    }
}
