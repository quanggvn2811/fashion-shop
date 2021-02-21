@extends('admin.master')
@section('title', 'E-SHOPPE | Product info')
@section('content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			Product information
			<a style="position:fixed; right: 8%;" href="{{URL::to('admin/products/'.$product->prod_id.'/edit')}}"><button class="btn btn-danger">Edit product</button></a>
		</div>
		<div class="table-responsive">
			@include('success.note')
			<table class="table table-striped b-t b-light">
				<thead>
					<tr>
						<th>Lines</th>
						<th>Content</th>
						<th style="width:30px;"></th>
					</tr>
				</thead>
				<tbody> 
					@foreach($product->getAttributes() as $key => $value)
					<tr>
						<td>{{$key}}</td>
						<td><span class="text-ellipsis">{{$value}}</span></td>
						<td>
							<a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection