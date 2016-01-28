@extends('layout.profile')

@section('profile_content')
	@if(count($games) >= 1)
		@foreach($games as $game)
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 profile-game-container">
				<div class="game-cover">
					<img class="img img-thumbnail" src="{{$game->game_cover}}" alt="">
				</div>
				<div class="game-name">
					<h4 class="text-center">{{$game->game}}</h4>
				</div>
			</div>
		@endforeach
	@else
		You dont have any favourite games
	@endif
@stop