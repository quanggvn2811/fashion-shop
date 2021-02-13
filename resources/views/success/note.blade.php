@if(Session::has('delBrandSuccess'))
<p class="alert alert-success">{{Session::get('delBrandSuccess')}}</p>
@endif