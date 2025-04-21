<?php

namespace App\Http\Controllers;

use App\Models\Reputation;
use App\Models\Publication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($searchType, $data, Request $request)
    {
        $query = strip_tags($request->search); //Sanitizando la entrada
        $search = explode(' ', $query);

        if($searchType == 'brand') {
            $results = Publication::select('id','product', 'image', 'price', 'brand')
                ->where([['brand', $data], ['status', 1]])
                ->orWhere([['product','LIKE', '%'.$data.'%'], ['status', 1]])
                ->latest()
                ->paginate(30);

        }else if($searchType == 'category') {
            $results = Publication::select('id','product', 'image', 'price', 'brand')
                ->where([['category', $data],['status', 1]])
                ->latest()
                ->paginate(30);

        }else if($searchType == 'general') {
            if($search) {
                $results = Publication::where(function ($q) use ($search) {
                    foreach ($search as $keyword) {
                        $q->orWhere('product', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('brand', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('category', 'LIKE', '%' . $keyword . '%');
                    }
                })
                ->where('status', 1)
                ->latest()
                ->paginate(30);
            }else{
                $results = Publication::paginate(30);
            }
            
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

        $avgReputation = Reputation::where('seller_id', $publication->user_id)
            ->where('rated', 1)
            ->avg('calification');

        $individualRating = Reputation::select('calification')
            ->where('seller_id', $publication->user_id)
            ->where('rated', 1)
            ->get();

        $comments = Reputation::with(['payments.publications' => function ($query) use ($publication) {
            $query->where('user_id', $publication->user_id)
                ->latest();
            }])
            ->where('seller_id', $publication->user_id)
            ->where('rated', 1)
            ->latest()
            ->paginate(5);

        return view('search.searchElement',[
            'publication' => $publication,
            'avgReputation' => $avgReputation,
            'individualRating' => $individualRating,
            'comments' => $comments
        ]);
    }
}
