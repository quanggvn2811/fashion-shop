@extends('admin.master')
@section('title', 'E-SHOPPE | Edit category')
@section('content')
<div class="form-w3layouts">
	<!-- page start-->
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Edit categories
				</header>
				<div class="panel-body">
					<div class="position-center">
						<form role="form" method="post" action="{{URL::to('admin/category/'.$cate->prodline_id)}}">
							@csrf
							@method('PUT')
							@include('errors.note')
							<div class="form-group">
								<label for="name">Category name</label>
								<input value="{{$cate->name}}" required="" type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea name="desc" id="desc" rows="10" class="form-control">{!!$cate->description!!}</textarea>
							</div>
							<div class="form-group">
								<label>Category parent</label>
								<select name="cateParent" id="" class="form-control">
									<option value="0">[None]</option>
									@foreach($catelist as $category)
									<option @if($cate->parent == $category->prodline_id) selected="" @endif value="{{$category->prodline_id}}">{{$category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="checkbox">
								<label>
									<input name="display" type="checkbox" @if($cate->display) checked="" @endif data-toggle="toggle" data-onstyle="success">Display this category
								</label>
							</div>
							<div class="submit" style="margin-top: 50px;">
								<button type="submit" class="btn btn-info">Edit category</button>
								<button class="btn btn-danger"><a style="color: inherit;" href="{{URL::to('admin/category/')}}">Cancel</a></button>
							</div>
						</form>
					</div>

				</div>
			</section>

		</div>
	</div>
	<!-- page end-->
</div>
@endsection