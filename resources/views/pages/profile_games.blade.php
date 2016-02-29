@extends('layouts.profile')

@section('profile_content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 games-wrapper">
	@if(count($games) >= 1)
		<div class="row">
			<h4>Recent added games</h4>
		</div>
		<div class="row">
			@foreach($games as $game)
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 game-container">
				@if(!$game->game_cover)
					<a href="#edit-game-cover">
						<span class="edit-game-cover">
							edit cover here
						</span>
					</a>
				@else
					
					<img class="img img-circle" src="{{$game->game_cover}}" alt="">
				@endif
				</div>
			@endforeach
		</div>
	@else
		<div class="row add-game-wrapper">
			<div class="pull-left no-games"><h4>You dont have any games added..</h4></div>
			<a href="/profile/{{auth()->user()->name}}/settings/games"><span class="btn btn-primary pull-right add-game">Add game</span></a>
		</div>
	@endif
</div>
@stop