@extends('layouts.main')

@section('title', 'Edit blog post')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
@stop

@section('content')

	<div class="container">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-8">

					<div class="form-group">
						<strong> {!! Form::label('title', 'Title:') !!} </strong>
						{!! Form::text('title', null, ['class' => 'form-control input-lg']) !!} 
					</div>

					<div class="form-group">
						<strong>  {!! Form::label('slug', 'Post slug:') !!} </strong>
						{!! Form::text('slug', null, ['class' => 'form-control']) !!} 
					</div>

					<div class="form-group">
						<strong>  {!! Form::label('category_id', 'Category:') !!} </strong>
						{!! Form::select('category_id', $categories, null, ['class' => 'form-control'])  !!} 
					</div>

					<div class="form-group">
						<strong>  {!! Form::label('tags', 'Tag:') !!} </strong>
						{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple'])  !!} 
					</div>

					<div class="form-group">
						{{ Form::label('featured_image', 'Update image:') }}
						{{ Form::file('featured_image', ['class' => 'form-control']) }}
					</div>
	
					<div class="form-group">
						<strong>  {!! Form::label('body', 'Post body:') !!} </strong>
					{!! Form::textarea('body', null, ['class' => 'form-control']) !!} 
					</div>
				</div> <!-- end of post container -->

				<div class="col-md-4">
					<div class="card card-block bg-faded">
						<dl class="row">
							  <dt class="col-sm-5"> Created at</dt>
							  <dd class="col-sm-7"> {{ date('M j, Y H:i', strtotime($post->created_at)) }} </dd>

							  <dt class="col-sm-5"> Updated at: </dt>
							  <dd class="col-sm-7"> {{ date('M j, Y H:i' , strtotime($post->updated_at)) }}</dd>
						</dl>

						<div class="row">
							<div class="col-md-6">
								{{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) }}
							</div>

							<div class="col-md-6">
								{{ Form::submit('Save changes', array('class' => 'btn btn-success btn-block')) }}
								
							</div>
						</div>
					</div>

				</div>

				</div>
			{!! Form::close() !!}
		</div> <!-- end of .row -->
	</div>

@stop


@section('scripts')
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger('change');
	</script>
@endsection