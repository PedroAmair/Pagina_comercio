<?php

namespace App\Http\Controllers;

use App\Models\Publication;
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
            return redirect()->route('payment.addressSelection');
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
