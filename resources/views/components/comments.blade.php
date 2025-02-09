<div class="w-11/12 max-h-96 mx-auto overflow-y-scroll border-2 rounded-lg mt-3 py-3 {{$comments->count() > 0 ? '' : 'hidden'}}">
    @php
        $contExt = 0;
        $contInt = 0;
        $paymentNumber = '';
    @endphp
    @if(count($comments))
        @foreach ($comments as $comment)
            @if($paymentNumber != $comment->payment_id)
                @php
                    $paymentNumber = $comment->payment_id;
                    $contExt = 0;
                @endphp
            @endif
            <div class="w-11/12 border-2 border-solid border-gray-200 my-5 mx-auto p-2 shadow-md">
                <div class="flex justify-between items-center rounded-lg bg-gray-300 p-2">
                    <div class="flex items-center gap-1">
                        <div><img class="w-10 h-10 rounded-full" src="{{asset('uploads/profilePhotos').'/'.$comment->user->image}}" /></div>
                        <div class="truncate font-bold text-lg">{{ucfirst($comment->user->username)}}</div>
                    </div>

                    <div>
                        <p class="font-bold truncate">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <p class="italic">"{{$comment->comments}}"</p>
                @foreach ($comment->payments->publications as $keyInt=>$products)
                    @if($contExt == $contInt)
                        <div class="mt-2">Purchased item: <span class="font-bold">{{$products->brand === 'amd' || $products->brand === 'evga' || $products->brand === 'msi' || $products->brand === 'xfx' ? strtoupper($products->brand).' '.$products->product :  ucwords($products->brand).' '.$products->product}}</span></div>
                    @endif
                    @php
                        $contInt += 1;
                    @endphp
                    @if($keyInt == $comment->payments->publications->count()-1)
                        @php
                            $contInt = 0;
                        @endphp
                    @endif
                @endforeach
            </div>
            @php
                $contExt += 1;
            @endphp  
        @endforeach

        <div class="m-5">
            {{$comments->links()}}
        </div>
    @endif
</div>