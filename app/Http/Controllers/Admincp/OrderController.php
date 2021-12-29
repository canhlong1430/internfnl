<?php

namespace App\Http\Controllers\Admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Shipper;
use App\Models\OrderDetail;
use App\Http\Requests\Order\EditOrderRequest;

class OrderController extends Controller
{
    public function getOrder(){
        $data['orderslist'] = DB::table('pdf_orders')
            ->join('pdf_users','pdf_orders.user_id','=','pdf_users.user_id')
            ->join('pdf_shippers','pdf_orders.shipper_id','=','pdf_shippers.shipper_id')
            ->select('pdf_orders.*','pdf_users.user_id','pdf_users.user_name','pdf_shippers.*')
            ->get();
        return view('admincp.order.order', $data);
    }

    public function getEditOrder($order_id){
        $data['order'] = Order::find($order_id);
        $data['product']= Product::join('pdf_orderdetails','pdf_orderdetails.product_id','=','pdf_products.product_id')->where('order_id', $order_id)->get();
        $data['shippers'] = Shipper::all();
        $data['details'] = OrderDetail::where('order_id', $order_id)->get();
        return view('admincp.order.editorder', $data);
    }

    public function postEditOrder(EditOrderRequest $request, $order_id){
        $order = new Order();
        $arr['order_name'] = $request->name;
        $arr['order_phone'] = $request->phone;
        $arr['order_address'] = $request->address;
        $arr['order_note'] = $request->note;
        $arr['order_status'] = $request->status;
        $arr['order_methodpayment'] = $request->method;
        $arr['shipper_id'] = $request->shipper;
        $arr['order_billoflanding'] = $request->billoflanding;
        $order::where('order_id',$order_id)->update($arr);
        return back()->withInput()->with('success', 'Đã cập nhật đơn hàng');
    }

    public function getDelBill($order_id){
        Order::destroy($order_id);
        return back()->withInput()->with('success', 'Đã xóa đơn hàng');
    }

}
