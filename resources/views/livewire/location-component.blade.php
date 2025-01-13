<div>
    <div class="mb-3">
        <label for="country" id="country" class="mb-2 block uppercase text-gray-500 font-bold">
            Country
        </label>
        <select wire:model="selectedCountry" wire:change="loadStates" name="country" id="country" class="border p-3 w-full rounded-lg @error('country') border-red-500 @enderror">
            <option value="{{ old('country') ? old('country') : (($selectedCountry) ? $selectedCountry : 'Choose') }}" selected>{{ old('country') ? old('country') : (($selectedCountry) ? $selectedCountry : 'Choose') }}</option>
            @foreach ($countries as $country)
                <option value="{{$country["country_name"]}}">{{$country["country_name"]}}</option>  
            @endforeach
        </select>

        @error('country')
            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="state" id="state" class="mb-2 block uppercase text-gray-500 font-bold">
            State
        </label>
        <select wire:model="selectedState" wire:change="loadCities" name="state" id="state" class="border p-3 w-full rounded-lg @error('state') border-red-500 @enderror">
            <option value="{{ old('state') ? old('state') : (($selectedState) ? $selectedState : 'Choose') }}" selected>{{ old('state') ? old('state') : (($selectedState) ? $selectedState : 'Choose') }}</option>
            @foreach ($states as $state)
                <option value="{{$state["state_name"]}}">{{$state["state_name"]}}</option>  
            @endforeach
        </select>

        @error('state')
            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
        @enderror
    </div>



    <div class="mb-3">
        <label for="city" id="city" class="mb-2 block uppercase text-gray-500 font-bold">
            City
        </label>
        <select wire:model="selectedCity" name="city" id="city" class="border p-3 w-full rounded-lg @error('city') border-red-500 @enderror">
            <option value="{{ old('city') ? old('city') : (($selectedCity) ? $selectedCity : 'Choose') }}" selected>{{ old('city') ? old('city') : (($selectedCity) ? $selectedCity : 'Choose') }}</option>
            @foreach ($cities as $city)
                <option value="{{$city["city_name"]}}">{{$city["city_name"]}}</option>  
            @endforeach
        </select>

        @error('city')
            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
        @enderror
    </div>
</div>
