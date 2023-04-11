<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.stock.min.js"></script>
<script type="text/javascript">
$(function () {
  var dataPoints = [];
  
  var stockChartOptions = {
    title:{
      text:"StockChart with Spline Area Chart"
    },
    subtitles: [{
      text: "Litecoin Price (in Eur)"
    }],
    theme: "dark2",
    exportEnabled: true,
    charts: [{
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "DD MMM YYYY",
        }
      },
      axisY: {
        title: "Litecoin Price",
        prefix: "€",
        crosshair: {
          enabled: true,
          valueFormatString: "€#,###",
        }
      },
      toolTip: {
        shared: true
      },
      data: [{
        type: "splineArea",
        yValueFormatString: "€#,###.##",
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      axisX: {
        labelFontColor: "#F5F5F5",
        labelFontFamily: "Trebuchet MS"
      },
      slider: {
        minimum: new Date(2018, 01, 01),
        maximum: new Date(2018, 11, 01)
      }
    }
  }
  $.getJSON("https://canvasjs.com/data/docs/ltceur2018.json", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints.push({x: new Date(data[i].date), y: Number(data[i].close)});
    }
    $("#chartContainer").CanvasJSStockChart(stockChartOptions);
  });
});
</script>
</head>
<body>
<div id="chartContainer" style="height: 450px; width: 100%;"></div>
</body>
</html>