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
					Action
				</th>

				<th>
					
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)

			<tr>
				<td>{{$category->name}}</td>

				<td>
					<a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm">EDIT</a>
				</td>
				
			</tr>

			


			@endforeach
		</tbody>
	 </table>


	@else

	@endif	
		
	</div>
</div>



@endsection