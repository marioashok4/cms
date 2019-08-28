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
				<td>{{$post->image}}</td>

				<td>
					{{$post->title}}
				</td>

				<td>
					<a href="{{route('categories.edit',$post->id)}}" class="btn btn-primary btn-sm">EDIT</a>
				</td>

				<td>
					 <button type="submit" class="btn btn-danger">DELETE</button>
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