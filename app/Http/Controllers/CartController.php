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
        $productQuantity = Cart::content();
        $notAvaliable = 0;

        foreach($productQuantity as $product) {
            $DBproduct = Publication::find($product->id);

            if($DBproduct->quantity === 0 || $DBproduct->status === 0) {
                Cart::remove($product->rowId);
                $notAvaliable = 1;
            }
        }

        return view('shoppingCart.index', [
            'notAvaliable' => $notAvaliable
        ]);
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

    public function NEQ()
    {
        $quantity = Cart::content();
        $elements = [];

        foreach($quantity as $product) {
            $DBquantity = Publication::find($product->id);

            if($product->qty > $DBquantity->quantity) {
                $elements[] = [
                    'id' => $product->rowId,
                    'quantity' => $DBquantity->quantity
                ];
            }
        }

        if(empty($elements)) {
            return redirect()->route('payment.index');
        }else{
            return back()->with('elements', $elements);
        }
    }

    public function clear()
    {
        Cart::destroy();

        return back();
    }
}
