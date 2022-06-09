@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="max-w rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="text-slate-50">
                        <p class="font-extrabold text-transparent text-4xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400 uppercase">{{$user->name}}'s FOLLOWERS PAGE</p>
                       <div class="relative pt-5">  
                           @foreach ( $followers as $follower )

                       
                            <div class="flex flex-row p-2 hover:bg-gradient-to-br from-pink-500/30 to-orange-400/30 rounded uppercase" style="cursor:pointer;cursor:hand;"  onclick="location.href='/profile/{{$follower->id}}';">
                                <img src="{{$follower->pfp}}" class="rounded-full" width="45" height="45"/>
                                <strong class="ml-4 mt-2">{{$follower->name}}</strong>
                            </div>
                        



                        

                        @endforeach
                    </div>
                    </div>
            </div>
        </div>
</div>

<script>
</script>
@endsection{{--
<div class="w-full p-2 py-10">

                            <div class="flex justify-left">
                                <div class="relative">
            
                                    <img src="{{$follower->pfp}}" class="rounded-full" width="45" height="45">
                                    <a href="/profile/{{$follower->id}}">{{$follower->name}}</a>
            
                                </div>
            
                            </div>
                        </div>--}}