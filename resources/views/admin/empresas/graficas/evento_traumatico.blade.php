<div class="col-12 col-md-4 mt-4">
    <canvas id="eventoTraumatico" width="400" height="400"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>

    var estudios = document.getElementById('eventoTraumatico').getContext('2d');
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: [
                'SI',
                'NO',
            ],
            datasets: [{
                label: 'Resultados de <?php echo count($etsTotalNo + $etsTotalSi); ?> registros de usuarios',
                data: [
                    <?php
                        echo $etsTotalSi.",";
                        echo $etsTotalNo.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(0, 255, 255, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(0, 255, 255, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: 'Eventos Traumáticos Severos',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>
