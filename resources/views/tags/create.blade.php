@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			 {{isset($tag)?'EDIT TAG':'CREATE TAG'}}
		</h3>
	</div>

	<div class="card-body">

	@include('partials.errors')		
	
	<form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">

	@csrf

	@if(isset($tag))
	
	@method('PUT')

	@endif

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" placeholder="name" value="{{isset($tag)?$tag->name:old('tag')}}" id="name">
	</div>
		
	<div class="form-group">
		 <button class="btn btn-danger" type="submit">
		 	{{isset($tag)?'UPDATE Tag':'CREATE Tag'}}
		 </button>
	</div>	
	</form>

	
		
	</div>
</div>



@endsection

