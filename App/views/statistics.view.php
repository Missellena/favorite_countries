<?php require 'App/views/partials/header.php'; ?>
<?php require 'App/views/partials/navigation.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart -->
<div class="row mt-5 mb-4">
    <div class="col-md-10 offset-md-1">  
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
        const data = {
          labels: <?=json_encode($result['country']);?>,
          datasets: [{
            label: 'Most favourite countries',
            data: <?=json_encode($result['count']);?>,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };
        const config = {
          type: 'bar',
          data: data,
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
        };
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
</script>
<?php require 'App/views/partials/footer.php'; ?>