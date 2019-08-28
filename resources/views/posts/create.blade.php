@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			 {{isset($post)?'EDIT POST':'CREATE POST'}}
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

		<form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
	    @csrf

	    @if(isset($post))

	    @method('PUT')


	    @endif

	    <div class="form-group">
	    	<label for="title">Title</label>
	    		<input type="text" name="title" class="form-control" id="title" value="{{isset($post)?$post->title:old('title')}}">
	    	
	    </div>

	     <div class="form-group">
	    	<label for="description">Description</label>
	    	<textarea name="description" id="description" cols="5" rows="5" class="form-control">
	    		{{isset($post)?$post->description:old('description')}}
	    	</textarea>
	    	
	    </div>

	     <div class="form-group">
	    	<label for="content">Content</label>
	    	  <input id="content" value="{{isset($post)?$post->content:old('content')}}" type="hidden" name="content">
  			<trix-editor input="content"></trix-editor>
	    	
	    </div>

	     <div class="form-group">
	    	<label for="published_at">Published at</label>
	    		<input type="text" name="published_at" class="form-control" id="published_at" value="{{isset($post)?$post->published_at:old('published_at')}}">
	    			
	    </div>

	    @if(isset($post->image))


	    <img src="{{asset($post->image)}}" alt="Image" width="100%" height="50px" class="image">



	    @endif

	      <div class="form-group">
	    	<label for="image">Image</label>
	    		<input type="file" name="image" class="form-control" id="image" value="">
	    	
	    </div>

	    <div class="form-group">
		 <button class="btn btn-dark" type="submit">
			 {{isset($post)?'UPDATE POST':'CREATE POST'}}
		 </button>	
		 	 
	</div>



			



		</form>
 
	
		
	</div>
</div>



@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

	flatpickr('#published_at',{

		'enableTime':true
	})

</script>


@endsection



@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection


 
