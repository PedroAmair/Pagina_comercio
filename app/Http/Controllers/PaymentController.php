<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('payment.index');
    }

    public function store(Request $request, $paymentType)
    {
        $this->validate($request, [
            'bank' => 'required',
            'paymentNumber' => 'required',
            'date' => 'required|date',
            'voucher' => 'required|mimes:pdf,jpg,jpeg'
        ]);

        $voucher = $request->file('voucher');
        $voucherPath = $voucher->store('public/vouchers');
        $voucherName = str_replace('public/vouchers/', '', $voucherPath);

        $request->user()->payments()->create([
            'type' => $paymentType,
            'origin' => $request->bank,
            'reference' => $request->paymentNumber,
            'date' => $request->date,
            'voucher' =>$voucherName,
            'user_id' => auth()->user()->id
        ]);
    }

    public function paypal()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "aplication_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => Cart::total()
                    ]
                ]
            ]
        ]);

        //dd($response);
        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success(Request $request)
    {
        //dd($request);
    }

    public function cancel()
    {

    }
}
