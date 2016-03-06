<section class="container-fluid manage-header">
	<div class="container inner-header">
		<div class="row">
			<h3>Settings</h3>
		</div>
		<div class="row">
			@foreach($user as $the_user)
				{{$the_user->name}}
			@endforeach
		</div>
	</div>
</section>