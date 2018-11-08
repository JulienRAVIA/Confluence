var map = L.map('mapid', {
    center: [45.736981, 4.817221],
    zoom: 15.3
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

new L.Control.BootstrapModal({
    modalId: 'reperes',
    tooltip: "Repères",
    glyph: 'map-signs'
}).addTo(map);

var icons= [];
$.ajax({
    type: "POST",
    url: "/api/types",
    dataType: "json",
    success: function(results) {
        $.each(results, function(k, v) {
            console.log(v.icone);
            icons[v.id] = new L.icon({
                iconUrl: '/img/icons/' + v.icone + '.png',
                iconSize:     [20, 20],
            });
        });
    }
});

var Esri_WorldTopoMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}').addTo(map);

var marqueurs = [];
$('form#types').on('change', function() {
    if(marqueurs.length > 0) {
        for(var i = 0; i < marqueurs.length; i++){
            map.removeLayer(marqueurs[i]);
        }
        marqueurs = [];
    }
    var types = [];
    $('input[type="checkbox"]:checked').each(function(index, el) {
        types.push($(el).val());
    });
    $.ajax({
        type: "POST",
        url: "/api/lieux",
        data: {types: types},
        dataType: "json",
        success: function(results) {
            $.each(results, function(k, v) {
                var coords = v.gps;
                var gps = coords.split(", ");
                var marker = L.marker([gps[0], gps[1]], {icon: icons[v.type]}).bindPopup("<b>" + v.nom + "</b>");
                marqueurs.push(marker);
            });
            L.layerGroup(marqueurs).addTo(map);
        }
    });
    map.invalidateSize();
});