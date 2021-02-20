@if(Session::has('delBrandSuccess'))
<p class="alert alert-success">{{Session::get('delBrandSuccess')}}</p>
@endif

@if(Session::has('success'))
<p class="alert alert-success">{{Session::get('success')}}</p>
@endif