@extends('layouts.app')

@section('title')
    <div class="my-5 flex items-center justify-center gap-1">
        My shopping
    </div>
@endsection

@section('content')
    
    @if(count($allShops))
    <div class="grid grid-cols-1 p-5 gap-4">
        <div>
            <p class="text-center md:text-left font-bold text-xl">Orders total: {{auth()->user()->payments->count()}}</p>
        </div>
            @foreach ($allShops as $key=>$value)
                <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-gray-200">
                    <h2 id="accordion-color-heading-{{$key+1}}">
                        <button type="button" class="flex flex-col md:flex-row items-center md:justify-between w-full p-5 font-medium rtl:text-right border-2 border-gray-200 text-black rounded-t-xl hover:bg-gray-200 gap-3" data-accordion-target="#accordion-color-body-{{$key+1}}" aria-expanded="false" aria-controls="accordion-color-body-{{$key+1}}">
                            <div class="flex flex-col md:flex-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-bag-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#03648B" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.5 3.248" />
                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                    <path d="M15 19l2 2l4 -4" />
                                </svg>
                                <p class="uppercase">Order code: <span class="font-bold lowercase">{{$value->publications[0]->pivot->order_code}}</span></p>
                            </div> 
                            <p class="font-bold {{$value->publications[0]->pivot->status === 0 ? 'text-yellow-500' : 'text-green-500'}}">{{$value->publications[$key]->pivot->status === 0 ? 'Processing' : 'Completed'}}</p>
                            <div class="flex items-center gap-2">
                                <p class="uppercase">Date of purchase: <span class="font-bold lowercase">{{date('d - m - Y', strtotime($value->publications[0]->pivot->created_at))}}</span></p>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </div>
                        </button>
                    </h2>
                    <div id="accordion-color-body-{{$key+1}}" class="hidden" aria-labelledby="accordion-color-heading-{{$key+1}}">
                        <div class="p-5 border-2 border-gray-200">
                            <ul class="list-disc flex flex-col md:flex-row md:items-center md:justify-between">
                                <div class="mb-4">
                                    @foreach ($value->publications as $shop)
                                        <li class="ml-4">
                                            <div class="flex gap-1">
                                                <p class="font-bold">{{$shop->pivot->quantity}}</p>
                                                <p>{{$shop->brand === 'amd' || $shop->brand === 'evga' || $shop->brand === 'msi' || $shop->brand === 'xfx' ? strtoupper($shop->brand).' '.$shop->product :  ucwords($shop->brand).' '.$shop->product}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </div>

                                <div class="mb-4 md:w-1/2 2xl:w-auto">
                                    <p class="text-center">
                                        Once your payment is confirmed the order will
                                        be delivered immediately to the address you 
                                        registered on our website.
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xl font-bold text-red-700 text-center md:text-left">-{{$value->total}} $</p>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        <div class="my-5">
            {{$allShops->links()}}
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

@section('sccripts')
    
@endsection