<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class CartController extends Controller
{
    public function cartItems(){
        $cart = [];// mảng giỏ hàng
        $cities = City::all();
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        if(count($cart)){
            return response()->json([
                "status"=>true,
                "message"=>"Success",
                "cart"=>$cart,
                "cities"=>$cities
            ]);
        }
        return redirect()->to("cart");
    }

    public function cart(){
        $cart = [];// mảng giỏ hàng

        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        return view("cart", ["cart"=>$cart]);
    }

    public function checkout(){
        $cart = [];// mảng giỏ hàng
        $cities = City::all();
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        if(count($cart)){
            return view("checkout",[
                "cart"=>$cart,
                "cities"=>$cities
            ]);
        }
        return redirect()->to("cart");
    }

    public function placeOrder(Request $request){
        $request->validate([
            "customer_name"=>"required",
            "customer_tel"=>"required",
            "customer_address"=>"required",
            "city_id"=>"required",
        ]);

        try {
            $cart = Session::get("cart");
            if (count($cart) == 0) return redirect()->to("/");
            $grandTotal = 0;
            foreach ($cart as $item){
                $grandTotal += $item->price * $item->cart_qty;
            }
            $order = Order::create([
                "customer_name"=>$request->get("customer_name"),
                "customer_tel"=>$request->get("customer_tel"),
                "customer_address"=>$request->get("customer_address"),
                "city_id"=>$request->get("city_id"),
                "grand_total"=>$grandTotal,
            ]);

            // tao order item
            foreach ($cart as $item){
                DB::table("orders_item")->insert([
                    "order_id"=>$order->id,
                    "product_id"=>$item->id,
                    "price"=>$item->price,
                    "qty"=>$item->cart_qty
                ]);
                $p = Product::find($item->id);
                $p->qty -= $item->cart_qty;
                $p->save();
            }
            Session::forget("cart"); //xoa gio hang
            return  "done";
        }catch (Exception $e) {
            die("error");
        }
    }

}
