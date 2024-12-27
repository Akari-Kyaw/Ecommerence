<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\User;
use App\Models\Message;
use DB;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function indexPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $admin= Admin::where(['email'=>$request->email])->count();
       if($admin){
            $result=$request->only('email','password'); 
                if(auth('admin')->attempt($result)){
                        return redirect('admin/dashboard');
                        }
        return back()->withErrors(['errors'=>'Email and Password are not match']);
    }
    return back()->withErrors(['errors'=>'Email does not exit']);
    }

    public function dashboard(){
        //Fetch data with corrected where clause
        $salesByDays=Order::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('COUNT(*) as total' )
        )
        ->whereYear('created_at',now()->year)
        ->where('order_status','deliver')////////
        ->groupBy('day')
        ->get();
        
        //prepare for chart
        $days=$salesByDays->pluck('day');
        $totals=$salesByDays->pluck('total');
        
       

        //order
        $ordersByDays=Order::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('COUNT(*) as total' )
        )
        ->whereYear('created_at',now()->year)
        ->where('order_status','pending')////////
        ->groupBy('day')
        ->get();
        
        //prepare for chart
        $orderdays=$ordersByDays->pluck('day');
        $ordertotals=$ordersByDays->pluck('total');
        $user=User::count();
        $order=Order::where('order_status','pending')->count();
        $amount=OrderDetail::join('products','order_details.product_id','=','products.id')
                // ->whereMonth('order_details.created_at',now()->month)
                ->selectRaw('sum(products.price * order_details.qty) as saleAmount')
                ->value('saleAmount');
        $msg=Message::count();


        return view('admin.dashboard',[
            'days'=>$days,
            'totals'=>$totals,
            'odays'=>$orderdays,
            'ototals'=>$ordertotals,
            'user'=>$user,
            'order'=>$order,
            'amount'=>$amount,
            'msg'=>$msg,

        ]);

    }
    public function order(){
      $orders= Order::join('users','orders.user_id','=','users.id')
                ->join('order_details','orders.order_id','=','order_details.order_id')
                ->join('products','order_details.product_id','=','products.id')
                ->where('order_status','pending')
                ->select('users.name','orders.*','products.*','order_details.*')
                ->get();
        return view('admin.order',['orders'=>$orders]);
    }

    public function showProduct(){
       $products= Product::join('product_details','products.id','=','product_details.product_id')
                 ->select('products.*','product_details.id as detailId','product_details.stock_qty','product_details.color')
                 ->paginate(3);
        return view('admin.product',['products'=>$products]);
    }

    public function addProduct(){
        return view('admin.newproduct');
    }
    public function searchProduct(Request $request){
       $products= Product::join('product_details','products.id','=','product_details.product_id')
                        ->where('products.category','like','%'.$request->search.'%')
                        ->orWhere('products.brand',$request->search)
                        ->select('products.*','product_details.color','product_details.stock_qty')
                        ->get();
        return view('admin.searchproduct',['products'=>$products]);
    }
    public function customer(){
       $users= User::paginate(5);
        return view('admin.customer',['users'=>$users]);
    }
    public function userDelete($user_id){
        User::where('id',$user_id)->delete();
        $users= User::paginate(1);
        return redirect('admin/customer')->withInput(['users'=>$users]);
    }
    public function sale(){
        $orders= Order::join('users','orders.user_id','=','users.id')
        ->join('order_details','orders.order_id','=','order_details.order_id')
        ->join('products','order_details.product_id','=','products.id')
        ->where('order_status','deliver')
        ->select('users.name','orders.*','products.*','order_details.*')
        ->get();
        return view('admin.sale',['orders'=>$orders]);
    }
    public function message(){
        $messages=Message::join('users','messages.user_id','=','users.id')
              ->select('users.name','users.email','messages.*')
              ->get();
        return view('admin.message',['messages'=>$messages]);
    }
    public function messageDelete($msg_id){
        Message::where('id',$msg_id)->delete();
        return back(); 
    }
    
    public function profile(){
        $admins= Admin::where('id',auth('admin')->user()->id)->get();
         return view('admin.profile',['admins'=>$admins]);
    }

    public function logout(){
        Auth::forgetUser();
        \Session::getHandler()->gc(0);
        return redirect('admin');
    }

    public function delete($detailId){
        $productDetails=ProductDetail::where('id',$detailId)
                    ->delete();
        return back();
    }

    public function edit($pid,$detailId){
       $product= Product::join('product_details','products.id','=','product_details.product_id')
                    ->where('products.id',$pid)
                    ->where('product_details.id',$detailId)
                    ->select('products.*','product_details.id as detailId','product_details.stock_qty','product_details.color')
                    ->get();
                return view('admin.edit',['product'=>$product]);
            }

    public function update($pid,$detailId,Request $request){
        Product::where('id',$pid)->update(["price"=>$request->price]);
        ProductDetail::where('id',$detailId)->update(["stock_qty"=>$request->stock_qty]);

       $products= Product::join('product_details','products.id','=','product_details.product_id')
                        ->select('products.*','product_details.id as detailId','product_details.stock_qty','product_details.color')                        
                        ->paginate(2);
        return redirect('admin/product')->withInput(['products'=>$products]);
    //  return view('admin.product',['products'=>$products]);
    }
    public function upload(Request $request){
        if($request->hasFile('img_name')){
            $imagName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imagName);
            $data->img_name=$imagName;
        }
            return back()->withInput(['images'=>$image]);
    }
    public function saveProduct(Request $request){
        $data=new Product();
        $data->category=$request->category;
        $data->brand=$request->brand;
        $data->price=$request->price;
        $data->stockqty=0;
        $data->category=$request->category;
        if($request->hasFile('img_name')){
            $file=$request->file('img_name');
            $fileName=$file->getClientOriginalName();
            $request->img_name->move(public_path('image'),$fileName);
            $data->img_name=$fileName;
        }
        $data->save();
        $id=Product::max('id');
        $detail=new ProductDetail();
        $detail->product_id=$id;
        $detail->color=$request->color;
        $detail->stock_qty=$request->stock_qty;
        $detail->save();
        return back()->withErrors(['errors'=>'New Product Inserted']);
    }
    public function changeStatus($order_id){
        Order::where('order_id',$order_id)->update(['order_status'=>'deliver']);
        $orders= Order::join('users','orders.user_id','=','users.id')
                ->join('order_details','orders.order_id','=','order_details.order_id')
                ->join('products','order_details.product_id','=','products.id')
                ->where('order_status','pending')
                ->select('users.name','orders.*','products.*','order_details.*')
                ->get();
        return redirect('/admin/order')->withInput(['orders'=>$orders]);
    }
    public function newColor(){
        return view('admin.addDetail');
    }
    public function saveDetail(Request $request){
            $pid=Product::max('id');
            $detail=new ProductDetail();
            $detail->product_id=$pid;
            $detail->color=$request->color;
            $detail->stock_qty=$request->stock_qty;
            $detail->save();
            return back()->withErrors(['errors'=>'Add New Color Success']);
    }
    public static function messageCount(){
            return Message::whereDay('created_at',now()->day)->count();
    }
    public function createAccount(Request $request){
        $admin=new Admin();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=$request->password;
        $admin->save();
        return back()->withErrors(['errors'=>"Create Account Successful"]) ;
    }
     
    public function account(){ 
         return view('admin.account');
     }

}