@if(Session::has('loginError'))
<p style="color: red">{{Session::get('loginError')}}</p>
@endif

@foreach($errors->all() as $err)
<p class="alert alert-danger">{{$err}}</p>
@endforeach