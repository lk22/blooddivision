@extends('layouts.profile')

@section('profile_content')
<h3 class="text-center">Your games</h3>
	@if(count($games) >= 1)
		@foreach($games as $game)
			<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1 profile-game-container animated bounceInUp"> 
				<div class="game-cover">
				@if(!$game->game_cover)
					<div class="add-game-cover">
						<span class="add-game-cover-btn" data-toggle="modal" data-target="#addCoverModal"><i class="fa fa-question-circle"></i> Add game cover here. </span>
					</div>
				@else
					<img class="img img-thumbnail" src="{{$game->game_cover}}" alt="">
				@endif
				</div>
				<div class="game-name">
					<p class="text-center">{{$game->game}}</p>
				</div>
			</div>
		@endforeach
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 add-game-row">
			<form action="" method="post" class="add-game-form">
				{{ csrf_field() }}
				<div class="form-group col-xs-12 col-sm-12 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2">
					<input type="text" class="form-control" name="game_name" placeholder="Your Game here">
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<input type="submit" class="add-game btn btn-success" value="add game">
				</div>
			</form>
		</div>
	@else
		<h5 class="text-center">You dont have any games added to your profile add one here </h5>
		<form action="" method="post" class="add-game-form">
			{{ csrf_field() }}
			<input type="text" class="form-control" name="game_name">
			<input type="submit" class="btn btn-success" value="add game">
		</form>
	@endif
@stop