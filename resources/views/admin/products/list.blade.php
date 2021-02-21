@extends('admin.master')
@section('title', 'E-SHOPPE | List of products')
@section('content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			List of products
		</div>
		@include('success.note')
		<div class="row w3-res-tb">
			<div class="col-sm-5 m-b-xs">
				<select class="input-sm form-control w-sm inline v-middle">
					<option value="0">Bulk action</option>
					<option value="1">Delete selected</option>
					<option value="2">Bulk edit</option>
					<option value="3">Export</option>
				</select>
				<button class="btn btn-sm btn-default">Apply</button>                
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<input type="text" class="input-sm form-control" placeholder="Search">
					<span class="input-group-btn">
						<button class="btn btn-sm btn-default" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped b-t b-light">
				<thead>
					<tr>
						<th style="width:20px;">
							<label class="i-checks m-b-none">
								<input type="checkbox"><i></i>
							</label>
						</th>
						<th>Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Display</th>
						<th style="width:30px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($productlist as $prod)
					<tr>
						<td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
						<td><a href="">{{$prod->name}}</a></td>
						<?php $img = json_decode($prod->images); ?>
						<td><a href=""><img style="max-width: 200px; max-height: 200px;" src="{{url('storage/avatars/' . $img[0])}}" alt=""></a></td>
						<td><span class="text-ellipsis">{{number_format($prod->price)}}</span></td>
						<td><span class="text-ellipsis">{{number_format($prod->quantity)}}</span></td>
						<td><input type="checkbox" @if($prod->display) checked="" @endif data-toggle="toggle" data-onstyle="success" name=""></td>
						<td>
							<a href="" class="active" ui-toggle-class="">
								<i class="fa fa-check text-success text-active"></i>
							</a>
							<form id="formDelProd{{$prod->prod_id}}" action="{{URL::to('admin/products/'. $prod->prod_id)}}" method="post">
								@method('DELETE')
								@csrf
								<i onclick="if (confirm('Delete this product?')) {document.getElementById('formDelProd{{$prod->prod_id}}').submit()}" class="fa fa-times text-danger text"></i>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<footer class="panel-footer">
			<div class="row">

				<div class="col-sm-5 text-center">
					<small class="text-muted inline m-t-sm m-b-sm">showing {{$productlist->currentPage()*$productlist->perPage()-$productlist->perPage() + 1}}-{{$productlist->currentPage()*$productlist->perPage()}} of {{$productlist->total()}} items</small>
				</div>
				<div class="col-sm-7 text-right text-center-xs">                
					<ul class="pagination pagination-sm m-t-none m-b-none">
						<li><a @if($productlist->currentPage() == 1) href="{{$productlist->url($productlist->lastPage())}}" @else href="{{$productlist->previousPageUrl()}}" @endif><i class="fa fa-chevron-left"></i></a></li>
						@for($i=1; $i<=$productlist->lastPage(); $i++)
						<li @if($i == $productlist->currentPage()) class="active" @endif><a href="{{$productlist->url($i)}}">{{$i}}</a></li>
						@endfor
						<li><a @if($productlist->currentPage() == $productlist->lastPage()) href="{{$productlist->url(1)}}" @else href="{{$productlist->nextPageUrl()}}" @endif><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</div>

@endsection