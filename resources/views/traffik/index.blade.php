@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="row">
        <div class="col-sm-4">
        <section role="main" class="container content">
          <div class="row">
              <div class="col-md-12 mt-5">
                  <div class="card mt-5">
                  <div id="graph"></div>
                  </div>
                  <div class="table-responsive">
                  <table class="table table-bordered">
                  <tr>
                      <th>Interace</th>
                      <th>TX</th>
                      <th>RX</th>
                  </tr>
                  <tr>
                      <td><input name="interface" id="interface" type="text" value="ether2" /></td>
                      <td><div id="tabletx"></div></td>
                      <td><div id="tablerx"></div></td>
                  </tr>
                  </table>
                  </div>
                  
              </div>
          </div>	
          </section><!-- /.container -->
        </div>
        
        <div class="col-sm-4">
          <section role="main" class="container content">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card mt-5">
                    <div id="graph2"></div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                    <tr>
                        <th>Interace</th>
                        <th>TX</th>
                        <th>RX</th>
                    </tr>
                    <tr>
                        <td><input name="interface" id="interface2" type="text" value="ether2" /></td>
                        <td><div id="tabletx2"></div></td>
                        <td><div id="tablerx2"></div></td>
                    </tr>
                    </table>
                    </div>
                    
                </div>
            </div>	
            </section><!-- /.container -->
          </div>



          <div class="col-sm-4">
            <section role="main" class="container content">
              <div class="row">
                  <div class="col-md-12 mt-5">
                      <div class="card mt-5">
                      <div id="graph3"></div>
                      </div>
                      <div class="table-responsive">
                      <table class="table table-bordered">
                      <tr>
                          <th>Interace</th>
                          <th>TX</th>
                          <th>RX</th>
                      </tr>
                      <tr>
                          <td><input name="interface" id="interface3" type="text" value="ether2" /></td>
                          <td><div id="tabletx3"></div></td>
                          <td><div id="tablerx3"></div></td>
                      </tr>
                      </table>
                      </div>
                      
                  </div>
              </div>	
              </section><!-- /.container -->
            </div>
    </div>

</div>

@endsection

@push('js-page')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
	var chart;
    var chart2;
    var chart3;
	
	function requestDatta(interface) {
		$.ajax({
			url: 'data?interface='+interface,
			datatype: "json",
			success: function(data) {
				 var midata = JSON.parse(data);
				console.log(midata);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
					var x = (new Date()).getTime(); 
					shift=chart.series[0].data.length > 19;
					chart.series[0].addPoint([x, TX], true, shift);
					chart.series[1].addPoint([x, RX], true, shift);
					document.getElementById("tabletx").innerHTML=convert(TX);
					document.getElementById("tablerx").innerHTML=convert(RX);
				}else{
					document.getElementById("tabletx").innerHTML="0";
					document.getElementById("tablerx").innerHTML="0";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}	

    function requestDatta2(interface) {
		$.ajax({
			url: 'data2?interface='+interface,
			datatype: "json",
			success: function(data) {
				 var midata = JSON.parse(data);
				console.log(midata);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
					var x = new Date();
          x.setDate(x.getDate() + 7);
					shift=chart2.series[0].data.length > 19;
					chart2.series[0].addPoint([x, TX], true, shift);
					chart2.series[1].addPoint([x, RX], true, shift);
					document.getElementById("tabletx2").innerHTML=convert(TX);
					document.getElementById("tablerx2").innerHTML=convert(RX);
				}else{
					document.getElementById("tabletx2").innerHTML="0";
					document.getElementById("tablerx2").innerHTML="0";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}
    
    function requestDatta3(interface) {
		$.ajax({
			url: 'data3?interface='+interface,
			datatype: "json",
			success: function(data) {
				 var midata = JSON.parse(data);
				console.log(midata);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
          var x = new Date();
          x.setDate(x.getDate() + 30);
					shift=chart3.series[0].data.length > 19;
					chart3.series[0].addPoint([x, TX], true, shift);
					chart3.series[1].addPoint([x, RX], true, shift);
					document.getElementById("tabletx3").innerHTML=convert(TX);
					document.getElementById("tablerx3").innerHTML=convert(RX);
				}else{
					document.getElementById("tabletx3").innerHTML="0";
					document.getElementById("tablerx3").innerHTML="0";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}


$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});
	

           chart = new Highcharts.Chart({
			   chart: {
				renderTo: 'graph',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						// setInterval(function () {
							requestDatta(document.getElementById("interface").value);
						// }, 1000);
					}				
			}
		 },
		 title: {
			text: 'Monitoring Daily'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },
		 
		yAxis: {
                            minPadding: 0.2,
                            maxPadding: 0.2,
                            title: {
                              text: 'Traffic'
                            },
                            labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },       
                        },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }],
			  tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y}'
    },


	  });

      //chart2
      chart2 = new Highcharts.Chart({
			   chart: {
				renderTo: 'graph2',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						// setInterval(function () {
							requestDatta2(document.getElementById("interface2").value);
						// }, 1000);
					}				
			}
		 },
		 title: {
			text: 'Monitoring Weekly'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },
		 
		yAxis: {
                            minPadding: 0.2,
                            maxPadding: 0.2,
                            title: {
                              text: 'Traffic'
                            },
                            labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },       
                        },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }],
			  tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y}'
    },


	  });

      //chart3
      chart3 = new Highcharts.Chart({
			   chart: {
				renderTo: 'graph3',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						// setInterval(function () {
							requestDatta3(document.getElementById("interface3").value);
						// }, 1000);
					}				
			}
		 },
		 title: {
			text: 'Monitoring Monthly'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },
		 
		yAxis: {
                            minPadding: 0.2,
                            maxPadding: 0.2,
                            title: {
                              text: 'Traffic'
                            },
                            labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },       
                        },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }],
			  tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y}'
    },


	  });

  });
  function convert( bytes) {      
                                                  
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              }

   
</script>
@endpush