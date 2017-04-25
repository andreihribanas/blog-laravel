 @extends('layouts.main')

@section('title', ' | Register')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				{!! Form::open() !!}
				
					<div class="form-group">
						<strong>{!! Form::label('name', 'Name:') !!} </strong>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<strong>{!! Form::label('email', 'Email:') !!}</strong>
						{!! Form::email('email', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<strong>{!! Form::label('password', 'Pasword:') !!}</strong>
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<strong>{!! Form::label('password_confirmation', 'Confirm password:') !!}</strong>
						{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
					</div>

					
					<div class="form-group">
						{!! Form::submit('Register', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
					</div>
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop