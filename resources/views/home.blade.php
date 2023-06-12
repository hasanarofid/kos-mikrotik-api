@extends('layouts.master')

@section('title', 'Dashboard')
<style>
  #button-container {
  max-width: 800px;
  margin: 1em auto;
}

#pdf {
  border: 1px solid silver;
  border-radius: 3px;
  background: #a4edba;
  padding: 0.5em 1em;
}

#pdf i {
  margin-right: 1em;
}
</style>
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

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    @php
                        // dd($resource);
                    @endphp
                    <h3>{{ 
                      
                      $resource[0]['board-name'] }}<sup style="font-size: 20px"></sup></h3>
    
                    <p>Resource</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                  {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
              </div>
              <!-- ./col -->
                 <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  @php
                      // dd($resource);
                  @endphp
                  <h3>{{ 
                    
                    $resource[0]['cpu-load'] }} % <sup style="font-size: 20px"></sup></h3>
  
                  <p>cpu load</p>
                </div>
                <div class="icon">
                  <i class="ion ion-flash"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    @php
                        // dd($resource);
                    @endphp
                    <h3>{{ 
                      substr($resource[0]['free-memory'], 0, 3)
                      
 }} MB <sup style="font-size: 20px"></sup></h3>
    
                    <p>free memory</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $totalAktif }}</h3>
  
                  <p>User Aktif</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="{{ '/user-aktif' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
              <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $totalUser }}</h3>
  
                  <p>Total User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{ '/user-all' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  @php
                      // dd($resource);
                  @endphp
                  <h3> <a href="{{ '/voucher' }}"> <i class="fa fa-plus"></i> <sup style="font-size: 20px"></sup> </a></h3>
  
                  <p>Tambah User</p>
                </div>
                <div class="icon">
                  <i class="fa fa-plus"></i>
                </div>
                <a href="{{ '/voucher' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
           
            <!-- ./col -->
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
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
                        <td>
                          <select class="form-control" name="interface" id="interface" onclick="refreshGrafik(this)" >
                            @foreach ($interface as $item)
                              <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                            @endforeach
                          </select>

                        </td>
                        <td><div id="tabletx"></div></td>
                        <td><div id="tablerx"></div></td>
                       
                    </tr>
                    </table>
                    </div>
                    
                </div>
            </div>	
            </section><!-- /.container -->
          </div>
          
          
      </div>

   
     <section>

      
  
    
    @endsection
@push('js-page')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
   function formatBytes(a,b){if(0==a)return"0 Bytes";var c=1024,d=b||2,e=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]}

var chart;
function requestDatta(interface) {
  $.ajax({
    url: 'data?interface='+interface,
    datatype: "json",
    success: function(data) {
      var midata = JSON.parse(data);
				console.log(midata);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
          console.log(TX);
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

$(document).ready(function() {
    Highcharts.setOptions({
      global: {
        useUTC: false
      },
        colors: ['#40d30e', '#8085e9', '#8d4654', '#7798BF', '#aaeeee',
            '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
        chart: {
            backgroundColor: null,
        },
        title: {
            style: {
                color: 'black',
                fontSize: '16px',
                fontWeight: 'bold'
            }
        },
        subtitle: {
            style: {
                color: 'black'
            }
        },
        tooltip: {
            borderWidth: 5
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '13px'
            }
        },
        xAxis: {
        gridLineWidth: 1,
            labels: {
                style: {
                    color: '#6e6e70'
                }
            }
        },
        yAxis: {
          gridLineWidth: 1,
            labels: {
                style: {
                    color: '#6e6e70'
                }
            }
        },
        navigator: {
            xAxis: {
                gridLineColor: '#D0D0D8'
            }
        },
        scrollbar: {
            trackBorderColor: '#C0C0C8'
        },
    });


         chart = new Highcharts.Chart({
       chart: {
      plotOptions: {
            line: {
                fillOpacity: 0.5
            }
        },
          type: 'spline',
      renderTo: 'graph',
      animation: Highcharts.svg,
      events: {
        load: function () {
          setInterval(function () {

            requestDatta(document.getElementById("interface").value);
          }, 1000);
        }				
    }
   },
   title: {
    text: 'Grafik Trafik Monitoring'
   },
   xAxis: {
    type: 'datetime',
      tickPixelInterval: 60,
      maxZoom: 10 * 2000
   },
  yAxis: {
    title: {
      text: '',
      margin: 0
    },
    labels: {
            formatter: function () {
              var bytes = this.value;
              var sizes = ['b', 'kb', 'Mb', 'Gb', 'Tb'];
              if (bytes == 0) return '0 bps';
              var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
              return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
            },
          },
  },
  tooltip: {
          formatter: function() {
              var bytes = this.y;                          
              var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
              if (bytes == 0) return '0 bps';
              var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
              return '<b>'+ this.series.name +'</b>'+': '+parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i]+'<br>';
          }
      },
          series: [{
              name: '(TX)',
              data: [],
              dashStyle: 'dash'
          }, {
              name: '(RX)',
              data: [],
              dashStyle: 'dash'
          }]
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