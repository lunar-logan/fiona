(function(){

	function AppState(height, width) {
		this.height = height;
		this.width = width;
	}

	AppState.prototype.setup = function() {
		var self = this;

		$('#header').css("height", self.height + 'px');
		$('#contact-form').css("height", self.height + 'px');
	};

	var APP = null;

	$(document).ready(function() {
		APP = new AppState($(document).height(), $(document).width());
		APP.setup();
	});
})();