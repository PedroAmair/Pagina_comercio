<div>
    <div class="flex gap-4 overflow-hidden scroll-smooth" id="slider">
        @foreach ($processors as $processor)
            <div class="min-w-[16%]">
                <a href="#">
                    <img src="{{ asset('uploads').'/'.$processor->image }}" alt="{{ $processor->name }}">
                    <p class="text-center font-bold">{{ ucfirst(strtolower($processor->brand)).' '.$processor->name }}</p>
                    <p class="text-center text-green-700 font-bold">{{ $processor->price}}$</p>
                </a>
            </div>
        @endforeach
    </div>
</div>