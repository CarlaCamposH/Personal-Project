<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Livewire\Component;

class Search extends Component
{

    public $term = "";

    public function render()
    {

        sleep(1);
        //$users = Auth::user()->find($this->term);
        
        $users = User::where('name', 'LIKE', "%{$this->term}%")->get();

      

        return view('livewire.search')->with('users', $users);
    }
}
