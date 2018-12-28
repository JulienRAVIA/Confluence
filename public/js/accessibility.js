var body = $('body');
var button = $('a[data-toggle="accessibility"]');

$(button).on('click', function(e) {
    e.preventDefault();
    body.toggleClass('accessibility');
    $(button).toggleClass('active');
    console.log($(this));
    $.get("/accessibility");
});