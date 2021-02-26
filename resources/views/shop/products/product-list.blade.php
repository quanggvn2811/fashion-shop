@extends('shop.master')
@section('title', 'Shop | E-SHOPPER')
@section('adv')
@parent
<section id="advertisement">
	<div class="container">
		<img src="images/shop/advertisement.jpg" alt="" />
	</div>
</section>
@endsection
@section('content')
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Features Items</h2>
		@foreach($allProducts as $product)
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
						<img style="max-width: 250px; max-height: 225px;" src="{{url($img_path)}}" alt="" />
						<h2>{{number_format($product->price)}} Đ</h2>
						<p>{!! $product->name !!}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>{{number_format($product->price)}} Đ</h2>
							<p>{!! $product->name !!}</p>
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
		<ul class="pagination">
			@for($i=1; $i<= $allProducts->lastPage(); $i++)
			<li @if($allProducts->currentPage() === $i) class="active" @endif><a href="{{$allProducts->url($i)}}">{{$i}}</a></li>
			@endfor
			<li><a @if($allProducts->lastPage() == $allProducts->currentPage()) href="{{$allProducts->url(1)}}" @else href="{{$allProducts->nextPageUrl()}}" @endif>&raquo;</a></li>
		</ul>
	</div><!--features_items-->
</div>
@endsection