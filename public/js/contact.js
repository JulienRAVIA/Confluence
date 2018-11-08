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
    getMessages();
});

function getMessages() {
    $.ajax({
        type: "POST",
        url: "/ajax.php?action=messages",
        data: datas,
        dataType: "json",
        success: function(data, textStatus, jqXHR) {
            return data;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    })
};