document.addEventListener("DOMContentLoaded", () => {

  // STICKY HEADER TOGGLE
  const selectHeader = document.querySelector(".header");
  if (selectHeader) {
      const headerScrolled = () => {
          if (window.scrollY > 0) {
              selectHeader.classList.add("header-sticky");
          } else {
              selectHeader.classList.remove("header-sticky");
          }
      };
      window.addEventListener("load", headerScrolled);
      document.addEventListener("scroll", headerScrolled);
  }

  // Leaflet mapa
  const map = L.map('map').setView([44.0, 20.5], 7);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
  }).addTo(map);

  document.querySelectorAll('.location-card').forEach(card => {
      const lat = card.dataset.lat;
      const lng = card.dataset.lng;

      const marker = L.marker([lat, lng]).addTo(map);

      card.querySelector('.focus-map').addEventListener('click', () => {
          map.setView([lat, lng], 14);
          marker.openPopup();
      });
  });
});