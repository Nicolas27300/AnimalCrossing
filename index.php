<!DOCTYPE html>
<html>
<header>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</header>
<body>
<div class="section">
<div class="row">
<div class="col-md-5"></div>
<div class="col-md-2">
<center>
<form action="add.php" method="POST">
<div class="form-group">
<label for="pseudo">Pseudo : </label>
<select class="form-control" id="pseudo" name="pseudo">
      <option>Nicoulou</option>
      <option>Mickle</option>
      <option>Pimrov</option>
      <option>Roidafou</option>
      <option>SarouChan</option>
      <option>Zedsters</option>
</select>
</div>
<div class="form-group">
    <label for="price">Prix : </label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Prix du navet" required>
  </div>
  <div class="form-group">
  <label for="morning">Quand ? </label>
<select class="form-control" id="morning" name="morning">
      <option>Matin</option>
      <option>Après-midi</option>
    </select>
</div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</center>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
</div>
</div>
</div>


<script type="text/javascript">
Highcharts.chart('container', {

title: {
  text: 'Cours du navet par joueur'
},

plotOptions: {
    series: {
        connectNulls : true,
    },
},

yAxis: {
  title: {
    text: 'Prix du navet'
  }
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

series: [
    <?php
    include 'class/Navet.php';
    $navet = new Navet();
    $pseudos = ['Nicoulou', 'Roidafou', 'Pimrov', 'Mickle', 'SarouChan', 'Zedsters'];
    foreach ($pseudos as $pseudo){
        $prices = $navet->generateGraph($pseudo);
        echo "{
            name: '$pseudo',
            data: $prices
          },";
    }
    ?>
 ],

xAxis: {
    <?php
    $navet = new Navet();
    $categories = $navet->generateXAyis();
    echo "categories: $categories";
    ?>
},

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
</script>


</body>
</html>
