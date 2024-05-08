@extends('layouts.app')

@section('title')
<div class="my-5">
    Products in your shopping cart
</div>
@endsection

@section('content')
    @if(Cart::count())
        <div class="pt-10">
            <table class="table-auto w-full xs:w-5/6 mx-auto">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach (Cart::content() as $publication)    
                <tr>
                    <td class="m-auto"><a href="{{route('searchs.show', $publication->id)}}"><img class="w-24 p-2" src="{{asset('uploads').'/'.$publication->options->image[0]}}" alt="{{$publication->product}} "></a></td>
                    <td class="text-center text-xs ms:text-sm md:text-lg w-40 md:w-32 xl:w-auto">{{$publication->name}}</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg w-4 xs:w-auto">{{$publication->qty}}</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg">{{number_format($publication->price, 2)}} $</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg">{{number_format($publication->qty*$publication->price, 2)}} $</td>
                    <td class=" w-12 md:m-auto">
                        <form action="{{route('cart.destroy', Crypt::encrypt($publication->rowId))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input id="delete" type="submit" class="w-full p-[.1rem] font-bold bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer" value="X">
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr class="border-t-2">
                    <td colspan="3"></td>
                    <td class="text-center text-xs ms:text-sm md:text-lg font-bold">Subtotal:</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg">{{Cart::subtotal()}} $</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-center text-xs ms:text-sm md:text-lg font-bold">Tax:</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg">{{Cart::tax()}} $</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-center text-xs ms:text-sm md:text-lg border-t-2 font-bold">Total:</td>
                    <td class="text-center text-xs ms:text-sm md:text-lg border-t-2 font-semibold">{{Cart::total()}} $</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="my-20 flex justify-around">
            <div>
                <a class="p-3 font-bold bg-red-600 text-white rounded-lg hover:bg-red-700" href="{{route('cart.clear')}}">Clear cart</a>
            </div>

            <div>
                <a class="py-3 px-4 font-bold bg-green-600 text-white rounded-lg hover:bg-green-700" href="">Proceed</a>
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
@endsection