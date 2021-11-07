<?php

namespace App\Http\Controllers;

use App\User;
use App\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function home(Request $request){
        if ($request->segment(1) == 'admin') {
            if (!Auth::check()) {
                return redirect('/login');
            }
            if (Auth::user()->userType == 'admin' || Auth::user()->userType == 'superAdmin') {
                return view('welcome');
            }
            return redirect('/');
        }
        return view('main');
    }

    public function index(Request $request){
        return view('main');
    }

    // Get bird
    public function getBird(Request $request){
        $str = isset($request->str) ? $request->str : '';
        $page = isset($request->page) ? $request->page : 1;
        $q = Gallery::orderBy('id', 'asc')->with('attributes');
        if ($str) {
            $q->where('name', 'like', "%$str%");
        }
        return $q->paginate(50, ["*"], 'page', $page);
    }

     // Get bird details
     public function getBirdDetails($key){
        $data = Gallery::where('id', $key)->first();
        $name =  $data->name;
        return Gallery::with('attributes')->where('name', $name)->first();
     }
  
}
