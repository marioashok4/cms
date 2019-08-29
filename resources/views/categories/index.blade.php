@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
	<a href="{{route('categories.create')}}" class="btn btn-dark mb-2">ADD CATEGORY</a>
</div>

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center">Categories</h3>
	</div>

	<div class="card-body">

	@if($categories->count()>0)
	
	<table class="table table-bordered table-hover"> 
		<thead>
			<tr>
				<th>
					Name
				</th>
				<th>
					
					Posts Count		
				
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
			@foreach($categories as $category)

			<tr>
				<td>{{$category->name}}</td>

				<td>
					{{$category->posts->count()}}
				</td>

				<td>
					<a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm">EDIT</a>
				</td>

				<td>
					<button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">DELETE</button>
					
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
		No Categories Yet
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