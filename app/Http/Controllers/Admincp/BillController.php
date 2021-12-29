<?php

namespace App\Http\Controllers\Admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Bill\EditBillRequest;

class BillController extends Controller
{
    public function getBill(){
        $data['billlist'] = DB::table('pdf_bill')
            ->join('pdf_users','pdf_bill.user_id','=','pdf_users.user_id')            
            ->select('pdf_bill.*','pdf_users.user_name','pdf_users.user_phone','pdf_users.user_address')
            ->get();
        return view('admincp.bill.bill', $data);
    }
    
    public function getEditBill($bill_id){
        $data['bill'] =  DB::table('pdf_bill')
        ->join('pdf_users','pdf_bill.user_id','=','pdf_users.user_id')            
        ->where('bill_id', $bill_id)
        ->select('pdf_bill.*','pdf_users.user_name','pdf_users.user_fullname','pdf_users.user_address','pdf_users.user_phone')
        ->get();     
        $data['bdetails'] = DB::table('pdf_billdetails')
        ->join('pdf_products','pdf_billdetails.product_id','=','pdf_products.product_id')
        ->select('pdf_billdetails.*','pdf_products.product_name')
        ->where('bill_id', $bill_id)
        ->get();
        return view('admincp.bill.editbill', $data);
    }

    public function postEditBill(EditBillRequest $request, $bill_id){
        $bill = new Bill();
        $arr['bill_status'] = $request->status;
        $bill::where('bill_id',$bill_id)->update($arr);
        return back()->withInput()->with('success', 'Đã cập nhật hoá đơn');
    }

    public function getDelBill($bill_id){
        Bill::destroy($bill_id);
        return back()->withInput()->with('success', 'Đã xóa hoá đơn');
    }
  
}
