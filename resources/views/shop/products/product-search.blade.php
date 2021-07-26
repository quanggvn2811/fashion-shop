@extends('shop.master')
@section('title', 'SEARCH | E-SHOPPER')
@section('content')
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Result for search: {{$keyword}}</h2>
		@foreach($searchlist as $product)
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
						<h2>{{number_format($product->price)}}</h2>
						<p>{!! $product->name !!}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>{{number_format($product->price)}}</h2>
							<a href="{{asset('shop/product-details/' . $product->prod_id . '/' . $product->slug)}}"><p>{!! $product->name !!}</p></a>
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
			{{-- @for($i=1; $i<= $searchlist->lastPage(); $i++)
			<li @if($searchlist->currentPage() === $i) class="active" @endif><a href="{{$searchlist->url($i)}}">{{$i}}</a></li>
			@endfor
			<li><a @if($searchlist->lastPage() == $searchlist->currentPage()) href="{{$searchlist->url(1)}}" @else href="{{$searchlist->nextPageUrl()}}" @endif>&raquo;</a></li> --}}
			{{ $searchlist->appends(request()->all())->links() }}
		</ul>
	</div><!--features_items-->
</div>
@endsection
