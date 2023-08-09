// En tu archivo app.js

function initMap() {
    const location = { lat: 21.486667628544655, lng: -104.88530343226584 }; // Cambia LATITUDE y LONGITUDE con las coordenadas que desees

    const map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 15 // Ajusta el nivel de zoom según tus preferencias
    });

    const marker = new google.maps.Marker({
        position: location,
        map: map,
        title: 'Ristorante Turilli'
    });
}
