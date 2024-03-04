<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function Index()
   {
        return view('products.index');
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
}
