var formContact = $('form#contact');
$('form#contact').on('submit', function(event) {
    event.preventDefault();
    var datas = formContact.serialize();
    $.ajax({
        type: "POST",
        url: "/contact/send",
        data: datas,
        dataType: "json",
        success: function(responseData, textStatus, jqXHR) {
            console.log(responseData);
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    })
});