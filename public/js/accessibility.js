var body = $('body');

$('a[data-toggle="accessibility"]').on('click', function(e) {
    e.preventDefault();
    body.toggleClass('accessibility');
});