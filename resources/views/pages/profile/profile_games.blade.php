@extends('layouts.profile')

@section('profile_content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 games-wrapper">
	@if(count($games) >= 1)
		<div class="row">
			<h4>Recent added games</h4>
		</div>
		<div class="row">
			@foreach($games as $game)
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 game-container">
				@if(!$game->game_cover)
					<a href="#edit-game-cover center-block">
						<span class="edit-game-cover">
							edit cover here
						</span>
					</a>
				@else
					<img class="img img-circle" src="/images/covers{{$game->game_cover}}" alt="">
					<h5 class="text-center">{{$game->game}}</h5>
				@endif
				</div>

			@endforeach
			
		</div>
		<div class="row">
			<a href="/profile/{{auth()->user()->name}}/settings/games" class="btn add-game-btn pull-right">Add game</a>
		</div>
	@else
		<div class="row add-game-wrapper">
			<div class="pull-left no-games"><h4>You dont have any games added..</h4></div>
			<a href="/profile/{{auth()->user()->name}}/settings/games"><span class="btn btn-primary pull-right add-game">Add game</span></a>
		</div>
	@endif
</div>
@stop