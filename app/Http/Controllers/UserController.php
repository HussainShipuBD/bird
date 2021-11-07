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

   


    // Get admin
    public function getAdmin()
    {
        $userType =  'user';
        return User::where('userType', '!=', $userType)->orderBy('id', 'desc')->get();
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

    // Get driver
    public function getDriver(Request $request)
    {
        // return Driver::orderBy('id', 'desc')->get();
        $str = isset($request->str) ? $request->str : '';
        // $str = $data['str'];
        $q = Driver::orderBy('id', 'desc');
        if ($str) {
            $q->where('name', 'like', "%$str%");
            $q->orWhere('phone', 'like', "%$str%");
        }
        return $q->get();
    }


    // Get driver transition
    public function getDriverTra($key)
    {
        return Drivertra::orderBy('id', 'desc')
            ->where('driver_id', $key)
            ->get();
    }

  
}
