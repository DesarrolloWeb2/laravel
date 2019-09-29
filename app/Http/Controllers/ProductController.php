<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('products.list', ['products' => $products]);
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:255'
        ];

        $this->validate($request, $rules);

        Product::create($request->all());

        $message = "Record created!";

        $products = Product::get();
        return view('products.list', ['products' => $products, 'message' => $message]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $reglas = [
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:255'
        ];

        $this->validate($request, $reglas);

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
            return view('products.edit', ['product' => $product]);
        }

        $product->save();
        return view('products.show', ['product' => $product]);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){
                $message['error'] = True;
                $message['error_message'] = 'El Centro no puede ser Eliminado';
            }
        }
        $products = Product::get();
        return view('products.list', ['products' => $products]);
    }
}
