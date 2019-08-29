@extends('layouts.app')

@section('content')

 

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">
			 {{isset($post)?'EDIT POST':'CREATE POST'}}
		</h3>
	</div>

	<div class="card-body">

		 @include('partials.errors')		

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
	    	<label for="category">Category</label>
	    	<select name="category" id="category" class="form-control">Category
			
			@foreach($categories as $category)

			<option value="{{$category->id}}"
				
				{{-- Only whilst editing --}}
				@if(isset($post))
				
				@if($category->id==$post->category_id)
				
				selected

				@endif


				@endif


				>
				{{$category->name}}
			</option>

			@endforeach		


	    	</select>
	    </div>

		@if($tags->count()>0)
	    <div class="form-group">
	    	
	    	<label for="tags">Tags</label>
	    	
			
			<select name="tags[]" id="tags" class="form-control tags-selector" multiple>

	    	@foreach($tags as $tag)

	    	<option value="{{$tag->id}}"
				
			@if(isset($post))

			@if($post->hasTag($tag->id))
			selected

			@endif
			

			@endif	


	    		>
	    		{{$tag->name}}
	    	</option>
	    	

	    	@endforeach	
			


	    		
			

	    	</select>


	    	

	    </div>
	    @endif

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
	});

$(document).ready(function(){

	$(".tags-selector").select2();

});


</script>



 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endsection



@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection


