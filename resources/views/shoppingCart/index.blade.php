@extends('layouts.app')

@section('title')
<div class="my-5">
    Products in your shopping cart
</div>
@endsection

@section('content')
    @if (isset($notAvaliable) && $notAvaliable === 1)
        <div id="outOfStock" class="bg-amber-400"><p class="font-bold text-center uppercase text-xl text-amber-700 border-amber-600 border-x-4">We remove one or more out-of-stock/inactive products from your cart</p></div>
    @endif

    @if(Cart::count())
        <div class="w-5/6 mx-auto md:mt-20">
            <div class="grid grid-cols-1 md:grid-cols-6">
                <div class="hidden md:block justify-self-center col-span-2 font-bold text-xl">Product</div>
                <div class="hidden md:block justify-self-center font-bold text-xl">Quantity</div>
                <div class="hidden md:block justify-self-center font-bold text-xl">Unit price</div>
                <div class="hidden md:block justify-self-center font-bold text-xl">Amount</div>
                <div class="hidden md:block justify-self-center font-bold text-xl">Delete</div>
            </div>
            
            @foreach (Cart::content() as $publication)
                <div class="grid grid-cols-1 my-5 md:my-0 py-3 md:py-0 md:grid-cols-6 border-2 md:border-0">
                    <div class="md:col-span-2">
                        <a class="flex flex-col md:flex-row items-center justify-start gap-2" href="{{route('searchs.show', $publication->id)}}">
                            <img class="w-1/2 md:w-1/6" src="{{asset('uploads').'/'.$publication->options->image[0]}}" alt="{{$publication->product}} ">
                            <p class="text-3xl text-center md:text-left md:text-lg font-bold md:font-normal">{{ucfirst($publication->name)}}</p>
                            @if(session('elements'))
                                @foreach(session('elements') as $item)
                                    @if($publication->rowId === $item['id'])
                                        <div class=""><p class="bg-red-400 rounded-lg p-2 text-red-800 text-sm font-bold text-center">Only {{$item['quantity']}} left</p></div>
                                    @endif
                                @endforeach
                            @endif
                        </a>
                    </div>

                    <div class="justify-self-center self-center text-xl md:text-lg"><span class="md:hidden text-xl">Quantity: </span>{{$publication->qty}} @choice('unit|units', $publication->qty)</div>
                    <div class="justify-self-center self-center text-xl md:text-lg"><span class="md:hidden text-xl">Unit price: </span>{{number_format($publication->price, 2)}} $</div>
                    <div class="justify-self-center self-center text-xl md:text-lg"><span class="md:hidden text-xl">Amount: </span>{{number_format($publication->qty*$publication->price, 2)}} $</div>
                    <div class="justify-self-center self-center mt-5 md:mt-0">
                        <form action="{{route('cart.destroy', Crypt::encrypt($publication->rowId))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input id="delete" type="submit" class="py-3 md:py-2 px-10 md:px-4 font-bold bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer" value="X">
                        </form>
                    </div>
                </div>
            @endforeach
        

            <div class="grid grid-cols-2 gap-3 md:gap-0 md:grid-cols-6 border-2 md:border-0 md:border-t-2">
                <div class="col-start-1 md:col-start-4 justify-self-end">
                    <div class="font-bold text-2xl md:text-xl">Subtotal:</div>
                </div>

                <div class="col-start-2 md:col-start-5 justify-self-start md:justify-self-center">
                    <div class="text-2xl md:text-lg">{{Cart::subtotal()}} $</div>
                </div>

                <div class="col-start-1 md:col-start-4 justify-self-end">
                    <div class="font-bold text-2xl md:text-xl">Tax:</div>
                </div>

                <div class="col-start-2 md:col-start-5 justify-self-start md:justify-self-center">
                    <div class="text-2xl md:text-lg">{{Cart::tax()}} $</div>
                </div>

                <div class="col-start-1 md:col-start-4 justify-self-end">
                    <div class="font-bold text-2xl md:text-xl">Total:</div>
                </div>

                <div class="col-start-2 md:col-start-5 justify-self-start md:justify-self-center md:border-t-2">
                    <div class="font-semibold text-2xl md:text-lg">{{Cart::total()}} $</div>
                </div>
            </div>

            <div class="my-20 flex flex-col-reverse md:flex-row md:justify-between gap-6">
                <div>
                    <a class="block text-center md:inline p-3 uppercase font-bold bg-red-600 text-white rounded-lg hover:bg-red-700" href="{{route('cart.clear')}}">Clear cart</a>
                </div>
    
                <div>
                    <a class="block text-center md:inline py-3 px-6 uppercase font-bold bg-green-600 text-white rounded-lg hover:bg-green-700" href="{{route('cart.quantity.verify')}}">Proceed</a>
                </div>
            </div>
        </div>       
    @else
        <p class="mt-[5%] uppercase text-4xl text-gray-200 text-center m-auto">No items added yet</p>
    @endif
@endsection

@section('scripts')
    @if(session('delete'))
        @vite('resources/js/deleteDone.js')
    @endif
    @if(isset($notAvaliable) && $notAvaliable === 1)
        @vite('resources/js/outOfStockAlert.js')
    @endif
@endsection