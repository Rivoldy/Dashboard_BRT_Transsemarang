<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Twitter Widget -->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<!-- Grafik Jumlah Penumpang -->
<script>
  // Data untuk grafik
  var passengerData = {
    labels: ['2017', '2018', '2019', '2020', '2021'],
    datasets: [{
      label: 'Jumlah Penumpang',
      data: [3456543, 3751045, 3916225, 2164420, 1588135],
      backgroundColor: 'rgba(54, 162, 235, 0.5)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  };

  // Konfigurasi grafik
  var chartOptions = {
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: 'Jumlah Penumpang'
        }
      }
    },
    plugins: {
      legend: {
        display: true,
        position: 'top'
      }
    },
    responsive: true,
    maintainAspectRatio: false
  };

  // Buat grafik
  var ctx = document.getElementById('passengers-chart').getContext('2d');
  var passengersChart = new Chart(ctx, {
    type: 'line',
    data: passengerData,
    options: chartOptions
  });

  // Fungsi untuk memicu pencetakan
  function printReport() {
    window.print();
  }
</script>

<!-- Pie chart -->
<script>
var colors = ['#3498db', '#e74c3c', '#9b59b6', '#f1c40f', '#2ecc71', '#1abc9c', '#34495e', '#95a5a6', '#d35400', '#2c3e50'];

// Helper function to generate tooltips with both count and percentage
function generateTooltipCallback() {
  return {
    label: function(tooltipItem, data) {
      var label = data.labels[tooltipItem.index] || '';
      var value = data.datasets[0].data[tooltipItem.index];
      var total = data.datasets[0].data.reduce(function(previousValue, currentValue) {
        return previousValue + currentValue;
      });
      var percentage = Math.round((value / total) * 100);
      return label + ': ' + value + ' (' + percentage + '%)';
    }
  }
}

// Generate a pie chart for each data set
<?php foreach ($data as $key => $values): ?>
var ctx = document.getElementById('<?= $key ?>PieChart').getContext('2d');
var <?= $key ?>PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?= json_encode(array_column($values, array_keys($values[0])[0])) ?>,
    datasets: [{
      data: <?= json_encode(array_column($values, 'count')) ?>,
      backgroundColor: colors.slice(0, <?= count($values) ?>),
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'top',
    },
    title: {
      display: true,
      text: 'Distribusi <?= ucfirst(str_replace('_', ' ', $key)) ?>'
    },
    tooltips: generateTooltipCallback()
  }
});
<?php endforeach; ?>
</script>