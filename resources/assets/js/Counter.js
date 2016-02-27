class Counter {

	this.count = 0;

	contstructor() {
		setInterval(function() {
			this.tick();
		}.bind(this), 1000);
	}

	tick() {
		this.count++;
		console.log(this.count);
	}

}

export default Counter;