<?php
  $con = mysqli_connect("localhost","root","","integrationfinale");
  if($con){
    echo "connected";
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['libelle', 'nb_calories'],
         <?php
         $sql = "SELECT * FROM produit";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['libelle']."',".$result['nb_calories']."],";
          }

         ?>
        ]);

        var options = {
          title: 'libelle and their nb_calories'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 300px; height: 300px;"></div>
  </body>
</html>