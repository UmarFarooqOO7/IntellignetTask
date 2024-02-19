<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $string = "Welcome to the Product API.";
        return response()->json($string);
    }
    public function allProducts()
    {
        $products = Products::all();
        return $products;
    }
    public function singleProduct($id)
    {
        $product = Products::where('id', $id)->first();
        return $product;
    }
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required|max:8|min:2',
            'quantity' => 'required',
        ]);

        $product = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return response()->json($product, 201);

    }
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        $product->delete();

        return response()->json(null, 204);
    }
    public function productSorted()
    {
        $products = Products::orderBy('price', 'asc')->get();
        return response()->json($products);
    }

}
