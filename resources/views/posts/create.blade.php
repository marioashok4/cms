@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			 ADD POSTS
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

		<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
	    @csrf

	    <div class="form-group">
	    	<label for="title">Title</label>
	    		<input type="text" name="title" class="form-control" id="title" value="">
	    	
	    </div>

	     <div class="form-group">
	    	<label for="description">Description</label>
	    	<textarea name="description" id="description" cols="5" rows="5" class="form-control">
	    		
	    	</textarea>
	    	
	    </div>

	     <div class="form-group">
	    	<label for="content">Content</label>
	    	<textarea name="content" id="content" cols="5" rows="5" class="form-control">
	    		
	    	</textarea>
	    	
	    </div>

	     <div class="form-group">
	    	<label for="published_at">Published at</label>
	    		<input type="text" name="published_at" class="form-control" id="published_at" value="">
	    	
	    </div>

	      <div class="form-group">
	    	<label for="image">Image</label>
	    		<input type="file" name="image" class="form-control" id="image" value="">
	    	
	    </div>

	    <div class="form-group">
		 <button class="btn btn-dark" type="submit">
			CREATE POST
		 </button>	
		 	 
	</div>



			



		</form>
 
	
		
	</div>
</div>



@endsection