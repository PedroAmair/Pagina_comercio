<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="sliderOf">
        @foreach ($discounts as $discount)
            <div class="min-w-[25%] md:min-w-[20%] lg:min-w-[17%] xl:min-w-[12%]">
                <a href="{{route('searchs.show', $discount->id)}}">
                    <img class="h-24 md:h-28 2xl:h-36 mx-auto" loading="lazy" src="{{ asset('uploads').'/'.$discount->image[0] }}" alt="{{ $discount->name }}">
                    <p class="truncate text-center font-bold 2xl:text-xl">
                        {{$discount->brand === 'amd' || $discount->brand === 'evga' || $discount->brand === 'msi' || $discount->brand === 'xfx' ? strtoupper($discount->brand).' '.$discount->product :  ucwords($discount->brand).' '.$discount->product}}
                    </p>
                    <p class="text-center text-green-700 font-bold text-2xl">{{ $discount->price}} $</p>
                </a>
            </div>
        @endforeach
    </div>
</div>