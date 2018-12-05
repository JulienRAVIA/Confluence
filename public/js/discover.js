$('button[data-toggle="show"]').on('click', function(event) {
    var place = $(event.currentTarget).attr('data-place');
    console.log(place);
    $.ajax({
        type: "POST",
        url: "/api/lieux/" + place,
        dataType: "json",
        success: function(data) {
            if(data.code == 'success') {
                $('#placeModal').modal('show');
                $('#placeModal #title').html(data.data.nom);
                if(data.data.image !== null) {
                    $('#placeModal img').show();
                    $('#placeModal img').attr('src', '/api/photos/' + data.data.image + '?w=1000');
                } else {
                    $('#placeModal img').hide();
                } 
                $('#placeModal #description').html(data.data.description);
            }
        }
    });
});