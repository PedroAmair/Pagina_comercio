<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use App\Support\Collection;
use App\Models\PaymentPublications;
use Illuminate\Support\Facades\Crypt;

class SellController extends Controller
{
    public function index()
    {
        $sells = Publication::where('user_id', auth()->user()->id)
            ->with(['payments' => function ($query) {
                $query->latest();
            }])
            ->has('payments')
            ->get();
        
        $buyer = User::with(['payments' =>function ($query) {
            $query->where('seller_id', auth()->user()->id);
        }])
            ->has('payments')
            ->get();

        $allSells = (new Collection($sells))->paginate(10);
       
        return view('admin.selled-index', [
            'allSells' => $allSells,
            'buyer' => $buyer
        ]);
    }

    public function changeStatus($ignoredUsername = null, $status)
    {
        $data = Crypt::decrypt($status);
        
        foreach($data->payments as $track) {
            $actualStatus = $track->pivot->status;
            $id = $track->pivot->id;
        }

        if($actualStatus === 0) {
            $newStatus = 1;
        }else{
            $newStatus = 0;
        }

        $paymentStatus = PaymentPublications::find($id);
        $paymentStatus->status = $newStatus;
        $paymentStatus->save();

        return back();
    }
}
