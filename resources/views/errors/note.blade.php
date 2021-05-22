@if(Session::has('loginError'))
<p style="color: red">{{Session::get('loginError')}}</p>
@endif

@foreach($errors->all() as $err)
<p class="alert alert-danger">{{$err}}</p>
@endforeach

@if(Session::has('delCateSuccess'))
<p class="alert alert-danger">{{Session::get('delCateSuccess')}}</p>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif
