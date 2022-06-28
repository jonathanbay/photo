AOS.init();

// ********** animation du carrousel *************
let swiper = new Swiper(".mySwiper", {
    autoplay: {
      delay: 2500,
    },
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

// ***************** mise en place de la carte avec leafleat ***********
const bollezeele = [50.8666061, 2.3255062]

// création de la map
const map = L.map('carte').setView(bollezeele, 16);

// création du calque images
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
  maxZoom: 20
}).addTo(map);

// ajout d'un marqueur
const marker = L.marker(bollezeele).addTo(map);

// ajout d'un popup
marker.bindPopup('<h3>Studio Photomaeght</h3> <br> 7 Rue de l\'ancienne gare');

// ******************** menu ******************

function openNav() {
  document.getElementById("nav").style.transform = "translateX(0%)";
  document.getElementById("nav").style.transform = "translateX(0%)";
  document.getElementById("open").style.display = "none";
}

function closeNav() {
  document.getElementById("nav").style.transform = "translateX(-100%)";
  document.getElementById("open").style.display = "block";
}






