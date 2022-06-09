@extends('layouts.app')

@section('content')
@if($user->private == 0)
<div class="py-12 h-screen">
    <div class="max-w-md mx-auto {{-- (darkmode)--}}bg-white bg-gradient-to-br from-pink-500/50 to-orange-400/50 rounded-xl shadow-md overflow-hidden md:max-w-md">
        <div class="md:flex">
            <div class="w-full p-2 py-10">

                <div class="flex justify-center pt-3">
                    <div class="relative">

                        <img src="{{$user->pfp}}" class="rounded-full" width="80" height="80">
                        {{--<span
                            class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-700 rounded-full"></span>--}}


                    </div>

                </div>

                <div class="flex flex-col text-center mt-3 mb-4">

                    <span class="text-2xl text-stone-800 uppercase font-bold">{{$user->fullname}}
                    </span>
                    <span class="text-md text-stone-600">{{$user->name}}
                    </span>

                </div>

                <p class="px-16 text-center text-md text-stone-800">{{$user->aboutme}}
                </p>

                <div class="">

                   <livewire:follows :user="$user"/>

                </div>

               

            </div>

        </div>
    </div>

</div>
@else
<div class="py-12 h-screen">
  <div class="max-w-md mx-auto {{-- (darkmode)--}}bg-white bg-gradient-to-br from-pink-500/50 to-orange-400/50 rounded-xl shadow-md overflow-hidden md:max-w-md">
      <div class="md:flex">
          <div class="w-full p-2 py-10">

              <div class="flex justify-center mt-3">
                  <div class="relative">

                      <img src="{{$user->pfp}}" class="rounded-full" width="80" height="80">
                      {{--<span
                          class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-700 rounded-full"></span>--}}


                  </div>

              </div>

              <div class="flex flex-col text-center mt-3 mb-4">

                  <span class="text-2xl text-stone-800 uppercase font-bold">{{$user->fullname}}
                  </span>
                  <span class="text-md text-stone-600">{{$user->name}}
                  </span>

              </div>


              <div>                   
                  <livewire:followprivate :user="$user"/>
              </div>




              
          </div>

      </div>
  </div>

</div>
@endif
@endsection


