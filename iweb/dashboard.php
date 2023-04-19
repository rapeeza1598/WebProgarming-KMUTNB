<?php
        include 'data.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <style>

canvas{
    width : 200px;
    height: 200px;
}
</style>

        <div>
            <canvas id="myChart" ></canvas>
        </div>

        <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

        <script>

        const testdataname = <?php echo json_encode($dataname); ?>;
        const testdatavalue = <?php echo json_encode($datavalue); ?>;
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: testdataname,
            datasets: [{
                label: testdataname,
                data: testdatavalue,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });
        </script>
    </body>
    </html>
