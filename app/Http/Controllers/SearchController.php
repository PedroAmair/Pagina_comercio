<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($searchType, $data, Request $request)
    {
        $search = $request->search;

        if($searchType == 'brand') {
            $results = Publication::select('id','product', 'image', 'price', 'brand')->where('brand', $data)->orWhere('product','LIKE', '%'.$data.'%')->latest()->paginate(30);
        }else if($searchType == 'category') {
            $results = Publication::select('id','product', 'image', 'price', 'brand')->where('category', $data)->latest()->paginate(30); 
        }else if($searchType == 'general') {
            $results = Publication::select('id','product', 'image', 'price', 'brand')->where('brand', $search)->orWhere('product','LIKE', '%'.$search.'%')->latest()->paginate(30);
        }

        foreach($results as $result) {
            $result->image = explode(",", $result->image);
        }

        return view('search.searchPage', [
            'results' => $results,
        ]);
    }

    public function show(Publication $publication)
    {
        $publication->description = explode(PHP_EOL, $publication->description);
        $publication->image = explode(",", $publication->image);

        return view('search.searchElement',[
            'publication' => $publication
        ]);
    }
}
