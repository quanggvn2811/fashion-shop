@extends('admin.master')
@section('title', 'E-SHOPPE | Add product')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Add products
			</header>
			<div class="panel-body">
				<div class="position-center">
					<form method="post" action="{{URL::to('admin/products')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter name product">
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" name="price">
						</div>
						<div class="form-group">
							<label for="quantity">Quantity</label>
							<input type="number" class="form-control" name="quantity">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Images:</label>
							<input id="img" type="file" name="img[]" class="form-control hidden" onchange="changeImg(this)" multiple>
							<img id="avatar" class="thumbnail" style="max-width: 250px;" src="{{asset('server-side/images/new_seo-10-512.png')}}" alt="">
							<p class="help-block">Chose some images for product.</p>
						</div>
						<div class="form-group">
							<label for="content">Content</label>
							<textarea class="form-control" name="content" rows="10"></textarea>
						</div>
						<div class="form-group">
							<label for="desc">Description</label>
							<textarea class="form-control" name="desc" rows="10"></textarea>
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category">
								@foreach($catelist as $cate)
								<option value="{{$cate->prodline_id}}">{{$cate->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="brand">Brand</label>
							<select class="form-control" name="brand">
								@foreach($brandlist as $brand)
								<option value="{{$brand->brand_id}}">{{$brand->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="checkbox">
							<label>
								<input name="display" type="checkbox" checked data-toggle="toggle" data-onstyle="success">Display this product
							</label>
						</div>
						<button style="margin-top: 50px;" type="submit" class="btn btn-info">Add product</button>
					</form>
				</div>

			</div>
		</section>

	</div>
</div>
@endsection