$('input[type="file"]').on('change', function(e) {
    var fileName = e.target.files[0].name;
    $('#imageLabel').html(fileName);
});