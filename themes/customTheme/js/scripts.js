jQuery(document).ready($ => {
    $('.menu-principal ul').slicknav({
        label: '',
        appendTo: '.site-header'
    });

    //Agregar slider

    $('.listado-testimoniales').bxSlider({ auto: true });

    //Mapa de leaflet

    const lat = document.querySelector('#lat').value, lng = document.querySelector('#lng').value, direccion = document.querySelector('#direccion').value

    if (lat && lng && direccion) {

        var map = L.map('mapa').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup(direccion)
            .openPopup();
    }
});


// Menu de navegacion fijo

window.onscroll = () => {
    const scroll = window.scrollY;

    const headerNav = document.querySelector('.barra-navegacion');
    const documentBody = document.querySelector('body');

    if (scroll > 300) {
        headerNav.classList.add('fixed-top');
        documentBody.classList.add('ft-activo');
    } else {
        headerNav.classList.remove('fixed-top');
        documentBody.classList.remove('ft-activo');
    }
}
