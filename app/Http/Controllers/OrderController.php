<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Payment;
use Auth;
use PaytmWallet;


class OrderController extends Controller
{

    public function myOrder(){
        $order = Order::where([["status",true],["user_id",Auth::id()]])->first();
        $data['payment'] = Payment::where('order_id',$order->id)->first();
        $data['order'] = $order;
        return view("home.myOrder", $data);
    }

    public function manageCarts(){
        $data['totalCarts'] = Order::where("status",false)->get();
        $data['carts'] = Order::where("status",false)->orderBy("id","desc")->paginate(2);

        return view("admin.manageCart",$data);
    }

    public function addToCart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();

        if($product){
            $order = Order::where([["status",false],["user_id",$user->id]])->first();
            if($order12121212){
                $orderItem = OrderItem::where("status",false)->where("product_id",$id)->where("order_id",$order->id)->first();

                // If order item available

                if($orderItem){
                    $orderItem->qty += 1;
                    $orderItem->save();
                }
                else{
                    $oi = new OrderItem();
                    $oi->status = false;
                    $oi->product_id = $id;
                    $oi->order_id = $order->id;
                    $oi->save();
                }
            }
            else{
                // if order not exixts in cart

                $o = new order();
                $o->user_id = $user->id;
                $o->status = false;
                $o->save();

                $oi = new OrderItem();
                $oi->status = false;
                $oi->product_id = $id;
                $oi->order_id = $o->id;
                $oi->save();
            }
            return redirect()->route("cart")->with("success","Added & Updated To Cart");
        }
        else{
            return redirect()->route("home.index")->with("error","Product Not Found");
        }

    }

    public function removeFromCart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();

        if($product){
            $order = Order::where([["status",false],["user_id",$user->id]])->first();
            if($order){
                $orderItem = OrderItem::where("status",false)->where("product_id",$id)->where("order_id",$order->id)->first();

                // If order item available

                if($orderItem){
                    if($orderItem->qty > 1){
                        $orderItem->qty -= 1;
                        $orderItem->save();
                    }
                    else{
                        $orderItem->delete();
                    }
                }
            }
            return redirect()->route("cart")->with("success","Updated Successfully To Cart");
        }
        else{
            return redirect()->route("home.index")->with("error","Product Not Found");
        }

    }

    public function cart(){
        $data['order'] = Order::where([["user_id",Auth::id()],["status",false]])->first();
        return view("home.cart",$data);
    }

    public function checkout(Request $req){
       $data['addresses'] = Address::where("user_id",Auth::id())->get();

       if($req->isMethod("post")){
        $data = $req->validate([
            'street_name' =>"required",
            'fullname' =>"required",
            'alt_contact' =>"required",
            'landmark' =>"required",
            'area' =>"required",
            'pincode' =>"required",
            'city' =>"required",
            'state' =>"required",
            'type' =>"required",

        ]);

        $data['user_id'] = Auth::id();
        Address::create($data);
        return redirect()->back()->with("success","Address Saved Successfully");
       }
        return view("home.checkout",$data);
    }

    // payment Work  

    public function order(Request $req){
        $payment = PaytmWallet::with('receive');

        $order_id = rand(1000,99999);

        // order fetch

        $order = Order::where([["status",false],["user_id",Auth::id()]])->first();

        $order->address_id = $req->address_id;

        $order->save();

        $record =[
            "order_id" =>$order->id,
            "user_id" => Auth::id(),
            "ORDERID" => $order_id,
            "TXNAMOUNT" => $req->amount
        ];

        Payment::create($record);

        $data = [
          'order' => $order_id,
          'user' => Auth::id(),
          'mobile_number' => Auth::user()->contact,
          'email' => auth::user()->email,
          'amount' => $req->amount,
          'callback_url' => route("status")
        ];


        $payment->prepare($data);
      

        return $payment->receive();
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){

            $payment = Payment::where('ORDERID',$transaction->getOrderId())->first();

            if($payment){
                $payment->BANKTXNID = $response['BANKTXNID'];
                $payment->CURRENCY = $response['CURRENCY'];
                $payment->GATEWAYNAME = $response['GATEWAYNAME'];
                $payment->PAYMENTMODE = $response['PAYMENTMODE'];
                $payment->RESPCODE = $response['RESPCODE'];
                $payment->RESPMSG = $response['RESPMSG'];
                $payment->STATUS = $response['STATUS'];
                $payment->TXNAMOUNT = $response['TXNAMOUNT'];
                $payment->TXNDATE = $response['TXNDATE'];
                $payment->TXNID = $response['TXNID'];

                $payment->save();
            }

                $order = Order::where([["status",false],["user_id",Auth::id()]])->first();
                $order->status = true;
                $order->save();

                return redirect()->route("home.index")->with("success","Order Placed Successfully");

          //Transaction Successful
        }else if($transaction->isFailed()){
          //Transaction Failed
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        dd($transaction);
        $transaction->getTransactionId(); // Get transaction id
    }   
}
