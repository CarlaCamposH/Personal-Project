<div>
    <div class="grid grid-cols-2 gap-4 text-stone-800 text-center mt-6 mb-3">
        @if($following==null)
        <div class="grid grid-cols-1">
            <strong class="uppercase">Following</strong>
            <a>0</a>                            
        </div>
        @else
        <div class="grid grid-cols-1">
            <strong>FOLLOWING</strong>
            <a href="/following/{{$user->id}}" class="hover:text-pink-500">{{count(json_decode($user->following))}}</a>

        </div>
        @endif

        @if($followers == null)
        <div class="grid grid-cols-1">
            <strong class="uppercase">Followers</strong>
            <a>0</a>                            
        </div>
        @else
        <div class="grid grid-cols-1">
            <strong>FOLLOWERS</strong>
        <a href="/followers/{{$user->id}}" class="hover:text-pink-500">{{count(json_decode($user->followers))}}</a>
        </div>
        @endif

        </div>
        <div class="px-14 mt-5">

            {{--<button 
        class="h-12 bg-gray-200 w-full text-black text-md rounded hover:shadow hover:bg-gray-300 mb-2"
        wire:click="message">Message  </button> --}}


            @if(!$unfollowButton)
            <button class="h-12 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-500/50 w-full text-white text-md rounded hover:shadow hover:bg-blue-800 mb-3"
                wire:click="follow">Follow </button>


            @else
            <button class="h-12 mb-3 text-white bg-gradient-to-br from-sky-500 to-teal-500 hover:bg-gradient-to-bl w-full text-white text-md rounded hover:shadow hover:bg-blue-800"
                wire:click="unfollow">Unfollow</button>
            @endif


        </div>
    
</div>
