$(".btn-md").on('click', function() {
	$.ajax({
		url: '/submission/get-image',
		type: 'POST',
		dataType: 'json',
		data: { _token: $('#tokenUsers').val(), user_registered_id: this.value },
	})
	.done(function(res) {
		console.log(res);
	})
	.fail(function() {
		console.log("error");
	});
	
});