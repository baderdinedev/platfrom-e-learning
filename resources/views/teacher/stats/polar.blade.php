<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Polar Area Chart
        </div>
        <div class="card-body">
          <canvas id="polar-chart" width="800" height="450"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("polar-chart").getContext('2d');
  var polarChart = new Chart(ctx, {
      type: 'polarArea',
      data: {
          labels: {!! json_encode($users) !!},
          datasets: [{
              label: 'User Levels',
              data: {!! json_encode($levels) !!},
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)',
                  'rgba(255, 159, 64, 0.5)'
              ]
          }]
      },
      options: {
          responsive: true,
          legend: {
              position: 'bottom',
          },
      }
  });
</script>

