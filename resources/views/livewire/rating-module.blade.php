<div class="p-4 md:p-5">
    <p class="text-gray-500 dark:text-gray-400 mb-4">Pending qualifications for this order: <span class="font-bold">{{$nonRatedCounter}}</span></p>
    @if ($nonRatedCounter === 0)
        <p class="font-bold text-green-500 text-lg text-center">All sellers have been rated</p>
    @endif
    @foreach ($value[0]->publications as $key=>$data)
        @if($value[0]->reputation[$key]->rated === 1)
            @continue
        @endif
        <form wire:submit.prevent="qualify">
            <div class="border-2 border-solid">
                <div class="grid grid-cols-1">
                    <div class="flex items-center justify-between">
                        <div class="ml-2 flex items-center gap-2">
                            <div class="w-1/4">
                                <img class="w-10 h-10 rounded-full" src="{{asset('uploads/profilePhotos').'/'.$data->user->image}}" />
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">{{ucfirst($data->user->username)}}</h3>
                                <p>{{$data->product}}</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <div class="mr-2 flex items-center flex-row-reverse space-x-1">
                                <input type="radio" id="star5" wire:model="calification" value="5" class="hidden peer" />
                                <label for="star5" class="cursor-pointer text-xl text-gray-400 peer-checked:text-yellow-500 hover:text-yellow-500">★</label>
                            
                                <input type="radio" id="star4" wire:model="calification" value="4" class="hidden peer" />
                                <label for="star4" class="cursor-pointer text-xl text-gray-400 peer-checked:text-yellow-500 hover:text-yellow-500">★</label>
                            
                                <input type="radio" id="star3" wire:model="calification" value="3" class="hidden peer" />
                                <label for="star3" class="cursor-pointer text-xl text-gray-400 peer-checked:text-yellow-500 hover:text-yellow-500">★</label>
                            
                                <input type="radio" id="star2" wire:model="calification" value="2" class="hidden peer" />
                                <label for="star2" class="cursor-pointer text-xl text-gray-400 peer-checked:text-yellow-500 hover:text-yellow-500">★</label>
                            
                                <input type="radio" id="star1" wire:model="calification" value="1" class="hidden peer"/>
                                <label for="star1" class="cursor-pointer text-xl text-gray-400 peer-checked:text-yellow-500 hover:text-yellow-500">★</label>
                            </div>
                            
                            @error('calification')
                                <p class="text-red-500 my-2 text-sm font-bold block">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <textarea wire:model="comments" placeholder="Write your comment" minlength="10" maxlength="140" class="w-11/12 p-2 my-3 rounded-lg border-dashed @error('comments') border-red-500 @enderror"></textarea>

                        @error('comments')
                            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            @if(isset($value[0]) && isset($value[0]->reputation[$key]))
                <button type="button" wire:click="qualify({{$value[0]->reputation[$key]->id}})" class="my-4 text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Qualify
                </button>
            @endif
        </form>
        @break
    @endforeach
</div>

