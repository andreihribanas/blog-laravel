@extends('layouts.main')

@section('title', ' | $tag->name Tag')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>  {{ $tag->name }} Tag <small class="text-muted"> {{ $tag->posts()->count() }} Posts</small> </h1>
			</div>
			
			<div class="col-md-2">
				<a href="{{ route('tags.edit', $tag->id ) }}" class="btn btn-primary btn-block pull-right"> Edit </a>
			</div>

			<div class="col-md-2">
				{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
					{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
				{!! Form::close() !!}
			</div>

			<hr>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr> 
							<th> ID </th>
							<th> Title </th>
							<th> Tags </th>
							<th> </th>
						</tr>
					</thead>

					<tbody>
						@foreach ($tag->posts as $post)
						<tr>
							<th> {{ $post->id }} </th>
							<td> {{ $post->title }}</td>
							<td> 
								@foreach ($post->tags as $tag)
									<span class="badge badge-default"> {{ $tag->name}} </span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-secondary"> View </a>
						</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div> <!-- end form row -->

	</div>

@stop