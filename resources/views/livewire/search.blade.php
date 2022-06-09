<div>
    <div class="px-4 space-y-4">
        <form method="get">
            <input class="focus:ring-pink-400 p-2 w-full bg-stone-700 text-white placeholder-stone-500 rounded-3xl" type="text" placeholder="Search Users"
                wire:model="term" data-dropdown-toggle="dropdownSearch" />
        </form>
    </div>


    <div class="hidden divR z-10 bg-gradient-to-r from-stone-900 via-white-500/15 to-stone-800 dark:bg-gray-900 divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
        id="dropdownSearch">
        <!--<div wire:loading class="text-white">Searching users...</div>
        <div wire:loading.remove> </div>-->
        <div class="m-3">
        <ul aria-labelledby="dropdownDefault">

            @if($users->isEmpty())
            <li class="text-white text-sm">
                No matching result was found.
            </li>
            @else
            @foreach($users as $user)
            <li  class="hover:text-pink-500 mt-2">
                <a href="/profile/{{$user->id}}"><h3 class="text-lg text-white text-bold">{{$user->name}}</h3></a>
            </li>
            @endforeach
            @endif
        </ul>
        </div>
    </div>


    {{-- <div class="px-4 mt-4">
        {{$users->links()}}
</div>--}}

</div>
