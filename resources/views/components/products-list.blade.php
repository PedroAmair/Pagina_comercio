<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="sliderOf">
        @foreach ($discounts as $discount)
            <div class="min-w-[16%]">
                <a href="#">
                    <img loading="lazy" src="{{ asset('uploads').'/'.$discount->image }}" alt="{{ $discount->name }}">
                    <p class="text-center font-bold">{{ ucfirst(strtolower($discount->brand)).' '.$discount->name }}</p>
                    <p class="text-center text-green-700 font-bold">{{ $discount->price}}$</p>
                </a>
            </div>
        @endforeach
    </div>
</div>