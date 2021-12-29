<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Http\Requests\Cart\AddCartRequest;
use App\Http\Requests\Cart\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Information;
use App\Models\BillDetail;
use App\Models\Bill;

class CartController extends Controller
{
    public function postAddCart(AddCartRequest $request){
        if($request->qty <= 0){
            return back()->withInput()->with('error', 'Số lượng sản phẩm tối thiểu bằng 1');
        } else {
            $product = Product::find($request->id);  
            Cart::add(['id' => $request->id, 'name' => $product->product_name, 'qty' => $request->qty, 'price' => $product->product_price, 'options' => ['img' => $product->product_img, 'slug' =>$product->product_slug]]);
            return redirect('gio-hang')->withInput()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
        }
    }

    public function getCart(){
        $data['product'] = Cart::content();
        $data['total'] = Cart::total();
        return view('frontend.cart', $data);
    }

    public function getDelCart($rowId){
        if($rowId == 'all'){
            Cart::destroy();
            return back()->withInput()->with('success', 'Đã xóa toàn bộ sản phẩm trong giỏ hàng');
        } else {
            Cart::remove($rowId);
            return back()->withInput()->with('success', 'Đã xóa sản phẩm');
        }
    }
    public function postUpdateCart(Request $request){
        if($request->update == 'update_cart'){
            Cart::update($request->rowId, $request->qty);
        }
    }
    public static function getInfoWeb(){
        $data = Information::find(1);
        return $data;
    }
    public static function getOrder(){
        $data = Order::orderBy('order_id','desc')->limit(1)->get();
        return $data;
    }
    public static function getOrderdt(){
        $order= Order::select('pdf_orders.order_id')->orderBy('order_id','desc')->limit(1)->get();
        foreach ($order as $orders){
            $oderid=$orders->order_id;
            $data = OrderDetail::join('pdf_products','pdf_orderdetails.product_id','=','pdf_products.product_id')->where('order_id',$oderid)->get();
        }
        return  $data;
    }
    public function postCheckoutCart(CheckoutRequest $request){
        if(Cart::count() == 0){
            return back()->withInput()->with('error', 'Giỏ hàng không có sản phẩm nào để đặt mua');
        } else {
            $order = new Order();
            $order->order_total = str_replace(",", "", Cart::subtotal());
            $order->order_name = $request->name;
            $order->order_phone = $request->phone;
            $order->order_address = $request->address;
            $order->order_note = $request->note;
            $order->order_receivetime = Carbon::now()->addDays(4);
            $order->order_methodpayment = $request->methodpayment;
            $order->order_status = 0;
            $order->user_id = Auth::user()->user_id;
            $order->shipper_id = 0;
            $order->save();

            foreach (Cart::content() as $items => $value) {
                $detail = new OrderDetail();
                $detail->detail_qty = $value->qty;
                $detail->detail_price = $value->price;
                $detail->detail_subtotal = $value->price * $value->qty;
                $detail->product_id = $value->id;
                $detail->order_id = $order->order_id;
                $detail->save();
            }
            $orderid = $order->order_id;
            
            $bill=new Bill();
            $bill->user_id= Auth::user()->user_id;
            $bill->order_id=$orderid;
            $bill->total=str_replace(",", "", Cart::subtotal());
            $bill->bill_status=0;
            $bill->save();

            
            foreach (Cart::content() as $items => $value) {
                $billdetail = new BillDetail();
                $billdetail->detail_qty = $value->qty;
                $billdetail->detail_price = $value->price;
                $billdetail->detail_subtotal = $value->price * $value->qty;
                $billdetail->product_id = $value->id;
                $billdetail->bill_id = $bill->bill_id;
                $billdetail->save();
            }


            Cart::destroy();

            $data = $request->all();
          
            Mail::send('frontend.email', $data, function ($message) use($orderid) {
                $shop = Information::find(1);
                $message->from($shop->info_email, $shop->info_name);
                $message->to(Auth::user()->user_email, Auth::user()->user_fullname);
                $message->cc('canhlong1403@gmail.com', $shop->info_name);
                $message->subject('Thông tin đơn hàng #'.$orderid.'-'.$shop->name);
            }); 

            return back()->withInput()->with('success', 'Đã đặt hàng thành công! - Hệ thống đã gửi mail cho quý khách');
        }
    }
}
