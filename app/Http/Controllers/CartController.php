<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index()
    {
        return view('shoppingCart.index');
    }

    public function store(Request $request, Publication $publication)
    {
        $this->validate($request, [
            'quantityUnits' => 'required'
        ]);

        $publication->image = explode(",", $publication->image);
        $publicationBrandAndProoduct = $publication->brand.' '.$publication->product;

        Cart::add(
            $publication->id,
            $publicationBrandAndProoduct,
            $request->quantityUnits,
            $publication->price,
            ["image" => $publication->image]
        );

        return redirect()->back()->with("success", $publication->product." added to cart");
    }

    public function destroy($rowItem)
    {
        $rowItem = Crypt::decrypt($rowItem);

        Cart::remove($rowItem);

        return back()->with('delete', 'delete');
    }

    public function clear()
    {
        Cart::destroy();

        return back();
    }
}
