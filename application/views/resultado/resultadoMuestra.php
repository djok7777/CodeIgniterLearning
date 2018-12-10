<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<h3>Resultado último análisis realizado</h3>
<canvas id="myChart" width="150" height="50"></canvas>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Toxinas por hongos", "Metales pesados", "Plaguicidas prohibidos", "Marea roja", "Bacterias nocivas"],
        datasets: [{
            label: '',
            data: [<?=$grafico1?>, <?=$grafico2?>, <?=$grafico3?>, <?=$grafico4?>, <?=$grafico5?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1.5)',
                'rgba(54, 162, 235, 1.5)',
                'rgba(255, 206, 86, 1.5)',
                'rgba(75, 192, 192, 1.5)',
                'rgba(153, 102, 255, 1.5)',
                'rgba(255, 159, 64, 1.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 5
        }]
    
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>