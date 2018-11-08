var formContact = $('form#contact');
$(formContact).on('submit', function(event) {
    event.preventDefault();
    var datas = formContact.serialize();
    $.ajax({
        type: "POST",
        url: "/contact/send",
        data: datas,
        dataType: "json",
        beforeSend: function() {
            $('#send').attr("disabled", true);
        },
        success: function(response, textStatus, jqXHR) {
            swal ( response.title, response.message, response.code);
            if(response.code =='success') {
                $('form')[0].reset();
                $(formContact).modal('hide');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        },
        complete: function() {
            $('#send').removeAttr('disabled');
        }
    })
});




