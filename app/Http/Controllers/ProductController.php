<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function Create()
    {
        return view('products.create');
    }
    public function Store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('products.index'));
    }
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'Quantity' => 'required|numeric',
        ]);

        $product->update($data);
        return redirect(route('products.index'))->with('sucess','Product update Successfly');
    }
    
    public function delete(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product deleted Succesffully');
    }
    public function RawQuery()
    {
        $products = DB::select("SELECT * FROM products");
        return view('products.rawquery', ['products' => $products]);
    }
}
