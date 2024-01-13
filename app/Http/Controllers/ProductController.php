<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

class ProductController extends Controller
{
    public function index(){
        $data['totalProducts'] = Product::where("status",true)->get();
        $data['products'] = Product::paginate(6);
        return view("admin.manageProducts",$data);
    }

    public function insert(){
        $data['categories']=Category::all();
        return view("admin.insertProduct",$data);
    }

    public function store(Request $req){
        $data = $req->validate([
            'title'=>'required',
            'isVeg'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'description'=>'required',
            'image'=>'required',
            'category_id'=>'required',
        ]);

        // image work
        $filename = $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->storeAs("public",$filename);

        $data['image'] = $filename;

        Product::create($data);

        return redirect()->route('admin.product.index')->with("success","product inserted successfully");

    }

    public function edit(){
        return view("admin.editProduct");
    }

    public function update(Request $req,$id){
        return;
    }

    public function removeProduct(Request $req){
        
    }
}
