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
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>

<!-- Twitter Widget -->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


<!-- Grafik Jumlah Penumpang -->
<script>
    async function fetchData() {
        const response = await fetch('get_passenger_statistics.php');
        const data = await response.json();
        return data;
    }
    document.addEventListener('DOMContentLoaded', createChart);

async function createChart() {
    const fetchedData = await fetchData();
    const ctx = document.getElementById('passengersChart').getContext('2d');
    const passengersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: fetchedData.map(item => item.year),
            datasets: [{
                label: 'Penumpang Per Tahun',
                data: fetchedData.map(item => item.total_annual_passengers),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                yAxisID: 'y'
            }, {
                label: 'Rata-rata Penumpang Harian',
                data: fetchedData.map(item => item.average_daily_passengers),
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                yAxisID: 'y1'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Penumpang Per Tahun'
                    }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Rata-rata Penumpang Harian'
                    },
                    grid: {
                        drawOnChartArea: false 
                    }
                }
            },
            plugins: {
                legend: {
                    display: true
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

</script>

<!-- Grafik Penumpang PerJam -->
<script>
var timeLabels = <?php echo json_encode($times); ?>;
var normalPassengerData = <?php echo json_encode($normalPassengerCounts); ?>;
var weekendPassengerData = <?php echo json_encode($weekendPassengerCounts); ?>;

var ctx = document.getElementById('passengersperhour').getContext('2d');
var passengersperhour = new Chart(ctx, {
  type: 'line',
  data: {
    labels: timeLabels,
    datasets: [{
      label: 'Jumlah Penumpang Hari Biasa',
      data: normalPassengerData,
      backgroundColor: 'rgba(54, 162, 235, 0.5)',
      borderColor: 'rgba(54, 162, 235, 1)',
      fill: false,
      tension: 0.1
    }, {
      label: 'Jumlah Penumpang Weekend',
      data: weekendPassengerData,
      backgroundColor: 'rgba(255, 99, 132, 0.5)',
      borderColor: 'rgba(255, 99, 132, 1)',
      fill: false,
      tension: 0.1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
      datalabels: {
        anchor: 'end',
        align: 'top',
        formatter: Math.round,
        font: {
          weight: 'bold'
        }
      },
      zoom: {
        zoom: {
          wheel: {
            enabled: true,
          },
          pinch: {
            enabled: true
          },
          mode: 'xy'
        },
        pan: {
          enabled: true,
          mode: 'xy'
        }
      },
      tooltip: {
        mode: 'index',
        intersect: false
      },
      annotation: {
        annotations: {
          line1: {
            type: 'line',
            yMin: 80,
            yMax: 80,
            borderColor: 'rgb(255, 0, 0)',
            borderWidth: 2,
            label: {
              content: 'Penumpang Maksimal BRT Trans Semarang',
              enabled: true,
              position: 'center',
              backgroundColor: 'rgba(255, 0, 0, 0.6)'
            }
          }
        }
      }
    }
  }
});
</script>

<!-- Penumpang perhalte -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('halteChart').getContext('2d');
        var halteChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo '"' . implode('", "', array_column($halteData, 'nama_halte')) . '"'; ?>],
                datasets: [{
                    label: 'Rata-rata Jumlah Penumpang per Hari',
                    data: [<?php echo implode(', ', array_column($halteData, 'jumlah_penumpang')); ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });
    });
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

<script>
  $('.editBtn').click(function() {
    var currentRow = $(this).closest('tr');
    var year = currentRow.find('td:eq(0)').text(); // Tahun sebagai pengenal unik
    var total = currentRow.find('td:eq(1)').text();
    var average = currentRow.find('td:eq(2)').text();

    $('#editYear').val(year);
    $('#editTotal').val(total);
    $('#editAverage').val(average);

    $('#editModal').modal('show');
});

function submitEdit() {
    var formData = $('#editForm').serialize();
    $.ajax({
        url: 'update_passenger_data.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            location.reload(); // Reload untuk melihat perubahan
        },
        error: function() {
            alert('Error updating data.');
        }
    });
}
function submitAdd() {
    var formData = $('#addForm').serialize();
    $.ajax({
        url: 'add_passenger_data.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            location.reload(); // Reload untuk melihat data baru
        },
        error: function() {
            alert('Error adding data.');
        }
    });
}
$('.deleteBtn').click(function() {
    var currentRow = $(this).closest('tr');
    var year = currentRow.find('td:eq(0)').text(); // Tahun sebagai pengenal unik

    $('#deleteYear').val(year);

    $('#deleteModal').modal('show');
});

function submitDelete() {
    var formData = $('#deleteForm').serialize();
    $.ajax({
        url: 'delete_passenger_data.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            location.reload(); // Reload untuk melihat perubahan
        },
        error: function() {
            alert('Error deleting data.');
        }
    });
}

</script>