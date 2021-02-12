@extends('admin.master')
@section('content')
<div class="form-w3layouts">
	<!-- page start-->
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Thêm danh mục 
				</header>
				<div class="panel-body">
					<div class="position-center">
						<form role="form" method="post" action="{{URL::to('admin/category')}}">
							@csrf
							@include('errors.note')
							<div class="form-group">
								<label for="name">Tên danh mục</label>
								<input required="" type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="">Môt tả</label>
								<textarea name="desc" id="desc" rows="10" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Danh mục cha</label>
								<select name="cateParent" id="" class="form-control">
									<option value="0">[None]</option>
									@foreach($catelist as $cate)
									<option value="{{$cate->prodline_id}}">{{$cate->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="checkbox">
								<label>
									<input name="display" type="checkbox" checked data-toggle="toggle" data-onstyle="success">Hiển thị danh mục
								</label>
							</div>
							<div class="submit" style="margin-top: 50px;">
								<button type="submit" class="btn btn-info">Thêm danh mục</button>
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