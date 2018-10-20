@if (count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
		    	<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (session('info'))
	<div class="aler alert-sucess">
		{{session('info')}}
	</div>
@endif