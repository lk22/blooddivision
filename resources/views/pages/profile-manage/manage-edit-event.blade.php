@extends('layouts.settings')

@section('settings-content')
	{!! Form::open(['url' => '', 'method' => 'post', 'class' => 'update-form']) !!}

		{!! csrf_field() !!}

		<div class="form-group">
			{!! Form::label() !!}
		</div>


	{!! Form::close() !!}

	
@stop