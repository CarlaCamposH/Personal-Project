@extends('layouts.app')

@section('content')
<div class="py-12 h-screen">
    <div class="max-w-md mx-auto {{-- (darkmode)--}}bg-white bg-gradient-to-br from-pink-500/50 to-orange-400/50 rounded-xl shadow-md overflow-hidden md:max-w-md">
        <div class="md:flex">
            <div class="w-full p-2 py-10">
            <div class="flex items-end">
                <a href="/edit" class="hover:text-pink-500"><i class="fa-solid fa-gear object-right"></i></a>
            </div> 
                <div class="flex justify-center">
                    <div class="relative">

                        <img src="{{$me->pfp}}" class="rounded-full" width="80" height="80">
                        
                        {{-- ESTO LO IMPLEMENTARÉ MÁS ADELANTE CON LOS WEBSOCKETS (ONLINE/OFFLINE)
                            <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-700 rounded-full"></span> --}}


                    </div>

                </div>

                <div class="flex flex-col text-center mt-3 mb-4">

                    <span class="text-2xl text-stone-800 uppercase font-bold">{{$me->fullname}}
                    </span>
                    <span class="text-md text-stone-600">{{$me->name}}
                    </span>

                </div>

                <p class="px-16 text-center text-md text-gray-800 text-stone-800">{{$me->aboutme}}
                </p>

                <div class="grid grid-cols-2 gap-4 text-stone-800 text-center mt-6 mb-3">

                    @if(count(json_decode($me->following)) == null)
                        <div class="grid grid-cols-1">
                            <strong>Following</strong>
                            <a>0</a>                            
                        </div>
                    @else
                    <div class="grid grid-cols-1">
                        <strong>FOLLOWING</strong>
                        <a href="/following/{{$me->id}}" class="hover:text-pink-500">{{count(json_decode($me->following))}}</a>

                    </div>
                    @endif

                    @if(count(json_decode($me->followers)) == null)
                    <div class="grid grid-cols-1">
                        <strong>Followers</strong>
                        <a>0</a>                            
                    </div>
                    @else
                    <div class="grid grid-cols-1">
                        <strong>FOLLOWING</strong>
                    <a href="/followers/{{$me->id}}" class="hover:text-pink-500">{{count(json_decode($me->followers))}}</a>
                    </div>
                    @endif

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
