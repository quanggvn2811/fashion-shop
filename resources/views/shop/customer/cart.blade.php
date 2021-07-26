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
            <button class="btn-1"><a href="{{URL::to('/shop/products')}}">Buy more </a></button>
            {{--<button @if($totalCart <= 0) hidden="" @endif class="btn-2"><a href="{{URL::to('shop/customer/checkout')}}">Payment</a></button>--}}
            <button @if($totalCart <= 0) hidden="" @endif class="btn-3"><a onclick="confirm('Delete your cart?');" href="{{asset('/cart/delete/all')}}">Delete cart</a></button>
        </div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$59</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>$61</span></li>
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
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
