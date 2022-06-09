<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Follows extends Component
{
    public $unfollowButton = false;
    public $user;

    public function render()
    {
        $me=Auth::user();
        $user = $this->user;
        $followers = json_decode($user->followers);
        $following = json_decode($user->following);
        
       

        if($user->following == null){
            $num_following = 0;
        }else{
             $num_following = count(($following));
        }


        if($followers != null  ){
            if(in_array($me->id, $followers )){
                $this->unfollowButton = true;
            }
            $num_followers = count(($followers));
            

        }else{
           $num_followers = 0; 
        }
        return view('livewire.follows')->with('followers', $num_followers )->with('following', $num_following)->with('user', $user)->with('unfollowshow', $this->unfollowButton);
    }

    public function follow(){
       $followers_array = array(); 
       $following_array = array();
       $me = Auth::user();
       $user = $this->user;
       $followers_array = json_decode($user->followers);
       $following_array = json_decode($me->following);
       if($followers_array == null){
            $followers_array = array(); 
            
        }
                    
        if(!in_array($me->id, $followers_array ) ){
            array_push($followers_array, $me->id);
            $user->followers = json_encode($followers_array);
            array_push($following_array, $user->id);
            $me->following = json_encode($following_array);
        }
       $user->save(); 
       $me->save();
       $this->unfollowButton = true; 
       $followers = (($user->followers));
      // $following = (($user->following)); 
    }

    public function unfollow(){

        $followers_array = array(); 
        $following_array = array();
        $me = Auth::user();
        $user = $this->user;
        $followers_array = json_decode($user->followers);
        $following_array = json_decode($me->following);
        if(in_array($me->id, $followers_array ) && in_array($user->id, $following_array)){
        $posicion = array_search( $me->id, $followers_array);
        $posicionFollowing = array_search($user->id, $following_array);
        array_splice($followers_array, $posicion, 1);
        array_splice($following_array, $posicionFollowing, 1);
        $user->followers = (json_encode($followers_array));
        $me->following = (json_encode($following_array));
        }
        
        $user->save(); 
        $me->save();
        $this->unfollowButton = false; 
        $followers = (($user->followers));
        $following = (($user->following));

    }
}
