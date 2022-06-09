<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with('fotoT', $user->pfp);
    }

    public function reload(){
        return response()->json(['captcha' => captcha_img()]);
    }

    public function updateUser(Request $request){
        file_put_contents( storage_path().'/logs/carla.log', "\n". __FILE__ .":". __LINE__ ."\n".var_export($request->all(), true)."\n", FILE_APPEND );

        $user = Auth::user();
        $data = $request->data;
        $dataDecoded = json_decode($data);
        $user->fullname = $dataDecoded[0];
        $user->age = $dataDecoded[1];
        $user->pfp = $dataDecoded[2];
        $user->save();
        return view('home')->with('fotoT', $user->pfp);
    }

    public function showProfile( $id ){

        $me = Auth::user();
        if($me->id == $id){
            return view('myPerfil')->with('me', $me);
        }else{
            $user = Auth::user()->find($id);
            return view('showPerfil')->with('user', $user);
        }
    }

    public function editUserView(){

        $user = Auth::user();

        return view('editUser')->with('user', $user);
    }

    public function editUser(Request $request){
        file_put_contents( storage_path().'/logs/carla.log', "\n". __FILE__ .":". __LINE__ ."\n".var_export($request->all(), true)."\n", FILE_APPEND );
        $user = Auth::user();
        $data = $request->data;
        $dataDecoded = json_decode($data);
        $user->name=$dataDecoded[0];
        $user->fullname=$dataDecoded[1];
        $user->pfp=$dataDecoded[2];
        if($request->toggle=="on"){
            $user->private=1;
        }else{
            $user->private=0;
        }
        $user->aboutme=$dataDecoded[4];
        $user->save();

        return view('myPerfil')->with('me', $user);
    }

    public function showFollowers($id){
        $user = Auth::user()->find($id);
        $followers = json_decode($user->followers);
        $followers_arr = array();
        foreach ($followers as $follower){
            $user_follower = Auth::user()->find($follower);
            array_push($followers_arr, $user_follower);
        }

        return view('followers')->with('user', $user)->with('followers', $followers_arr);
    
    }

    public function showFollowing($id){
        $user = Auth::user()->find($id);
        $followings = json_decode($user->following);
        $following_arr = array();
        foreach ($followings as $following){
            $user_following = Auth::user()->find($following);
            array_push($following_arr, $user_following);
        }

        return view('following')->with('user', $user)->with('following', $following_arr);
    }

}
