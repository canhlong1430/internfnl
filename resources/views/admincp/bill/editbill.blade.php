@extends('admincp.master')
@section('title', 'Cập nhật hóa đơn')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('success.note')
                @include('errors.note')
                <div class="card ">
                    @foreach($bill as $billdt)

                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">build</i>
                        </div>
                        <h4 class="card-title">Cập nhật hóa đơn #{{$billdt->bill_id}}</h4>
                    </div>

                    <div class="card-body ">

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Tên người nhận</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default bmd-form-group">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{$billdt->user_fullname}}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Số điện thoại</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default bmd-form-group">
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{$billdt->user_phone}}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Địa chỉ giao hàng</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default bmd-form-group">
                                                <input type="text" class="form-control" name="address"
                                                    value="{{$billdt->user_address}}" readonly required>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Trạng thái hóa đơn</label>

                                        <div class="col-md-6 col-sm-12">
                                            <select required class="selectpicker" data-size="7"
                                                data-style="btn btn-primary btn-round" name="status"
                                                title="Trạng thái hóa đơn">
                                                <option disabled>Chọn trạng thái hóa đơn</option>
                                                <option value="0" @if($billdt->bill_status == 0) selected @endif>Chờ
                                                    thanh toán</option>
                                                <option value="1" @if($billdt->bill_status == 1) selected @endif>Đã
                                                    thanh toán</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Thời gian hóa đơn</label>
                                        <div class="col-md-6">
                                            <div class="form-group bmd-form-group">
                                                {{$billdt->created_at}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-rose">Cập nhật<div class="ripple-container">
                                        </div></button>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            @endforeach

                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mã sản phẩm</th>
                                        <th class="text-left">Tên sản phẩm</th>
                                        <th class="text-right">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Mã sản phẩm</th>
                                        <th class="text-left">Tên sản phẩm</th>
                                        <th class="text-right">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($bdetails as $detail)
                                    <tr>
                                        <td class="text-center">{{$detail->product_id}}</td>
                                        <td>{{$detail->product_name}}</td>
                                        <td class="text-right">{{number_format($detail->detail_price)}} VNĐ</td>
                                        <td class="text-center">{{$detail->detail_qty}}</td>
                                        <td class="text-right">{{number_format($detail->detail_subtotal)}} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-rose" href="{{asset('admincp/dashboard/bill')}}"><i class="material-icons">
                        keyboard_arrow_left
                    </i> Quay lại <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                </a>

            </div>
        </div>
    </div>
</div>
@stop