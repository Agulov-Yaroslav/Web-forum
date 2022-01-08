<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function update($id, $user_id)
    {
        return view('update');
      /*  if(Auth::user()->id == $user_id){
            return view('update');
        }
        else{
            return redirect()->back();
        }
        */
    }

}
