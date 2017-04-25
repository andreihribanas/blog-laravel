

@extends('layouts.main')

@section('tile', 'All posts')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h1> All posts </h1>
			</div>

			<div class="col-md-2">
				<a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-h1-spacing"> Create new </a>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th> # </th>
						<th> Title </th>
						<th> Body </th>
						<th> Created at </th>
						<th>  </th>
					</thead>

					<tbody>
						@foreach ($posts as $post)
							<tr>
								<td> <strong> {{ $post->id }} </strong> </td>
								<td> {{ $post->title }} </td>
								<td> {{ substr(strip_tags($post->body), 0, 50)}}{{ strlen(strip_tags($post->body)) >50 ? '...' : '' }} </td>
								<td> {{ date('M d, Y - H:i', strtotime($post->created_at)) }} </td>
								<td>
									<a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary btn-sm"> View</a> 
									<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-sm"> Edit </a> 
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					{!! $posts->links(); !!}
				</div>
			</div>
		</div>
	</div>

@stop