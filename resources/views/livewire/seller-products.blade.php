<div class="my-20">
    @if($sellerPublications->count())
        <h2 class="text-2xl text-center md:text-left font-bold mx-4">Other products from this seller</h2>
        <div class="grid md:grid-cols-2 xl:grid-cols-4 m-4 items-center">
            @foreach ($sellerPublications as $publication)
                <div class="border">
                    <a href="{{route('searchs.show', $publication)}}">
                        <img class="h-1/2 mx-auto max-h-52" src="{{asset('uploads').'/'.$publication->image[0]}}" alt="{{$publication->product}}">
                    </a>

                    <div>
                        <p class="text-center font-bold 2xl:text-lg">{{$publication->brand === 'amd' || $publication->brand === 'evga' || $publication->brand === 'msi' || $publication->brand === 'xfx' ? strtoupper($publication->brand).' '.$publication->product :  ucwords($publication->brand).' '.$publication->product}}</p>
                        <p class="text-center text-green-700 font-bold text-2xl">{{$publication->price}} $</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end mx-4">
            <a href="{{route('seller.publications', [$publication->user->username, Crypt::encrypt($publication->user_id)])}}" class="w-full md:w-1/3 xl:w-1/4 2xl:w-1/12 p-3 uppercase rounded-lg font-bold text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                See all
            </a>
        </div>
    @endif
</div>
