<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products-show');
    }

    public function create()
    {
        return view('admin.products-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:75|unique:products',
            'brand' => 'required|max:25',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|max:300',
            'image' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return redirect()->route('products.index')->with('message', 'Data saved');
    }
}
