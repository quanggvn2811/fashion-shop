@extends('shop.master')
@section('title', 'CATEGORY | E-SHOPPER')
@section('content')
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Category: {!!$category!!}</h2>
		@foreach($products as $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<?php
							$img_path = 'server-side/images/img_not_found.png';
							$img_db = json_decode($product->images);
							if(isset($img_db[0])) {
								$img_path = 'storage/avatars/'.$img_db[0];
							}
						?>
						<img src="{{url($img_path)}}" alt="" />
						<h2>{{number_format($product->price)}} Đ</h2>
						<p>{{$product->name}}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>{{number_format($product->price)}} Đ</h2>
							<p>{{$product->name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div>
			<ul class="pagination">
				@for($i=1; $i <= $products->lastPage(); $i++)
			<li @if($products->currentPage() == $i) class="active" @endif><a href="{{$products->url($i)}}">{{$i}}</a></li>
			@endfor
			<li><a @if($products->currentPage() == $products->lastPage()) href="{{$products->url(1)}}" @else href="{{$products->nextPageUrl()}} @endif">&raquo;</a></li>
		</ul>
		</div>
	</div><!--features_items-->
</div>

@endsection