<div class="w-11/12 max-h-96 mx-auto overflow-y-scroll border-2 rounded-lg mt-3 py-3 {{$comments->count() > 0 ? '' : 'hidden'}}">
    @if(count($comments))
        @foreach ($comments as $comment)
            <div class="w-11/12 border-2 border-solid border-gray-200 my-5 mx-auto p-2 shadow-md">
                <div class="flex justify-between items-center rounded-lg bg-gray-300 p-2">
                    <div class="flex items-center gap-1">
                        <div><img class="w-10 h-10 rounded-full" src="{{asset('uploads/profilePhotos').'/'.$comment->user->image}}" /></div>
                        <div class="truncate font-bold text-lg">{{ucfirst($comment->user->username)}}</div>
                    </div>

                    <div>
                        <p class="font-bold truncate">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <p class="italic">"{{$comment->comments}}"</p>
            </div>    
        @endforeach

        <div class="m-5">
            {{$comments->links()}}
        </div>
    @endif
</div>