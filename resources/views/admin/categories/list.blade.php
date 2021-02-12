@extends('admin.master')
@section('title', 'E-SHOPPE | List of categories')
@section('content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			list of categories
		</div>
		<div class="table-responsive">
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
						<th style="width:30px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($catelist as $cate)
					<tr>
						<td>{{$cate->prodline_id}}</td>
						<td><a href="{{URL::to('/admin/category/'. $cate->prodline_id . '/edit')}}">{{$cate->name}}</a></td>
						<td><span class="text-ellipsis">{{$cate->description}}</span></td>
						{{-- <?php $parent = \App\Models\Category::find($cate->parent); ?> --}}
						{{-- <td><span class="text-ellipsis">{{$cate->getParentsNames($cate->parent)}}</span></td> --}}
						<td onclick="changeDisplayCate({{$cate->prodline_id}}, {{$cate->display}})"><input id="display" name="display" type="checkbox" @if($cate->display == 1) checked @endif data-toggle="toggle" data-onstyle="success"></td>
						<td><span id="date">{{substr($cate->updated_at, 0, -9)}}</span></td>
						<td>
							<a href="{{URL::to('/admin/category/'. $cate->prodline_id . '/edit')}}">
								<i class="fa fa-check text-success text-active"></i>
							</a>
							<a href="{{URL::to('/admin/category/id/delete')}}" onclick="confirm('Delete this category?')">
								<i class="fa fa-times text-danger text"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<footer class="panel-footer">
			<div class="row">

				<div class="col-sm-5 text-center">
					<small class="text-muted inline m-t-sm m-b-sm">showing {{$catelist->currentPage()*$catelist->perPage()-$catelist->perPage() + 1}}-{{$catelist->currentPage()*$catelist->perPage()}} of {{$catelist->total()}} items</small>
				</div>
				<div class="col-sm-7 text-right text-center-xs">                
					<ul class="pagination pagination-sm m-t-none m-b-none">
						<li><a @if($catelist->currentPage() == 1) href="{{$catelist->url($catelist->lastPage())}}" @else href="{{$catelist->previousPageUrl()}}" @endif><i class="fa fa-chevron-left"></i></a></li>
						@for($i=1; $i<=$catelist->lastPage(); $i++)
						<li @if($i == $catelist->currentPage()) class="active" @endif><a href="{{$catelist->url($i)}}">{{$i}}</a></li>
						@endfor
						<li><a @if($catelist->currentPage() == $catelist->lastPage()) href="{{$catelist->url(1)}}" @else href="{{$catelist->nextPageUrl()}}" @endif><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</div>			
<script>
	function changeDisplayCate(cate_id, display_st){
	const request =	$.get(
			"{{asset('admin/cate/display')}}",
			{
				cate_id: cate_id,
				display_st: display_st
			});
		request.done(function(responseText, statusText, xhr){
			if (statusText == 'error') {
				alert('Error: ' + xhr.status + ':' + xhr.statusText);
			} else {
				document.getElementById('display').checked = responseText;
			}
		});
	}
</script>

@endsection