<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

        $data['categories'] = Category::all();
        return view("home.home",$data);
    }

    public function login(Request $req){
        if($req->isMethod("post")){
            $data = $req->validate([
                "email" => "required",
                "password" => "required",
            ]);

            if(Auth::attempt($data)){
                return redirect()->route("home.index")->with("success","Successfully Login");
            }
            else{
                return redirect()->back()->with("error","Invalid Username Or Password");
            }
        }
        return view("home.login");
    }

    public function signup(Request $req){
        if($req->isMethod("post")){
            $data = $req->validate([
                "name"=>"required",
                "password"=>"required",
                "email"=>"required",
                "contact"=>"required",

            ]);

            $data['password'] = bcrypt( $data['password']); // For password Encryption

            User::create($data);

            return redirect()->route("login");
        }
       return view("home.signup");
    }

    public function logout(Request $req){
        Auth::logout();
        return redirect()->route("login")->with("error","Logout successfully");
    }
}
