$('select#types').on('change', function() {
    var id = $('select#types').find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/api/lieux/" + id,
        dataType: "json",
        success: function(results) {
            console.log(results);
        }
    });
});