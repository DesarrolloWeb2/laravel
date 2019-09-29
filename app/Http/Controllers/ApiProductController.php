<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product)
        {
            return response()->json($product, 200);
        }
        return response()->json("Not found", 404);

    }

    public function update(Request $request, Product $product)
    {

        if ($request->has('name')) {
            $product->name = $request->name;
        }
        if ($request->has('description')) {
            $product->description = $request->description;
        }
        if ($request->has('price')) {
            $product->price = $request->price;
        }
        if ($request->has('sale_price')) {
            $product->sale_price = $request->sale_price;
        }

        if (!$product->isDirty()) {
            return response()->json("Not changes", 200);
        }

        $product->save();
        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){
                return response()->json("Not deleted", 200);
            }
        }
        return response()->json($product, 200);
    }
}
