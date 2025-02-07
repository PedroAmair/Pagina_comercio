<div>
    <div class="text-2xl text-center md:text-left font-bold mx-4">
        <p>Seller reputation</p>
    </div>

    <div class="flex flex-col justify-center items-center md:flex-row">
        <div class="mt-3 max-w-32">
            <div class="flex flex-col items-center">
                <img class="rounded-full h-24 w-24" src="{{asset('uploads/profilePhotos').'/'.$publication->user->image}}" alt="user image"></a>
                <p class="font-bold text-center text-sky-600">{{ucfirst($publication->user->username)}}</p>
            </div>
            
            <div>
                <p class="font-bold ml-3">
                    @if($avgReputation === null)
                        <p class="font-bold">New Seller</p>
                    @else
                        <div class="text-center">
                            {{$avgReputation}} out of 5<span class="text-xl text-yellow-500">★</span>
                        </div>
                        <div id="totalRating" class="font-bold text-center"></div>
                    @endif
                </p>
            </div>
        </div>
    
        <div class="w-4/5">
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-500">5 star</p>
                <div class="w-3/5 md:w-4/5 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                    <div id="star5color" class="h-5 bg-yellow-300 rounded-sm" style="width:0%"></div>
                </div>
                <span id="star5" class="text-sm font-medium text-gray-500 dark:text-gray-400">0%</span>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-500">4 star</p>
                <div class="w-3/5 md:w-4/5 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                    <div id="star4color" class="h-5 bg-yellow-300 rounded-sm" style="width:0%"></div>
                </div>
                <spa id="star4" class="text-sm font-medium text-gray-500 dark:text-gray-400">0%</span>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-500">3 star</p>
                <div class="w-3/5 md:w-4/5 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                    <div id="star3color" class="h-5 bg-yellow-300 rounded-sm" style="width:0%"></div>
                </div>
                <span id="star3" class="text-sm font-medium text-gray-500 dark:text-gray-400">0%</span>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-500">2 star</p>
                <div class="w-3/5 md:w-4/5 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                    <div id="star2color" class="h-5 bg-yellow-300 rounded-sm" style="width:0%"></div>
                </div>
                <span id="star2" class="text-sm font-medium text-gray-500 dark:text-gray-400">0%</span>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-500">1 star</p>
                <div class="w-3/5 md:w-4/5 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                    <div id="star1color" class="h-5 bg-yellow-300 rounded-sm" style="width:0%"></div>
                </div>
                <span id="star1" class="text-sm font-medium text-gray-500 dark:text-gray-400">0%</span>
            </div>   
        </div>
    </div>
</div>