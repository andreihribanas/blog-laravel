
@extends('layouts.main')

@section('title', '| Tags home')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1> All tags </h1>
				<hr>

				<table class="table">
					<thead> 
						<tr> 
							<th> # </th>
							<th> Name </th>
						</tr>
					</thead>

					<tbody>
						@foreach ($tags as $tag)
							<tr> 
								<th> {{ $tag->id }} </th>
								<td> {{ $tag->name }} </td>
								<td>
									<a href="{{ route('tags.show', $tag->id) }}" class="btn btn-secondary btn-sm"> View </a>
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
						{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

						<div class="form-group">
							{{ Form::label('name', 'Tag name') }}
							{{ Form::text('name', null, ['class' => 'form-control'] ) }}
						</div>

						<div class="form-group">
							{{ Form::submit('Add new tag', ['class' => 'btn btn-primary btn-block']) }}
						</div>
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop