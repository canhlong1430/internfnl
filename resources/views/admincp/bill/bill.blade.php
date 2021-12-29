@extends('admincp.master')
@section('title', 'Quản lý hoá đơn')
@section('content')

    <div class="content">
        <div class="container-fluid">
            @include('success.note')
            @include('errors.note')
            <div class="row">

                <div class="col-md-12">
                    <div class="card ">

                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">list</i>
                            </div>
                            <h4 class="card-title">Danh sách hóa đơn</h4>
                        </div>

                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">

                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Mã hóa đơn</th>
                                        <th class="text-left">Tài khoản đặt hàng</th>
                                        <th class="text-right">Tổng tiền</th>
                                        <th class="text-center">Thời gian đặt hàng</th>                                        
                                        <th class="text-center">Trạng thái</th>
                                        <th class="disabled-sorting text-center">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th class="text-left">Tài khoản đặt hàng</th>
                                        <th class="text-right">Tổng tiền</th>
                                        <th class="text-center">Thời gian đặt hàng</th>                                        
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Tác vụ</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($billlist as $bill)
                                        <tr>
                                            <td class="text-center">{{$bill->bill_id}}</td>
                                            <td>{{$bill->user_name}}</td>
                                            <td class="text-right">{{number_format($bill->total)}} VNĐ</td>
                                            <td class="text-center">{{$bill->created_at}}</td>                                         
                                            
                                            <td class="text-center">
                                                <span class="status">
                                                    @if($bill->bill_status == 0)
                                                        <span class="btn btn-danger">Chưa thanh toán</span>
                                                    @elseif($bill->bill_status == 1)
                                                        <span class="btn btn-info">Đã thanh toán</span>                                                    
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{asset('admincp/dashboard/bill/edit/'.$bill->bill_id)}}" class="btn btn-warning btn-just-icon">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{asset('admincp/dashboard/bill/delete/'.$bill->bill_id)}}" class="btn btn-danger btn-just-icon" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop