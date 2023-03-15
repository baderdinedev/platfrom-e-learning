<section class="table_area">
    <!-- chart area -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel chart_area">
                <div class="panel_header">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="far fa-chart-bar"></i></span>
                        <span>bar chat</span>
                    </div>
                    <div class="panel_body">
                        
                    </div>
            </div> 
        </div>
    </div>
</section> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var data = @json($json_data);

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: 'Nombre d\'utilisateurs inscrits par jour',
                data: Object.values(data),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>