<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['Success' => false, 'message' => $validator->errors(), 'status' => 400], 400);
        }
        Product::create($request->all());
        return response()->json(['Success' => true, 'Message' => "Product Added Successfully!", 'status' => 200]);
    }
    function show(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if ($product) {
            return response()->json(['Success' => true, 'Product' => $product, 'sataus' => 200]);
        } else {
            return response()->json(['Success' => false, 'Message' => 'Product Not Found', 'sataus' => 404]);
        }
    }
    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['Success' => false, 'message' => $validator->errors(), 'status' => 400], 400);
        }
        $product = Product::where('id', $request->id)->first();

        $product->update($request->all());
        return response()->json(['Success' => true, 'message' => 'Product Updated Successfully!', 'Product' => $product, 'sataus' => 200]);
    }
    function delete(Request $request)
    {
        Product::destroy($request->id);
        return response()->json(['Success' => true, 'message' => 'Product Deleted Successfully!', 'sataus' => 200]);
    }
}
