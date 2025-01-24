<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Direction;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PaymentPublications;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request, Direction $direction)
    {
        $request->session()->put('userDirection', $direction);

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

        $payment = [];

        foreach(Cart::content() as $data) {
            $product_id = Publication::find($data->id); 
            $seller_id = $product_id->user_id;

            $payment[] = [
                'type' => $paymentType,
                'origin' => $request->bank,
                'reference' => $request->paymentNumber,
                'date' => $request->date,
                'voucher' =>$voucherName,
                'total' => Cart::total(),
                'user_id' => auth()->user()->id,
                'seller_id' => $seller_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        Payment::insert($payment);

        $paymentId = Payment::Select('id')->latest()->first();
        $orderCode = Str::uuid();

        $payment_publications = [];

        foreach(Cart::content() as $element) {
            $payment_publications[] = [
                'payment_id' => $paymentId->id,
                'publication_id' => $element->id,
                'quantity' => $element->qty,
                'order_code' => $orderCode,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $quantityDB = Publication::find($element->id);
            $quantityDelete = ($quantityDB->quantity - $element->qty);
            $quantityDB->quantity = $quantityDelete;
            $quantityDB->save();
            
        }

        PaymentPublications::insert($payment_publications);

        Cart::destroy();

        $request->session()->put('userPayment', $paymentId->id);

        return redirect()->route('payment.confirmation');
        
    }

    public function addressConfirmation()
    {
        $allDirections = Direction::where('user_id', auth()->user()->id)
        ->orderBy('is_default', 'desc')
        ->paginate(5);
        
        return view('payment.addressSelection', [
            'allDirections' => $allDirections
        ]);
    }

    public function confirmation(Request $request)
    {
        $userPayment = $request->session()->get('userPayment');
        $userDirection = $request->session()->get('userDirection');

        $purchasedProducts = Payment::with('publications')
            ->where('id', $userPayment)
            ->get();

        foreach($purchasedProducts[0]->publications as $item) {
            $item->image = explode(",", $item->image);
        }

        $products = Publication::all()->shuffle()->take(6);

        foreach($products as $product) {
            $product->image = explode(",", $product->image);
        }

        return view('payment.confirmation', [
            'purchasedProducts' => $purchasedProducts,
            'products' => $products,
            'userDirection' => $userDirection
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
