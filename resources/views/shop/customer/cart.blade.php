@extends('shop.master')
@section('title', 'CART | E-SHOPPER')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
                @foreach($cart as $product)
					<tr>
						<td class="cart_product">
							<a href=""><img style="max-height: 150px; max-width: 150px" src="{{url($product->options->product_img)}}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$product->name}}</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($product->price)}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<input onchange="updateCart('{{$product->rowId}}', this.value)" class="cart_quantity_input" type="text" name="quantity" value="{{$product->qty}}" autocomplete="off" size="2">
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{number_format($product->price * $product->qty)}}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{asset('shop/customer/carts/delete/'. $product->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
                @endforeach
				</tbody>
			</table>
		</div>
        <div style="color: #FE980F; font-weight: 500; font-size: 26px" class="total">
            <i>Total payment:</i><span id="total-cart"> {{$totalCart}} VNĐ</span>
            <button class="btn"><a href="{{URL::to('/shop/products')}}">Buy more </a></button>
            {{--<button @if($totalCart <= 0) hidden="" @endif class="btn-2"><a href="{{URL::to('shop/customer/checkout')}}">Payment</a></button>--}}
            <button @if($totalCart <= 0) hidden="" @endif class="btn"><a onclick="confirm('Delete your cart?');" href="{{asset('/cart/delete/all')}}">Delete cart</a></button>
        </div>
	</div>
</section> <!--/#cart_items-->
<div style="margin: 20px" class="clearfix"></div>
@include('success.note')
@include('errors.note')
<div class="col-sm-6" style="display: flex; float:right;">
    <div class="shopper-info">
        <p>Shipping Information</p>
        <form method="post" action="{{URL::to('shop/customer/payments')}}">
            @csrf
            <input required name="pm_username" type="email" placeholder="User name">
            <input required name="pm_email" type="email" placeholder="E-mail">
            <input required name="pm_password" type="password" placeholder="Password">
            <input required name="pm_address" type="text" placeholder="Shipping address">
            <input type="text" name="pm_note" placeholder="Add some note">
            <input type="submit" class="btn btn-primary" value="Checkout">
        </form>
    </div>
</div>
    <script>
        function updateCart(rowId, qty) {
            if (typeof rowId !== "undefined" && qty >= 0) {
                const request =	$.get(
                    "{{asset('shop/customer/carts/update')}}",
                    {
                        row_id: rowId,
                        qty: parseInt(qty)
                    });
                request.done(function(responseText, statusText, xhr){
                    if (statusText == 'error') {
                        alert('Error: ' + xhr.status + ':' + xhr.statusText);
                    } else {
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection
