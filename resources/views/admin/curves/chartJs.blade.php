<!DOCTYPE html>
<html>
<head>
    <title>Curves Visualization</title>
    <style>
        .chart-container {
            width: 400px; /* Adjust the width as per your requirement */
            margin: 20px auto; /* Center the chart within the page */
        }

        .chart-frame {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px; /* Adjust the width as per your requirement */
            height: 400px; /* Adjust the height as per your requirement */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

        .chart-frame.is-open {
            display: block;
        }

        .chart-download {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .chart-tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .chart-container:hover .chart-tooltip {
            opacity: 1;
        }
        .chart-container {
    position: relative;
}

.chart-container {
    position: relative;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
}

.chart-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.5;
    z-index: -1;
}


    </style>
    
</head>
<body>
    <h1>Curves Visualization</h1>

    <div class="chart-container">
        <canvas id="chart"></canvas>
        <div class="chart-tooltip"></div>
    </div>

    <div class="chart-frame" id="chartFrame">
        <canvas id="chartModal"></canvas>
        <div class="chart-download">
            <a href="#" download>
                <img src="download-icon.png" alt="Download Icon" width="20" height="20">
            </a>
        </div>
    </div>
    </div>

    <div class="chart-container">
    <canvas id="visitorChart"></canvas>
    <div class="chart-tooltip"></div>

    <div class="chart-frame" id="chartFrame">
    <canvas id="chartModal"></canvas>
    <div class="chart-download">
        <a href="#" download>
            <img src="download-icon.png" alt="Download Icon" width="20" height="20">
        </a>
    </div>
</div>
<br><br>

    @include('admin.curves.usersBylevel')
    @include('admin.curves.visitorData')




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var chartData = {!! json_encode($chartData) !!};

        // Create the main chart
        var ctx = document.getElementById('chart').getContext('2d');
        var mainChart = new Chart(ctx, {
            type: 'bar', // Change the chart type to 'bar'
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false, // Adjusts the chart width as per container width
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Inscriptions'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Inscription Date'
                        }
                    }
                },
                onClick: function(event, elements) {
                    if (elements.length > 0) {
                        var datasetIndex = elements[0].datasetIndex;
                        var dataIndex = elements[0].index;
                        var dataset = mainChart.data.datasets[datasetIndex];
                        var label = dataset.label;
                        var data = dataset.data[dataIndex];
                        var backgroundColor = dataset.backgroundColor;

                        // Open the chart frame
                        var chartFrame = document.getElementById('chartFrame');
                        chartFrame.classList.add('is-open');

                        // Create the chart inside the frame
                        var ctxModal = document.getElementById('chartModal').getContext('2d');
                        new Chart(ctxModal, {
                            type: 'bar', // Change the chart type to 'bar'
                            data: {
                                labels: chartData.labels.map(function(date) {
                                    var monthNumber = new Date(date).getMonth() + 1;
                                    return new Date(date).toLocaleString('default', { month: 'long' });
                                }),
                                datasets: [
                                    {
                                        label: label,
                                        data: data,
                                        backgroundColor: backgroundColor
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false, // Adjusts the chart width as per container width
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Number of Inscriptions'
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            }
        });
    });
</script>
<script>
    // Get the chart data for visitors
    var visitorData = @json($chartData);

    // Create the visitors chart
    var visitorChart = new Chart(document.getElementById('visitorChart'), {
        type: 'line',
        data: {
            labels: visitorData.labels,
            datasets: [
                {
                    label: visitorData.datasets[0].label,
                    data: visitorData.datasets[0].data,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Visitors'
                    }
                }
            }
        }
    });
</script>

<script>
    function displayChart() {
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
    }

    // Call the function to display the chart
    displayChart();
</script>

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







