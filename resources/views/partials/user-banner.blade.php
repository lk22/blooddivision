<div class="row user-banner">
	<div class="container">
	    <span class="userimage">
	        @if(auth()->user()->avatar)
	            <img class="img img-circle b-2 b-solid b-dark-blue" src="/images/avatars/{{auth()->user()->avatar}}" alt="">
	        @else
	            <img class="img img-circle b-2 b-solid b-dark-blue" src="/images/mystery-man.jpg" alt="">
	        @endif
	    </span>
	    <span class="welcomeMessage"><h5>{{e('Welcome: ')}} {{auth()->user()->name}}</h5></span>
	</div>
</div>