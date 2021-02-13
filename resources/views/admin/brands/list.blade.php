@extends('admin.master')
@section('title', 'E-SHOPPE | List of brands')
@section('content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			list of brands
		</div>
		<div class="table-responsive">
			@include('success.note')

			<table class="table table-striped b-t b-light">
				<thead>
					<tr>
						<th style="width:20px;">
							ID
						</th>
						<th>Name</th>
						<th>Description</th>
						{{-- <th>Category parent</th> --}}
						<th>Display</th>
						<th>Last updated</th>
						<th style="width:30px;">Option</th>
					</tr>
				</thead>
				<tbody>
					@foreach($brandlist as $br)
					<tr>
						<td>{{$br->brand_id}}</td>
						<td><a href="{{URL::to('/admin/brands/'. $br->brand_id . '/edit')}}">{{$br->name}}</a></td>
						<td><span class="text-ellipsis">{{$br->description}}</span></td>
						{{-- <?php $parent = \App\Models\Category::find($cate->parent); ?> --}}
						{{-- <td><span class="text-ellipsis">{{$cate->getParentsNames($cate->parent)}}</span></td> --}}
						<td onclick="changeDisplayBrand({{$br->brand_id}}, {{$br->display}})"><input id="display" name="display" type="checkbox" @if($br->display == 1) checked @endif data-toggle="toggle" data-onstyle="success"></td>
						<td><span id="date">{{substr($br->updated_at, 0, -9)}}</span></td>
						<td>
							<a href="{{URL::to('/admin/brands/'. $br->brand_id . '/edit')}}">
								<i class="fa fa-check text-success text-active"></i>
							</a>
							<form id="formDel{{$br->brand_id}}" action="{{URL::to('admin/brands/'.$br->brand_id)}}" method="post">
								@method('DELETE')
								@csrf
								<i onclick="if(confirm('Delete this brand?')){document.getElementById('formDel{{$br->brand_id}}').submit()} else {return false;};" class="fa fa-times text-danger text"></i>
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
					<small class="text-muted inline m-t-sm m-b-sm">showing {{$brandlist->currentPage()*$brandlist->perPage()-$brandlist->perPage() + 1}}-{{$brandlist->currentPage()*$brandlist->perPage()}} of {{$brandlist->total()}} items</small>
				</div>
				<div class="col-sm-7 text-right text-center-xs">                
					<ul class="pagination pagination-sm m-t-none m-b-none">
						<li><a @if($brandlist->currentPage() == 1) href="{{$brandlist->url($brandlist->lastPage())}}" @else href="{{$brandlist->previousPageUrl()}}" @endif><i class="fa fa-chevron-left"></i></a></li>
						@for($i=1; $i<=$brandlist->lastPage(); $i++)
						<li @if($i == $brandlist->currentPage()) class="active" @endif><a href="{{$brandlist->url($i)}}">{{$i}}</a></li>
						@endfor
						<li><a @if($brandlist->currentPage() == $brandlist->lastPage()) href="{{$brandlist->url(1)}}" @else href="{{$brandlist->nextPageUrl()}}" @endif><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</div>			
<script>
	function changeDisplayBrand(brand_id, display_st){
	const request =	$.get(
			"{{asset('admin/brands/display')}}",
			{
				brand_id: brand_id,
				display_st: display_st
			});
		// request.done(function(responseText, statusText, xhr){
		// 	if (statusText == 'error') {
		// 		alert('Error: ' + xhr.status + ':' + xhr.statusText);
		// 	} else {
		// 		document.getElementById('display').checked = responseText;
		// 	}
		// });
	}
</script>

@endsection