function carregarmapa() { // criar o ponto das coordenadas
    var ponto = new google.maps.LatLng(
    38.73376520878317, -9.141150730691137
    );
    var opcoes = { // criar as opções do mapa
        zoom: 12,
        center: ponto,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var m = new google.maps.Map(document.getElementById("mapa"), opcoes); //criar o mapa
    var marca = new google.maps.Marker({
        position: ponto,
        map: m
    }); 
}
    function geo() {
        var geocoder = new google.maps.Geocoder();
        var direccao = $('#direccao').val();
        geocoder.geocode({'address': direccao},
        
        function(results, status) {
        if (status == 'OK') {
            m.setCenter(results[0].geometry.location);
            var marker = newgoogle.maps.Marker({
                            map: m,
                            position: results[0].geometry.location
        });
        } else {
            alert('Morada não encontrada: ' + status);
        }
        });
    }