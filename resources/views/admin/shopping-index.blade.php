@extends('layouts.app')

@section('title')
    <div class="my-5 flex items-center justify-center gap-1">
        My shopping
    </div>
@endsection

@section('content')
    @if($allShops->count())
        <div class="grid grid-cols-1 p-5 gap-4">
            <div>
                <p class="text-center md:text-left font-bold text-xl">Orders total: {{$allShops->count()}}</p>
            </div>
                @foreach ($allShops as $key=>$value)
                    <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-gray-200">
                        <h2 id="accordion-color-heading-{{$key+1}}">
                            <button type="button" class="flex flex-col md:flex-row items-center md:justify-between w-full p-5 font-medium rtl:text-right border-2 border-gray-200 text-black rounded-t-xl hover:bg-gray-200 gap-3" data-accordion-target="#accordion-color-body-{{$key+1}}" aria-expanded="false" aria-controls="accordion-color-body-{{$key+1}}">
                                @foreach ($value[0]->publications as $data)
                                    @if($data->pivot->status !== 1)
                                        {{$allTrue = false}}
                                    @endif
                                    <div class="flex flex-col md:flex-row items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-bag-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#03648B" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.5 3.248" />
                                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                            <path d="M15 19l2 2l4 -4" />
                                        </svg>
                                        <p class="uppercase">Order code: <span class="font-bold lowercase">{{$data->pivot->order_code}}</span></p>
                                    </div>
                                    <p class="font-bold {{$allTrue ? 'text-green-500' : 'text-yellow-500'}}">{{$allTrue ? 'Completed' : 'Processing'}}</p>
                                    <div class="flex items-center gap-2">
                                        <p class="uppercase">Date of purchase: <span class="font-bold lowercase">{{date('d - m - Y', strtotime($data->pivot->created_at))}}</span></p>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </div>
                                    @break
                                @endforeach
                            </button>
                        </h2>
                        <div id="accordion-color-body-{{$key+1}}" data-number="{{$key+1}}" class="accordion hidden" aria-labelledby="accordion-color-heading-{{$key+1}}">
                            <div class="p-5 border-2 border-gray-200">
                                <ul class="list-disc flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="mb-4">
                                        @foreach ($value[0]->publications as $shop)
                                            <li class="ml-4">
                                                <div class="flex gap-1">
                                                    <p class="font-bold">{{$shop->pivot->quantity}}</p>
                                                    <p>{{$shop->brand === 'amd' || $shop->brand === 'evga' || $shop->brand === 'msi' || $shop->brand === 'xfx' ? strtoupper($shop->brand).' '.$shop->product :  ucwords($shop->brand).' '.$shop->product}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </div>

                                    <div class="mb-4 md:w-1/3 2xl:w-auto">
                                        <p id="errorRate" class="hidden bg-red-300 text-red-700 font-bold rounded-md p-1 text-center">
                                            There was an error with the rating process
                                        </p>
                                        <p class="text-center">
                                            Once your payment is confirmed the order will
                                            be delivered immediately to the address you 
                                            registered on our website.
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xl font-bold text-red-700 text-center md:text-left">-{{number_format($value[0]->total, 2)}} $</p>
                                    </div>

                                    <div class="flex items-center justify-center mt-5 md:mt-0">
                                        <button data-modal-target="select-modal" data-modal-toggle="select-modal" >
                                            @if($allTrue)
                                                <div class="text-yellow-400 hover:text-black flex flex-col items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                    </svg>
                                                    <p class="font-bold text-sm">Rate</p>
                                                </div>
                                            @endif
                                        </button>

                                        <div id="select-modal" tabindex="-1" aria-hidden="true" data-has-errors="{{ $errors->any() ? 'true' : 'false'}}" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Rate the seller later
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <livewire:rating-module :value="$value"/>
                                                </div>
                                            </div>
                                        </div>  
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

@section('scripts')
    @if(session('success'))
        @vite('resources/js/confirmationAlert.js')
    @endif
    @if($allShops->count() > 0)
        @vite('resources/js/keepModalOpen.js')
    @endif
@endsection
  