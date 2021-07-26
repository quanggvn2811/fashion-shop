<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check your orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <base href="{{asset('shoppe/client-side')}}/">
    <link rel="stylesheet" href="css/email.css">
</head>
<body>
<div class="content">
    <h2>Hóa đơn mua hàng - Home Shoppe</h2>
    <div id="khach-hang">
        <h4>Thông tin khách hàng</h3>
            <p>
                <span class="info">Khách hàng: </span>
                {{$username}}
            </p>
            <p>
                <span class="info">Email: </span>
                {{$email}}
            </p>
            <p>
                <span class="info">Địa chỉ: </span>
                {{$address}}.
            </p>
            <p>
                <span class="info">Ghi chú: </span>
               <p>{{$note}}</p>
            </p>
    </div>
    <div id="hoa-don">
        <h4>Chi tiết đơn hàng</h3>
            <table class="table-bordered table">
                <thead>
                <tr class="bold">
                    <th width="35%">Tên sản phẩm</th>
                    <th width="15%">Giá</th>
                    <th width="10%">Số lượng</th>
                    <th width="20%">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td class="price">{{number_format($item->price)}} VNĐ</td>
                        <td>{{$item->qty}}</td>
                        <td class="price">{{number_format($item->qty*$item->price)}} VNĐ</td>
                    </tr>
                @endforeach
                <tr id="tong-tien">
                    <td colspan="5">Tổng tiền:</td>
                    <td class="total-price">{{$total}} VNĐ</td>
                </tr>
                </tbody>
            </table>
    </div>
    <div id="xac-nhan">
        <br>
        <p align="justify">
            <b>Quý khách đã đặt hàng thành công!</b><br />
            • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
            • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
            <b><br/>Cám ơn Quý khách đã sử dụng Sản phẩm của <a href="#">Home Shoppe</a>!</b>
        </p>
    </div>
</div>
</body>
</html>
