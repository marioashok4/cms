@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
	<a href="{{route('tags.create')}}" class="btn btn-dark mb-2">ADD TAG</a>
</div>

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">Tags</h3>
	</div>

	<div class="card-body">

	@if($tags->count()>0)
	
	<table class="table table-bordered table-hover"> 
		<thead>
			<tr>
				<th>
					Name
				</th>

				<th>
					Total Posts
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
			@foreach($tags as $tag)

			<tr>
				<td>{{$tag->name}}</td>

				<td>
					{{$tag->posts->count()}}
				</td>

				 
				<td>
					<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-sm">EDIT</a>
				</td>

				<td>
					<button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">DELETE</button>
					
				</td>


				
			</tr>

			


			@endforeach
		</tbody>
	 </table>

	 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" id="form" method="POST">
    	@csrf
    	@method('DELETE')
    	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        <button type="submit" class="btn btn-danger">DELETE</button>
      </div>
    </div>
    </form>
  </div>
</div>


	@else

	<h3 class="text-center">
		No Tags Yet
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
		form.action = '/tags/'+id;
		$("#deleteModal").modal('show');
		
	}
</script>


@endsection