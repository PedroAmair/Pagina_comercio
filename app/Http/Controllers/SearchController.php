<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($searchType, $data, Request $request)
    {
        $search = $request->search;

        if($searchType == 'brand') {
            $results = Product::where('brand', $data)->orWhere('name','LIKE', '%'.$data.'%')->latest()->paginate(30);
        }else if($searchType == 'category') {
            $results = Product::where('category', $data)->latest()->paginate(30); 
        }else if($searchType == 'general') {
            $results = Product::where('brand', $search)->orWhere('name','LIKE', '%'.$search.'%')->latest()->paginate(30);
        }

        return view('search.searchPage', [
            'results' => $results,
        ]);
    }

    public function show(Product $product)
    {
        $product->description = explode(PHP_EOL, $product->description);

        return view('search.searchElement',[
            'product' => $product
        ]);
    }
}
