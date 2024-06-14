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

<!-- Cuaca -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  fetchWeatherData();
});

function fetchWeatherData() {
  const apiKey = '4f6b3b54850ed3da4024173360334f49'; //API KEY
  const url = `https://api.openweathermap.org/data/2.5/weather?q=Semarang&appid=${apiKey}&units=metric`;

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      updateWeatherDashboard(data);
    })
    .catch(error => {
      console.error('Error fetching weather data:', error);
      document.getElementById('weatherDescription').textContent = 'Failed to load data';
    });
}

function updateWeatherDashboard(data) {
  const temperature = data.main.temp;
  const weatherDescription = data.weather[0].description;
  const humidity = data.main.humidity;
  const windSpeed = data.wind.speed;
  const windDirection = data.wind.deg;
  const pressure = data.main.pressure;
  const tempMax = data.main.temp_max;
  const tempMin = data.main.temp_min;

  document.getElementById('weatherTemperature').textContent = `${temperature.toFixed(1)}°C`;
  document.getElementById('weatherDescription').textContent = weatherDescription.charAt(0).toUpperCase() + weatherDescription.slice(1);
  document.getElementById('modalTemp').textContent = `${temperature.toFixed(1)}°C`;
  document.getElementById('modalDesc').textContent = weatherDescription.charAt(0).toUpperCase() + weatherDescription.slice(1);
  document.getElementById('modalHumidity').textContent = `${humidity}%`;
  document.getElementById('modalWindSpeed').textContent = `${windSpeed.toFixed(1)} m/s`;
  document.getElementById('modalWindDirection').textContent = `${windDirection}°`;
  document.getElementById('modalPressure').textContent = `${pressure} hPa`;
  document.getElementById('modalTempMax').textContent = `${tempMax.toFixed(1)}°C`;
  document.getElementById('modalTempMin').textContent = `${tempMin.toFixed(1)}°C`;
  // Update more fields as needed
}
function showWeatherDetails() {
  // Pastikan data sudah dimuat, jika tidak tampilkan pesan error
  if (!document.getElementById('weatherTemperature').textContent.includes('°C')) {
    Swal.fire({
      title: 'Data not loaded',
      text: 'Please wait for the weather data to load or check your network connection.',
      icon: 'error',
      confirmButtonText: 'Tutup'
    });
    return;
  }

  // Jika data dimuat, tampilkan detail cuaca
  Swal.fire({
    title: '<strong class="custom-title">Detail Cuaca Semarang Sekarang</strong>',
    html: `
      <div class="text-left">
        <p>Suhu: <span class="warna-text">${document.getElementById('weatherTemperature').textContent}</span></p>
        <p>Deskripsi: <span class="warna-text">${document.getElementById('weatherDescription').textContent}</span></p>
        <p>Kelembaban: <span class="warna-text">${document.getElementById('modalHumidity').textContent}</span></p>
        <p>Kecepatan Angin: <span class="warna-text">${document.getElementById('modalWindSpeed').textContent}</span></p>
        <p>Arah Angin: <span class="warna-text">${document.getElementById('modalWindDirection').textContent}</span></p>
        <p>Tekanan: <span class="warna-text">${document.getElementById('modalPressure').textContent}</span></p>
        <p>Suhu Maks: <span class="warna-text">${document.getElementById('modalTempMax').textContent}</span></p>
        <p>Suhu Min: <span class="warna-text">${document.getElementById('modalTempMin').textContent}</span></p>
      </div>
    `,
    icon: 'info',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#4ca4b5'
  });
}

</script>

<script>
function showSystemInfo() {
  Swal.fire({
    title: 'Detail Sistem Informasi Trans Semarang',
    html: `
      <ul>
        <li><strong>Sistem Pemantauan GPS:</strong> Melacak posisi bus secara real-time.</li>
        <li><strong>Sistem Informasi Penumpang:</strong> Menampilkan informasi rute dan jadwal bus.</li>
        <li><strong>Intelligent Transportation System (ITS):</strong> Integrasi teknologi untuk efisiensi dan keamanan.</li>
        <li><strong>Sistem Ticketing Elektronik:</strong> Pembayaran non-tunai menggunakan kartu smart card.</li>
        <li><strong>Aplikasi Mobile:</strong> Informasi rute, jadwal, dan pembelian tiket melalui smartphone. <br>Download:
          <a href="https://play.google.com/store/apps/details?id=ngi.brtsemarang.apppublic&hl=id" target="_blank">Google Play</a> |
          <a href="https://apps.apple.com/id/app/trans-semarang/id1460565652" target="_blank">App Store</a>.
        </li>
        <li><strong>Sistem Manajemen Pengaduan:</strong> Mengelola feedback dan keluhan penumpang.</li>
      </ul>
    `,
    icon: 'info',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#4ca4b5'
  });
}
</script>
