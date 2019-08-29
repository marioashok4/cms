@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			 {{isset($category)?'EDIT CATEGORY':'CREATE CATEGORY'}}
		</h3>
	</div>

	<div class="card-body">

	@include('partials.errors')	
	
	<form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="POST">

	@csrf

	@if(isset($category))
	
	@method('PUT')

	@endif

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" placeholder="name" value="{{isset($category)?$category->name:old('category')}}" id="name">
	</div>
		
	<div class="form-group">
		 <button class="btn btn-danger" type="submit">
		 	{{isset($category)?'UPDATE CATEGORY':'CREATE CATEGORY'}}
		 </button>
	</div>	
	</form>

	
		
	</div>
</div>



@endsection

