<!-- menampilkan peta -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map', {
        minZoom: 1,
        maxZoom: 4,
        center: [0, 0],
        zoom: 1, 
        crs: L.CRS.Simple
    });

    var w = 7830, 
        h = 5327,
        url = 'dist/img/koridor1.jpg';

    // Menghitung sudut koordinat gambar
    var southWest = map.unproject([0, h], map.getMaxZoom()-1);
    var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
    var bounds = new L.LatLngBounds(southWest, northEast);

    // Menambahkan gambar sebagai overlay peta
    L.imageOverlay(url, bounds).addTo(map);

    // Menyesuaikan view map agar sesuai dengan gambar
    map.fitBounds(bounds);
</script>

<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
  var map = L.map('map').setView([-6.966667, 110.416667], 13); // Pusat peta di kota Semarang

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Tambahkan marker untuk Terminal Mangkang
  var markerMangkang = L.marker([-6.96868, 110.28966]).addTo(map)
    .bindPopup('Terminal Mangkang')
    .openPopup();

  // Tambahkan marker untuk Terminal Penggaron
  var markerPenggaron = L.marker([-7.01747, 110.49347]).addTo(map)
    .bindPopup('Terminal Penggaron')
    .openPopup();

  // Tambahkan polyline untuk menunjukkan rute
  var latlngs = [
      [-6.96868, 110.28966], 
      [-6.99037, 110.42293],
      [-7.01747, 110.49347]
  ];
  var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

  // Zoom peta agar semua marker terlihat
  map.fitBounds(polyline.getBounds());
</script> -->

<!-- Show/hide Route -->
<script>
  // Get the button and the card containing the route list
  var btn = document.getElementById('toggleRouteList');
  var card = document.getElementById('routeListCard');

  // Add click event listener to the button
  btn.addEventListener('click', function() {
    // Toggle the display style
    if (card.style.display === 'none') {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
</script>

<!-- Tiket -->
<script>
function showTicketInfo() {
  Swal.fire({
    title: '<strong>Detail Harga Tiket BRT Trans Semarang</strong>',
    html: `<span class="warna-text"><b>Transaksi Tunai Umum:</b> Rp 4.000<br></span>` +
          `<span class="warna-text"><b>Transaksi Non Tunai Umum:</b> Rp 3.500<br></span>` +
          `<span class="warna-text"><b>Pelajar/Mahasiswa/Lansia/Veteran/Disabilitas:</b> Rp 1.000 <i>(dengan syarat tertentu)</i></span>`,
    footer: '<a href="https://transsemarang.semarangkota.go.id/">Kunjungi website resmi untuk info lebih lanjut</a>',
    icon: 'info',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#4ca4b5',
    buttonsStyling: true,
    customClass: {
      popup: 'swal-popup',
      title: 'custom-title',
      content: 'swal-text'
    },
    showCancelButton: false,
    focusConfirm: true,
    animation: true,
    background: 'white'
  });
}
</script>

<!-- Payment -->
<script>
function showPaymentInfo() {
  Swal.fire({
    title: '<strong>Metode Pembayaran BRT Trans Semarang</strong>',
    html: '<span class="warna-text"><b>Pembayaran bisa dilakukan dengan beberapa metode :</span></b><ul>' +
          '<span class="warna-text"><li>Tunai di loket</li></span>' +
          '<span class="warna-text"><li>Kartu BRIZZI</li></span>' +
          '<span class="warna-text"><li>AstraPay</li></span>' +
          '<span class="warna-text"><li>e-Money dari berbagai bank</li></span>' +
          '<span class="warna-text"><li>QRIS melalui aplikasi pembayaran</li></span></ul>',
    icon: 'info',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#4ca4b5',
    buttonsStyling: true,
    customClass: {
      popup: 'swal-popup',
      title: 'custom-title',
      content: 'swal-text'
    },
    showCancelButton: false,
    focusConfirm: true,
    animation: true,
    background: 'white'
  });
}
</script>

