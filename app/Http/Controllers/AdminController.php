<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Category,Product};

class AdminController extends Controller
{
    public function dashboard(){
        $data['products'] = Product::count();
        $data['categories'] = Category::count();
        return view("admin.dashboard",$data);
    }
    public function login(Request $req){

        if($req->isMethod('post')){
            $data = $req->validate([
                "email" => "required",
                "password" => "required",
            ]);
            if(Auth::guard('admin')->attempt($data)){
                return redirect()->route('admin.dashboard')->with("success","Successfully Login");
            }
            else{
                return back()->with("error","Invalid Username and Password");
            }
        }
        return view("admin.adminLogin");
    }

    public function logout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminlogin")->with("error","Logout Successfully");
    }

}
