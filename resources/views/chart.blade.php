<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">



        <title>My Charts</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
            type: 'pie',
             data: {
            labels: ["Blue", "Red", "Yellow", "Green"],
            datasets: [{
            data: [12.21, 15.58, 11.25, 8.32],
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
         },
        });

        </script>
       


    </head>

    <body>

        <!-- Main Application (Can be VueJS or other JS framework) -->

        <div class="app">

            <center>

                <canvas id="myPieChart" height = 250px></canvas>

            </center>

        </div>
        

    </body>

</html>