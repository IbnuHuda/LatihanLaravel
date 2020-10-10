$(".btn-md").on('click', function() {
	$.ajax({
		url: '/submission/get-image',
		type: 'POST',
		dataType: 'json',
		data: { _token: $('#tokenUsers').val(), user_registered_id: this.value },
	})
	.done(function(res) {
		console.log(res);
		res.forEach(function(value, index) {
			$('#submission').append(`
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ Storage::url('storage/images/company/portofolios/') }}/`+value+`" />
					<input type="radio" id="portofolio-` + (index+1) + `">
                </div>`);
		});
	})
	.fail(function() {
		console.log("Error! Try again.");
	});
});