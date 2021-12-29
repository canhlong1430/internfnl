<?php
use App\Http\Controllers\Frontend\CartController;
$shop=CartController::getInfoWeb();
$order=CartController::getOrder();
$orderdt=CartController::getOrderdt();
?>
<div class="">
    <div class="aHl"></div><div id=":pu" tabindex="-1"></div><div id=":pj" class="ii gt"><div id=":pi" class="a3s aXjCH "><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#dcf0f8" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                <tbody>
                <tr>
                    <td align="center" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">


                        <table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-top:15px">
                            <tbody>
                            <tr>
                                <td align="center" valign="bottom" id="m_7248395423704074487headerImage">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:3px solid #00b7f1;padding-bottom:10px;background-color:#fff">
                                        <tbody>
                                        <tr>
                                            <td valign="top" bgcolor="#FFFFFF" width="100%" style="padding:0">
                                                <div style="color:#02acea;background-color:f2f2f2;font-size:11px">Tổng giá trị đơn hàng là @foreach($order as $orders) {{$orders -> order_total}} @endforeach &nbsp;₫
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>



                            <tr style="background:#fff">
                                <td align="left" width="600" height="auto" style="padding:15px">
                                    <table>
                                        <tbody>
                                        <tr>

                                            <td>
                                                <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">
                                                    Cảm ơn
                                                    quý khách {{Auth::user()->user_fullname}}
                                                    đã đặt hàng tại <span class="il"> {{$shop->info_name}} </span></h1>

                                                <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    <span class="il">{{$shop->info_name}}</span> rất vui khi thông báo đơn hàng #917484648 của quý khách đã
                                                    được tiếp nhận và đang trong quá trình xử lý. <span class="il"> {{$shop->info_name}} </span> sẽ thông báo đến quý khách
                                                    ngay khi hàng chuẩn bị được giao.
                                                </p>

                                                

                                                <h3 style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                    Thông tin đơn hàng #917484648 <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal"> @foreach($order as $orders) {{$orders->order_created_at}} </span> @endforeach
                                                </h3>


                                            </td>


                                        </tr>

                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">

                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th align="left" width="50%" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">
                                                            Thông tin thanh toán
                                                        </th>
                                                        <th align="left" width="50%" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">
                                                            Địa chỉ giao hàng
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td valign="top" style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                            <span style="text-transform:capitalize"> {{Auth::user()->user_fullname}} </span><br>
                                                            <a href="mailto:doubletcgaming@gmail.com" target="_blank"> {{Auth::user()->user_email}} </a><br>
                                                            {{Auth::user()->user_phone}}
                                                        </td>

                                                        <td valign="top" style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                <span style="text-transform:capitalize">
                                                {{Auth::user()->user_fullname}}</span><br>

                                                            <a href="mailto:doubletcgaming@gmail.com" target="_blank">{{Auth::user()->user_email}}</a><br>
                                                            {{Auth::user()->user_address}}<br>

                                                            {{Auth::user()->user_phone}}                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td valign="top" style="padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" colspan="2">
                                                            <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">

                                                                <strong>Phương thức thanh toán: </strong>
                                                                Thanh toán tiền mặt khi nhận hàng
                                                                <br>

                                                                <strong>Thời gian giao hàng dự kiến:</strong>
                                                                dự kiến giao hàng vào @foreach($order as $orders ) {{date('d-m-Y',strtotime($orders->order_receivetime))}} @endforeach - không giao ngày lễ
                                                                <br>
                                                                <strong>Phí vận chuyển: </strong>
                                                                0&nbsp;₫
                                                                <br>

                                                                <strong>Sử dụng bọc sách cao cấp Bookcare: </strong>
                                                                Không
                                                                <br>
                                                            </p>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>Lưu ý: Với những đơn hàng thanh toán trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng ký trong đơn hàng, và chuẩn bị giấy tờ tùy thân để đơn vị giao nhận có thể xác thực thông tin khi giao hàng.</i></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">
                                                    CHI TIẾT ĐƠN HÀNG</h2>

                                                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f5f5f5">
                                                    <thead>
                                                    <tr>
                                                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Sản phẩm</th>
                                                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px"> Đơn giá</th>
                                                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Số lượng</th>
                                                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Giảm giá</th>
                                                        <th align="right" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Tổng tạm</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody bgcolor="#eee" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    @foreach($orderdt as $orderdts)
                                                    <tr>
                                                        <td align="left" valign="top" style="padding:3px 9px">
                                                            <span class="m_7248395423704074487name">{{$orderdts->product_name}}</span><br>
                                                        </td>
                                                        <td align="left" valign="top" style="padding:3px 9px"><span>{{$orderdts -> detail_price}} &nbsp;₫</span></td>
                                                        <td align="left" valign="top" style="padding:3px 9px">{{$orderdts -> detail_qty}}</td>
                                                        <td align="left" valign="top" style="padding:3px 9px"><span>0&nbsp;₫</span></td>
                                                        <td align="right" valign="top" style="padding:3px 9px"><span>{{$orderdts -> detail_price * $orderdts -> detail_qty}}&nbsp;₫</span></td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    <tr>
                                                        <td colspan="4" align="right" style="padding:5px 9px">Tổng tạm tính</td>
                                                        <td align="right" style="padding:5px 9px"><span>@foreach($order as $orders) {{$orders -> order_total}} @endforeach&nbsp;₫</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" align="right" style="padding:5px 9px">Phí vận chuyển</td>
                                                        <td align="right" style="padding:5px 9px"><span>0&nbsp;₫</span></td>
                                                    </tr>

                                                    <tr bgcolor="#eee">
                                                        <td colspan="4" align="right" style="padding:7px 9px"><strong><big>Tổng giá trị đơn hàng</big></strong></td>
                                                        <td align="right" style="padding:7px 9px"><strong><big><span>@foreach($order as $orders) {{$orders -> order_total}} @endforeach&nbsp;₫</span></big></strong></td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                <div style="margin:auto">
                                                    <a href="https://mandrillapp.com/track/click/31005910/tiki.vn?p=eyJzIjoiMjF6VUNDQi03RmFzMk9uU0JaZFU0MTlxV3JnIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3Rpa2kudm5cXFwvc2FsZXNcXFwvb3JkZXJcXFwvdHJhY2tpbmc_Y29kZT05MTc0ODQ2NDgmZW1haWw9ZG91YmxldGNnYW1pbmclNDBnbWFpbC5jb21cIixcImlkXCI6XCJiZjhjNzU2MTcxY2U0YTgzYTM0YWU5MDM1Y2EwN2MxOFwiLFwidXJsX2lkc1wiOltcIjk2NTA0ZGM5YzcxMTllNmE0NGIzYjI4NWQ4OWE4MDdhODU5NmJkYzdcIl19In0" style="display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/31005910/tiki.vn?p%3DeyJzIjoiMjF6VUNDQi03RmFzMk9uU0JaZFU0MTlxV3JnIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3Rpa2kudm5cXFwvc2FsZXNcXFwvb3JkZXJcXFwvdHJhY2tpbmc_Y29kZT05MTc0ODQ2NDgmZW1haWw9ZG91YmxldGNnYW1pbmclNDBnbWFpbC5jb21cIixcImlkXCI6XCJiZjhjNzU2MTcxY2U0YTgzYTM0YWU5MDM1Y2EwN2MxOFwiLFwidXJsX2lkc1wiOltcIjk2NTA0ZGM5YzcxMTllNmE0NGIzYjI4NWQ4OWE4MDdhODU5NmJkYzdcIl19In0&amp;source=gmail&amp;ust=1529948328237000&amp;usg=AFQjCNEBt7xaeNcMbXLP195dkZNurfi07A">Chi tiết đơn hàng tại <span class="il">Tiki</span>.vn</a></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <br>
                                                <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục <a href="https://mandrillapp.com/track/click/31005910/hotro.tiki.vn?p=eyJzIjoiZ3BqNlpLand5VEhVby05cFkzQ3VTbVR6Q3ZRIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvaG90cm8udGlraS52blxcXC9oY1xcXC92aVxcXC8_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVyXCIsXCJpZFwiOlwiYmY4Yzc1NjE3MWNlNGE4M2EzNGFlOTAzNWNhMDdjMThcIixcInVybF9pZHNcIjpbXCIyZmVjOGE0OWEyMzkxMzUwMGIxYzkyNTk1N2VlOGNjZDFhZDBmZWZmXCJdfSJ9" title="Các câu hỏi thường gặp" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/31005910/hotro.tiki.vn?p%3DeyJzIjoiZ3BqNlpLand5VEhVby05cFkzQ3VTbVR6Q3ZRIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvaG90cm8udGlraS52blxcXC9oY1xcXC92aVxcXC8_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVyXCIsXCJpZFwiOlwiYmY4Yzc1NjE3MWNlNGE4M2EzNGFlOTAzNWNhMDdjMThcIixcInVybF9pZHNcIjpbXCIyZmVjOGE0OWEyMzkxMzUwMGIxYzkyNTk1N2VlOGNjZDFhZDBmZWZmXCJdfSJ9&amp;source=gmail&amp;ust=1529948328237000&amp;usg=AFQjCNHsXGUnZ5Q-EjYcfiHrCEk57dGoYQ"><strong>các câu hỏi thường gặp</strong>.</a>
                                                </p>

                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px #14ade5 dashed;padding:5px;list-style-type:none">
                                                    Từ ngày 14/2/2021, <span class="il">{{$shop->info_name}}</span> sẽ không gởi tin nhắn SMS khi đơn hàng của bạn được xác
                                                    nhận thành công. Chúng tôi chỉ liên hệ trong trường hợp đơn hàng có thể bị trễ
                                                    hoặc không liên hệ giao hàng được.
                                                </p>

                                                <p style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    Bạn cần được hỗ trợ ngay? Chỉ cần email <a href="mailto:canhlong1403@gmail.com" style="color:#099202;text-decoration:none" target="_blank"><strong>canhlong1403@<span class="il">gmail</span>.com</strong></a>,
                                                    hoặc gọi số điện thoại <strong style="color:#099202">0981249458</strong> (8-21h
                                                    cả T7,CN). Đội ngũ <span class="il">{{$shop->info_name}}</span> Care luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.
                                                </p>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <br>

                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">
                                                    Một lần nữa <span class="il">{{$shop->info_name}}</span> cảm ơn quý khách.<br>

                                                </p>

                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right">

                                                    <strong><a style="color:#00a3dd;text-decoration:none;font-size:14px" href="https://mandrillapp.com/track/click/31005910/tiki.vn?p=eyJzIjoieXJZNTRzYkZLbjVQQU90V3YydUVZTVpXR3hFIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdGlraS52bj91dG1fc291cmNlPXRyYW5zYWN0aW9uYWwrZW1haWwmdXRtX21lZGl1bT1lbWFpbCZ1dG1fdGVybT1sb2dvJnV0bV9jYW1wYWlnbj1uZXcrb3JkZXJcIixcImlkXCI6XCJiZjhjNzU2MTcxY2U0YTgzYTM0YWU5MDM1Y2EwN2MxOFwiLFwidXJsX2lkc1wiOltcImQzMzE1ODY1OTFkZDJlZDAzNGE0M2JmNDQ1MDY4YTQwYTkyNDkzYjZcIl19In0" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/31005910/tiki.vn?p%3DeyJzIjoieXJZNTRzYkZLbjVQQU90V3YydUVZTVpXR3hFIiwidiI6MSwicCI6IntcInVcIjozMTAwNTkxMCxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdGlraS52bj91dG1fc291cmNlPXRyYW5zYWN0aW9uYWwrZW1haWwmdXRtX21lZGl1bT1lbWFpbCZ1dG1fdGVybT1sb2dvJnV0bV9jYW1wYWlnbj1uZXcrb3JkZXJcIixcImlkXCI6XCJiZjhjNzU2MTcxY2U0YTgzYTM0YWU5MDM1Y2EwN2MxOFwiLFwidXJsX2lkc1wiOltcImQzMzE1ODY1OTFkZDJlZDAzNGE0M2JmNDQ1MDY4YTQwYTkyNDkzYjZcIl19In0&amp;source=gmail&amp;ust=1529948328237000&amp;usg=AFQjCNGnUUj_U4f_K3M1q2C8_HOsRZIkxg"><span class="il">{{$shop->info_name}}</span></a></strong><br>
                                                </p>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                            </tbody>

                        </table>


                    </td>

                </tr>

                <tr>
                    <td align="center">
                        <table width="600">
                            <tbody><tr>
                                <td>
                                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal" align="left">
                                        Quý khách nhận được email này vì đã mua hàng tại <span class="il">{{$shop->info_name}}</span><br>

                                        Để chắc chắn luôn nhận được email thông báo, xác nhận mua hàng từ <span class="il">{{$shop->info_name}}</span> quý khách vui
                                        lòng thêm địa chỉ <strong><a href="mailto:hotro@tiki.vn" target="_blank">canhlong1403@<span class="il">gmail</span>.com</a></strong> vào số địa chỉ (Address Book, Contacts) của
                                        hộp email. <br>
                                        <b>Văn phòng <span class="il">{{$shop->info_name}}</span></b> Linh Trung, Thủ Đức, thành phố Hồ Chí Minh, Việt Nam
                                    </p>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                </tbody>
            </table>

            <img src="https://ci3.googleusercontent.com/proxy/og-QSJZpwcX-judOPnQA4GkW1ZuiGWby1qwcfraDp_us2t2NdYPC8bJnE9YywKpuGv8lzKEs2jr7lmhtHudXA4Esth9OwvPkoIokFTi-LjuBTNw6IjBgX-PWbBm6i2LhMOX_bjiVQZe6BAA=s0-d-e1-ft#https://mandrillapp.com/track/open.php?u=31005910&amp;id=bf8c756171ce4a83a34ae9035ca07c18" height="1" width="1" class="CToWUd"><div class="yj6qo"></div><div class="adL">
            </div></div></div><div id=":qd" class="ii gt" style="display:none"><div id=":qe" class="a3s aXjCH undefined"></div></div><div class="hi"></div></div>