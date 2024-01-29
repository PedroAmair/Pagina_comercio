<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="sliderOf">
        @foreach ($discounts as $discount)
            <div class="min-w-[25%] md:min-w-[20%] lg:min-w-[17%] xl:min-w-[12%]">
                <a href="{{route('searchs.show', $discount->id)}}">
                    <img loading="lazy" src="{{ asset('uploads').'/'.$discount->image }}" alt="{{ $discount->name }}">
                    <p class="text-center font-bold 2xl:text-2xl">{{ ucfirst(strtolower($discount->brand)).' '.$discount->name }}</p>
                    <p class="text-center text-green-700 font-bold 2xl:text-2xl">{{ $discount->price}}$</p>
                </a>
            </div>
        @endforeach
    </div>
</div>