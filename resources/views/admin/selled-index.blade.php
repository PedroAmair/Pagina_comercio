@extends('layouts.app')

@section('title')
    <div class="my-5 flex items-center justify-center gap-1">
        My sales
    </div>
@endsection

@section('content')
    @if($allSells->count())
        <div class="grid grid-cols-1 p-5 gap-4">
            <div>
                <p class="text-center md:text-left font-bold text-xl">Sales total: {{$allSells->count()}}</p>
            </div>
                @foreach ($allSells as $key=>$value)
                    <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-gray-200"s>
                        <h2 id="accordion-color-heading-{{$key+1}}">
                            <button type="button" class="flex flex-col md:flex-row items-center md:justify-between w-full p-5 font-medium rtl:text-right border-2 border-gray-200 text-black rounded-t-xl hover:bg-gray-200 gap-3" data-accordion-target="#accordion-color-body-{{$key+1}}" aria-expanded="false" aria-controls="accordion-color-body-{{$key+1}}">
                                @foreach ($value->payments as $data)
                                    <div class="flex flex-col md:flex-row items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#03648B" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                            <path d="M12 7v10" />
                                        </svg>
                                        <p class="uppercase">Order code: <span class="font-bold lowercase">{{$data->pivot->order_code}}</span></p>
                                    </div>
                                    <p class="font-bold {{$data->pivot->status === 0 ? 'text-yellow-500' : 'text-green-500'}}">{{$data->pivot->status === 0 ? 'Processing' : 'Completed'}}</p>
                                    <div class="flex items-center gap-2">
                                        <p class="uppercase">Date of purchase: <span class="font-bold lowercase">{{date('d - m - Y', strtotime($data->pivot->created_at))}}</span></p>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </div>
                                @endforeach
                            </button>
                        </h2>
                        <div id="accordion-color-body-{{$key+1}}" class="hidden" aria-labelledby="accordion-color-heading-{{$key+1}}">
                            <div class="p-5 border-2 border-gray-200">
                                <ul class="list-disc flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="mb-4">
                                        <li class="ml-4">
                                            <div class="flex flex-col">
                                                @foreach ($value->payments as $payment)
                                                    @foreach ($buyer as $client)
                                                        @if ($client->id === $payment->user_id)
                                                            <p>Buyer: <span class="font-bold">{{ucfirst($client->username)}}</span></p>
                                                        @else
                                                            @continue
                                                        @endif
                                                    @endforeach
                                                    <p>Product: <span class="font-bold">{{$value->brand === 'amd' || $value->brand === 'evga' || $value->brand === 'msi' || $value->brand === 'xfx' ? strtoupper($value->brand).' '.$value->product :  ucwords($value->brand).' '.$value->product}}</span></p>
                                                    <p>Unit price: <span class="font-bold">{{$value->price}} $</span></p>
                                                    <p>Quantity: <span class="font-bold">{{$payment->pivot->quantity}}</span></p>
                                                    <p>Total: <span class="font-bold text-green-700">{{number_format($value->price*$payment->pivot->quantity, 2)}} $</span></p>
                                                @endforeach
                                            </div>
                                        </li>
                                    </div>

                                    <div class="mb-4 md:w-1/2 2xl:w-auto">
                                        <p class="text-center">
                                            Review the payment receipt and verify that the funds
                                             are in your bank account.
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-center gap-4">
                                        <div>
                                            @foreach ($value->payments as $voucher)
                                                <div>
                                                    <a 
                                                        href="{{asset('storage/vouchers/'.$voucher->voucher)}}"
                                                        target="blank"
                                                        rel="noreferrer noopener"
                                                        class="text-sky-800 hover:text-black"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6 w-14">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                        </svg>  
                                                        <p class="font-bold text-sm">Voucher</p>                                           
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div>
                                            <form action="{{route('selled.status', [auth()->user()->username, Crypt::encrypt($value)])}}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    @foreach ($value->payments as $checkStatus)
                                                        @if ($checkStatus->pivot->status === 0)
                                                            <div class="text-green-700 hover:text-black">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6 w-14">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <p class="font-bold text-sm">Confirm</p>
                                                            </div>
                                                        @else
                                                            <div class="text-red-700 hover:text-black">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-14">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                                                </svg>
                                                                <p class="font-bold text-sm">Cancel</p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div class="my-5">
              {{$allSells->links()}}
            </div>
        </div>
        @else
        <div class="flex flex-col items-center">
            <div>
                <p class="mt-[10%] uppercase text-4xl text-gray-200">Nothing to show here!</p>
            </div>
        </div>
    @endif
@endsection