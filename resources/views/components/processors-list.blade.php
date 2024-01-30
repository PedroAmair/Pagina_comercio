<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="slider">
        @foreach ($processors as $processor)
            <div class="min-w-[25%] md:min-w-[20%] lg:min-w-[17%] xl:min-w-[12%]">
                <a href="{{route('searchs.show', $processor->id)}}">
                    <img src="{{ asset('uploads').'/'.$processor->image }}" alt="{{ $processor->name }}">
                    <p class="text-center font-bold 2xl:text-xl">{{ ucfirst(strtolower($processor->brand)).' '.$processor->name }}</p>
                    <p class="text-center text-green-700 text-2xl font-bold">{{ $processor->price}} $</p>
                </a>
            </div>
        @endforeach
    </div>
</div>