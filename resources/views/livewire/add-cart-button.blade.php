<div>
    <form wire:submit.prevent='addToCart' id="quantityForm">
        @csrf
        <select wire:model="quantityUnits" name="quantityUnits" id="buyUnits" class="@error('quantityUnits') border-red-500 @enderror">
            <option value="{{ old('quantityUnits') }}" selected>{{ old('quantityUnits') ? old('quantityUnits') : 'Choose' }}</option>
            <option value="1">1</option>
            <option class="{{$publication->quantity < 2 ? 'hidden' : ''}}" value="2">2</option>
            <option class="{{$publication->quantity < 3 ? 'hidden' : ''}}" value="3">3</option>
        </select>

        @error('quantityUnits')
            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
        @enderror
    </form>

    @if(session()->has('success'))
        <div id="alert-border-3" class="fixed md:left-0 md:bottom-0 z-50 flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-100 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-md font-medium">
                {{session('success')}}
            </div>
        </div>
    @endif
</div>
