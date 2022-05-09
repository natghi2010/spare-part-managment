<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductUnit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('unit')->get();

        return view('list-products', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return view('create-edit-product', ['product' => $product]);
    }

    public function create()
    {
        $product_units = ProductUnit::all();
        return view('create-edit-product', ['product_units' => $product_units]);
    }

    public function edit(Product $product)
    {
        $product_units = ProductUnit::all();
        return view('create-edit-product', ['product_units'=>$product_units,'product' => $product]);
    }

    public function store(Request $request){
         Product::create($request->all());
         return redirect(route('products.index'))->with('mssg','Successfully created a Product');
    }

    public function update(Request $request){
        Product::find($request->id)->update($request->all());
        return redirect(route('products.index'))->with('mssg','Successfully Updated a Product');
   }
}
