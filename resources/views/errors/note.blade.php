@if(Session::has('loginError'))
<p style="color: red">{{Session::get('loginError')}}</p>
@endif