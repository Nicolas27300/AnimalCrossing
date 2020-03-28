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
<form action="" method="POST">
<div class="form-group">
<label for="pseudo">Pseudo : </label>
<select class="form-control" id="pseudo">
      <option>Nicoulou</option>
      <option>Mickle</option>
      <option>Pimrov</option>
      <option>Roidafou</option>
      <option>Sarah</option>
    </select>
</div>
<div class="form-group">
    <label for="price">Prix : </label>
    <input type="text" class="form-control" id="price" placeholder="Prix du navet">
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

subtitle: {
  text: 'Source: thesolarfoundation.com'
},

yAxis: {
  title: {
    text: 'Number of Employees'
  }
},

xAxis: {
  accessibility: {
    rangeDescription: 'Range: 2010 to 2017'
  }
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

plotOptions: {
  series: {
    label: {
      connectorAllowed: false
    },
    pointStart: 2010
  }
},

series: [{
  name: 'Installation',
  data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
  name: 'Manufacturing',
  data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
  name: 'Sales & Distribution',
  data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
  name: 'Project Development',
  data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
  name: 'Other',
  data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

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
