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
    public function RawEdit($id)
    {
        // $products = DB::select("SELECT * FROM products")->firstOrDefault;
        //$product = Product::find($id); // 1 ci variant
        $sql = "SELECT * FROM products WHERE id = :id";
        $product = DB::select($sql, ['id' => $id]);
        $product = reset($product);


        return view('products.raw_edit', ['product' => $product]);
    }
    public function RawUpdate(Request $request,$id)
    {
        // dd($request);
        $sql = "UPDATE products SET name = :name , Quantity = :quantity where id = :id";
        DB::update($sql, 
                    [
                        'id' => $id,
                        'name' => $request->name,
                        'quantity' => $request->Quantity
                    ]);
        return redirect(route('products.rawquery'))->with('sucess','Product update Successfly');
    }
}
