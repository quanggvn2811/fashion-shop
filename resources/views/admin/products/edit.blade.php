@extends('admin.master')
@section('title', 'E-SHOPPE | Edit product')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Edit products
			</header>
			<div class="panel-body">
				<div class="position-center">
					<form method="post" action="{{URL::to('admin/products/'.$product->prod_id)}}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						@include('errors.note')
						<div class="form-group">
							<label for="name">Name</label>
							<input required="" value="{{$product->name}}" type="text" class="form-control" name="name" placeholder="Enter name product">
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input value="{{$product->price}}" required type="number" class="form-control" name="price">
						</div>
						<div class="form-group">
							<label for="quantity">Quantity</label>
							<input value="{{$product->quantity}}" required type="number" class="form-control" name="quantity">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Images:</label>
							<input id="img" type="file" name="img[]" class="form-control hidden" onchange="changeImg(this)" multiple>
							<?php 
								$img_db = json_decode($product->images);
								$img_path = 'server-side/images/new_seo-10-512.png';
								if (isset($img_db[0])) {
									$img_path = 'storage/avatars/'.$img_db[0];
								}
							 ?>
							<img id="avatar" class="thumbnail" style="max-width: 250px;" src="{{url($img_path)}}" alt="">
							<p class="help-block">Chose some images for product.</p>
						</div>
						<div class="form-group">
							<label for="content">Content</label>
							<textarea class="form-control" name="content" rows="10">{!!$product->content!!}</textarea>
						</div>
						<div class="form-group">
							<label for="desc">Description</label>
							<textarea class="form-control" name="desc" rows="10">{!! $product->description!!}</textarea>
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category">
								@foreach($catelist as $cate)
								<option @if($product->prodline_id == $cate->prodline_id) selected="" @endif value="{{$cate->prodline_id}}">{{$cate->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="brand">Brand</label>
							<select class="form-control" name="brand">
								@foreach($brandlist as $brand)
								<option @if($product->brand_id == $brand->brand_id) selected="" @endif value="{{$brand->brand_id}}">{{$brand->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="checkbox">
							<label>
								<input name="display" type="checkbox" checked data-toggle="toggle" data-onstyle="success">Display this product
							</label>
						</div>
						<button style="margin-top: 50px;" type="submit" class="btn btn-danger">Edit product</button>
						<button style="margin-top: 50px;" class="btn btn-primary"><a style="color: inherit;" href="{{URL::to('admin/products')}}">Cancel </a></button>
					</form>
				</div>

			</div>
		</section>

	</div>
</div>
@endsection