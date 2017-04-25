

@extends('layouts.main')

@section('title', 'View Posts')

@section('content') 

	<div class="container">

		<div class="row">
			<div class="col-md-8">
				<h1> {{ $post->title }} </h1>

				<p class="lead"> {!! $post->body !!} </p>	

				<hr>

				<div class="tag">
					@foreach ($post->tags as $tag)
						<span class="badge badge-default badge-pill"> {{ $tag->name }} </span>
					@endforeach
				</div>

				<br> <hr> 

				<div class="backend-comments">
					<h3> Comments <small class="small text-muted"> ({{ $post->comments()->count() }} total) </small> </h3> 

					<table class="table">
						<thead>
							<tr>
								<th> Name </th>
								<th> Email </th>
								<th> Comment </th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@foreach ($post->comments as $comment)
							<tr>
								<td> {{ $comment->name }} </td>
								<td> {{ $comment->email }} </td>
								<td> {{ $comment->comment }} </td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
	

			</div> <!-- end of post container -->

			<div class="col-md-4">
				<div class="card card-block bg-faded">
					<dl class="row">
						<dt class="col-sm-5"> URL: </dt>
						<dd> <a href="{{ route('blog.single', $post->slug) }}">{{ url('/blog/'.$post->slug) }} </a></dd>
					</dl>

					<dl class="row">
						<dt class="col-sm-5"> Category: </dt>
						<p> {{ $post->category->name }} </p>
					</dl>

					<dl class="row">
					  	<dt class="col-sm-5"> Created at: </dt>
						<dd class="col-sm-7"> {{ date('M j, Y H:i', strtotime($post->created_at)) }} </dd>

						<dt class="col-sm-5"> Updated at: </dt>
						<dd class="col-sm-7"> {{ date('M j, Y H:i' , strtotime($post->updated_at)) }}</dd>
					</dl>

					<div class="row">
						<div class="col-md-6">
							{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>

						<div class="col-md-6">
							{!! Form::open(array('route' => ['posts.destroy', $post->id], 'method' => 'DELETE')) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}

						</div>
					</div>
				</div> <!-- end of card div -->

				<br>
				
				<div class="row col-md-8 offset-md-1">
					<a href="{{ route('posts.index') }}" class="btn btn-secondary btn-lg btn-block"> Back to posts </a>
				</div>
			</div>
		</div> <!-- end of .row -->

	</div>

@endsection