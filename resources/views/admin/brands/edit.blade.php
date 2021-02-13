@extends('admin.master')
@section('title', 'E-SHOPPE | Edit brand')
@section('content')
<div class="form-w3layouts">
	<!-- page start-->
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Edit brands
				</header>
				<div class="panel-body">
					<div class="position-center">
						<form role="form" method="post" action="{{URL::to('admin/brands/'.$brand->brand_id)}}">
							@csrf
							@method('PUT')
							@include('errors.note')
							<div class="form-group">
								<label for="name">Brand name</label>
								<input value="{{$brand->name}}" required="" type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea name="description" id="desc" rows="10" class="form-control">{!!$brand->description!!}</textarea>
							</div>
							<div class="checkbox">
								<label>
									<input name="display" type="checkbox" @if($brand->display) checked="" @endif data-toggle="toggle" data-onstyle="success">Display this brand
								</label>
							</div>
							<div class="submit" style="margin-top: 50px;">
								<button type="submit" class="btn btn-info">Edit brand</button>
								<button class="btn btn-danger"><a style="color: inherit;" href="{{URL::to('admin/brands/')}}">Cancel</a></button>
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