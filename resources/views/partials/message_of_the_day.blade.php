<div class="row message-of-the-day-row">
    <div class="panel panel-default message-of-the-day-wrapper">
        <div class="panel-heading">
            Message of the day:
        </div>
        <div class="panel-body message-body">
	        @if(MessageOfTheDay::count() > 0)
		        @foreach($messages as $message)
		            {{ $message->message }}
		        @endforeach
		    @else
				There is no message of the day
		    @endif
        </div>
    </div>
</div>