<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        return response()->json(['Success'=>true,'Category' => Category::all(), 'Status' => 200]);
    }
    function store(Request $request)
    {
        $validater = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validater->fails()) {
            return response()->json([$validater->errors(), 400], 400);
        }
        $category = Category::create($request->all());
        return response()->json(['Success' => true, 'message' => 'category Added Successfully!', 'status' => 200], 200);
    }
}
