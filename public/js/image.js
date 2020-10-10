$('input[type="file"]').on('change', function(e) {
    var fileName = e.target.files[0].name;
    $('#imageLabel').html(fileName);
});

function apply(params = null)
{
    if (params == 'team') {
        if (confirm('Are you sure want to apply as team?')) return true;
        else return false;
    }
    else {
        if (confirm('Are you sure want to apply job?')) return true;
        else return false;
    }
}