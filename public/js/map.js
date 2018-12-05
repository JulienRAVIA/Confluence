
    
    var map = L.map('mapid', {
        center: [45.736981, 4.817221],
        zoom: 15,
        zoomSnap: 0.25
    });
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var Esri_WorldTopoMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}').addTo(map);
function go() {
    var routeCtrl = L.geoportalControl.Route({});
    map.addControl(routeCtrl);
}
    var polygon = L.polygon([
        [
            45.743448811311815,
            4.818449020385742
        ],
        [
            45.7424904212476,
            4.8209381103515625
        ],
        [
            45.7411127067066,
            4.824028015136719
        ],
        [
            45.74009437410821,
            4.823427200317383
        ],
        [
            45.736979359100445,
            4.820852279663086
        ],
        [
            45.733534669030526,
            4.819049835205078
        ],
        [
            45.728472086747104,
            4.818534851074219
        ],
        [
            45.730868632600014,
            4.817848205566406
        ],
        [
            45.732126778009466,
            4.815788269042969
        ],
        [
            45.7350443678686,
            4.81501579284668
        ],
        [
            45.74037591479553,
            4.813814163208008
        ],
        [
            45.74275997011605,
            4.814200401306152
        ],
        [
            45.74380820334429,
            4.814672470092773
        ],
        [
            45.74488636556012,
            4.815273284912109
        ],
        [
            45.743448811311815,
            4.818449020385742
        ]
    ]).addTo(map);
        
    L.Control.Watermark = L.Control.extend({
        onAdd: function(map) {
            var img = L.DomUtil.create('img');
    
            img.src = '../img/photos/logo.png';
            img.style.width = '200px';
    
            return img;
        },
    });
    
    L.control.watermark = function(opts) {
        return new L.Control.Watermark(opts);
    }
    
    L.control.watermark({ position: 'bottomright' }).addTo(map);


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
                iconSize: [20, 20],
            });
        });
    }
});


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

Gp.Services.getConfig({
    apiKey : "jhyvi0fgmnuxvfv0zjzorvdn",
    onSuccess : go
}) ;
