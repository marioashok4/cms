@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
	<a href="{{route('posts.create')}}" class="btn btn-dark mb-2">ADD POST</a>
</div>

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">Posts</h3>
	</div>

	<div class="card-body">

	@if($posts->count()>0)
	
	<table class="table table-bordered table-hover"> 
		<thead>
			<tr>
				<th>
					Image
				</th>

				<th>
					Title
				</th>

				<th>
					Category Name
				</th>
				<th>
					Action
				</th>

				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)

			<tr>
				<td>
					<img src="{{asset($post->image)}}" alt="" width="120" height="60"class="image">
				</td>

				<td>
					{{$post->title}}
				</td>

				<td>
					<a href="{{route('categories.edit',$post->category->id)}}">

						{{$post->category->name}}
						
					</a>
				</td>

				@if($post->trashed())

				<td>
					<form action="{{route('restore-posts',$post->id)}}" method="POST">
						
						@csrf

						@method('PUT')

						<button class="btn btn-warning btn-sm">

							RESTORE
							
						</button>





					</form>
					
				</td>

				@else

				<td>
					<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">EDIT</a>
				</td>




				@endif

				<td>
					<form action="{{route('posts.destroy',$post->id)}}" method="POST">
						@csrf
						@method('DELETE')
						 <button type="submit" class="btn btn-danger btn-sm" name="delete">
						 	 
						 {{$post->trashed()?'DELETE':'TRASH'}}	 
						 </button>
					</form>
					 	

					 </form>
				</td>


				
			</tr>

			


			@endforeach
		</tbody>
	 </table>

	 


	@else

	<h3 class="text-center">
		No Posts Yet
	</h3>

	@endif	
		
	</div>
</div>



@endsection


@section('scripts')

<script>
	
	function handleDelete(id)
	{	
		const form = document.getElementById('form');
		form.action = '/categories/'+id;
		$("#deleteModal").modal('show');
		
	}
</script>


@endsection