<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="slider">
        @foreach ($processors as $processor)
            <div class="min-w-[25%] md:min-w-[20%] lg:min-w-[17%] xl:min-w-[12%]">
                <a href="{{route('searchs.show', $processor->id)}}">
                    <img class="h-24 md:h-28 2xl:h-36 mx-auto" src="{{ asset('uploads').'/'.$processor->image[0] }}" alt="{{ $processor->product }}">
                    <p class="text-center font-bold 2xl:text-xl">{{$processor->brand === 'amd' ? strtoupper($processor->brand).' '.$processor->product :  ucfirst($processor->brand).' '.$processor->product}}</p>
                    <p class="text-center text-green-700 text-2xl font-bold">{{ $processor->price}} $</p>
                </a>
            </div>
        @endforeach
    </div>
</div>