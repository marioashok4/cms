@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			Create Category
		</h3>
	</div>

	<div class="card-body">

	@if($errors->any())

	<div class="alert alert-danger">
		<ul class="list-group">

		@foreach($errors->all() as $error)
		
		<li class="list-group-item">
			{{$error}}
		</li>

		@endforeach	
			
		</ul>
	</div>


	@endif		
	
	<form action="{{route('categories.store')}}" method="POST">

	@csrf

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" placeholder="name" value="" id="name">
	</div>
		
	<div class="form-group">
		 <button class="btn btn-danger">ADD CATEGORY</button>
	</div>	
	</form>


		
	</div>
</div>



@endsection