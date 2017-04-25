
@extends('layouts.main')

@section('title', '| Categories home')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1> Categories </h1>
				<hr>

				<table class="table">
					<thead> 
						<tr> 
							<th> # </th>
							<th> Name </th>
						</tr>
					</thead>

					<tbody>
						@foreach ($categories as $category)
							<tr> 
								<th> {{ $category->id }} </th>
								<td> {{ $category->name }} </td>
								<td>
									<a href="" class="btn btn-success"> Edit </a>
									<a href="" class="btn btn-danger"> Delete </a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div> <!-- end of md-8 column -->

			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<h3> New category </h3>
					</div>

					<div class="card-block">
						{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

						<div class="form-group">
							{{ Form::label('name', 'Category name') }}
							{{ Form::text('name', null, ['class' => 'form-control'] ) }}
						</div>

						<div class="form-group">
							{{ Form::submit('Add new category', ['class' => 'btn btn-primary btn-block']) }}
						</div>
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop