<div class="row d-flex align-items-stretch">
  <div class="col-lg-3 col-6">
    <!-- small box for Ticket Price -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>Harga Tiket</h3>
      </div>
      <div class="icon">
        <i class="fas fa-ticket-alt"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="showTicketInfo()">Info Lengkap <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  
  <div class="col-lg-3 col-6">
    <!-- small box for Payment -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>Pembayaran</h3>
      </div>
      <div class="icon">
        <i class="fas fa-wallet"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="showPaymentInfo()">Info Lengkap <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  
  <div class="col-lg-3 col-6">
    <!-- small box for Unique Visitors -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>Sistem Informasi</h3>
      </div>
      <div class="icon">
        <i class="fas fa-bus"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="showSystemInfo(); return false;">Info Lengkap <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box for Weather Information -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3 id="weatherTemperature">--°C</h3>
        <p id="weatherDescription">Loading...</p>
      </div>
      <div class="icon">
        <i class="fas fa-cloud-sun-rain"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="showWeatherDetails(); return false;">Info Lengkap <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<!-- Modal for Weather Details -->
<div class="modal fade" id="weatherModal" tabindex="-1" role="dialog" aria-labelledby="weatherModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="weatherModalLabel">Detail Cuaca Semarang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Suhu: <span id="modalTemp">--°C</span></p>
        <p>Deskripsi: <span id="modalDesc">Loading...</span></p>
        <p>Kelembaban: <span id="modalHumidity">--%</span></p>
        <p>Kecepatan Angin: <span id="modalWindSpeed">-- m/s</span></p>
        <p>Arah Angin: <span id="modalWindDirection">--</span></p>
        <p>Tekanan: <span id="modalPressure">-- hPa</span></p>
        <p>Suhu Maks: <span id="modalTempMax">--°C</span></p>
        <p>Suhu Min: <span id="modalTempMin">--°C</span></p>
        <!-- Tambahkan lebih banyak elemen sesuai kebutuhan -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

