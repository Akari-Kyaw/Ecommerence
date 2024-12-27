<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;


use DB;


 
class ProductController extends Controller
{
    public function newProduct(){
       $products =Product::latest()->limit(4)->get();
       return view('ecommerce.index',['newproducts'=>$products]);
    }
    public function showProduct(){
       $p =Product::paginate(4);//paginate kwl tr  
        return view('ecommerce.product',['products'=>$p]);
    }
    public function searchProduct(Request $request){
        $request->validate([
            'search'=>'required'
        ]);
        $products=Product::where('category','like','%'.$request->search.'%')->paginate(2);
        if($products){
        return view('ecommerce.search',['searchProducts'=>$products]);}
    

    }
    public function detailProduct($id){
       $product= Product::where('id',$id)->get();
       $color=ProductDetail::where('product_id',$id)->get();
        return view('ecommerce.detail',['product'=>$product,'color'=>$color]); 
       
    }
    public function cartList(){
        if(session()->get('user')){
            $user_id=session()->get('user')->id;
            $cartlist =DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user_id)
            ->select('products.*','carts.color','carts.qty','carts.id as cart_id')
            ->get();
            // Cart::where('user_id',$user_id)->
        return view('ecommerce.cartlist',['list'=>$cartlist]);
        }
        return back();
    }
    public function addToCart(Request $request,$id){
        if(session()->get('user')){
            $request->validate([
                'color'=>'required',
                'quantity'=>'required'
            ]);
            $data['user_id']=session()->get('user')->id;
            $data['product_id']=$id;
            $data['color']=$request->color;
            $data['qty']=$request->quantity;
            $cart=Cart::create($data);
            if($cart)
            return back()->withErrors(['error'=>"Add To Cart Success"]);

            else
                return back()->withErrors(['error'=>"Add To Cart Fail"]);
            
        }
        else{
            return redirect('ecommerce/login');
        }
    }
    static function countItem(){
        if(session()->get('user')){
            $user_id=session()->get('user')->id;
             return Cart::where('user_id',$user_id)->count();
        }
    }
    public function increase($id,$qty){
        Cart::where('id',$id)->update(["qty"=>$qty+1]);
        return redirect()->back();
    }
    public function decrease($id,$qty){
        if($qty>1){
        Cart::where('id',$id)->update(["qty"=>$qty-1]);
        return redirect()->back();

        }
        return back();
    }
    public function remove($id){
        Cart::destroy($id);
        return redirect()->back();
    }
    public function checkOut($total){
        return view('ecommerce.checkout',['totals'=>$total]);
    }
    public function currentOrder(Request $request){
        // if($request->payment.emptyStirng())
        // return back()->withErrors(['error'=>"Please Select Payment Type"]);

        // $request->validate([
        //     'address'=>'required',
        //     'phone'=>'required',
        //     'payment'=>'required',
        // ]);
        
        //insert order table
        $id=DB::table('orders')->count('order_id');
        $data=new Order();
        $oid='o'.($id+1);
        $data->order_id=$oid;
        $data->user_id=session()->get('user')->id;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->order_status='pending';
        $data->payment=$request->payment;
        $data->save();

        //insert cart
        $records=Cart::where('user_id',session()->get('user')->id)->get();
            foreach($records as $record){
            $detail=new OrderDetail();
            $detail->order_id=$oid;
            $detail->product_id=$record->product_id;
            $detail->color=$record->color;
            $detail->qty=$record->qty;
            $detail->save();
            
        }
        //cart history ko shin tr
        Cart::where('user_id',session()->get('user')->id)->delete();

        //order
       $orders= OrderDetail::join('products','order_details.product_id','=','products.id')
                    ->join('orders','order_details.order_id','=','orders.order_id')
                    ->where('orders.order_status','=','pending')
                    ->where('orders.user_id','=',session()->get('user')->id)
                    ->get();
        return view('ecommerce.currentorder',['orders'=>$orders]);
    }
    public function getOrder(){
        if(session()->has('user')){
           $orderProduct = OrderDetail::join('products','order_details.product_id','=','products.id')
            ->join('orders','orders.order_id','=','order_details.order_id')
            ->where('orders.user_id','=',session()->get('user')->id)
            ->where('orders.order_status','=','pending')
            ->get();
            return view('ecommerce.currentorder',['orders'=>$orderProduct]);
        }
        else
        return back();
    }
    public function orderHistory(){
        if(session()->has('user')){
            $orderProduct = OrderDetail::join('products','order_details.product_id','=','products.id')
             ->join('orders','orders.order_id','=','order_details.order_id')
             ->where('orders.user_id','=',session()->get('user')->id)
             ->where('orders.order_status','=','delivery')
             ->get();
             return view('ecommerce.order',['orders'=>$orderProduct]);
         }
         else
         return back();
    }
    }


