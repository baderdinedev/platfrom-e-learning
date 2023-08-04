<!DOCTYPE html>
<html>
<head>
    <title>User Levels Chart</title>
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            width: 600px;
        }

        .chart-tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="getUserByLevel"></canvas>
        <div class="chart-tooltip"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var chartData = @json($chartData);

        var chartConfig = {
            type: 'doughnut',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets
            },
            options: {
                tooltips: {
                    enabled: false,
                    custom: function (tooltipModel) {
                        var tooltipElement = document.querySelector('.chart-tooltip');
                        if (tooltipModel.opacity === 0) {
                            tooltipElement.style.opacity = 0;
                            return;
                        }
                        tooltipElement.style.opacity = 1;
                        tooltipElement.innerHTML = tooltipModel.body[0].lines[0];
                    }
                }
                // Additional chart configuration options can be added here
            }
        };

        var ctx = document.getElementById('getUserByLevel').getContext('2d');
        new Chart(ctx, chartConfig);
    </script>
</body>
</html>
