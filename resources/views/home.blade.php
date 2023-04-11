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
                      
                      $resource[0]['cpu'] }}<sup style="font-size: 20px"></sup></h3>
    
                    <p>Resource</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    
                    $resource[0]['cpu-frequency'] }}<sup style="font-size: 20px"></sup></h3>
  
                  <p>cpu frequency</p>
                </div>
                <div class="icon">
                  <i class="ion ion-flash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                      
                      $resource[0]['free-memory'] }}<sup style="font-size: 20px"></sup></h3>
    
                    <p>free memory</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <h3> <a href="{{ '/tambah-user' }}"> <i class="fa fa-plus"></i> <sup style="font-size: 20px"></sup> </a></h3>
  
                  <p>Tambah User</p>
                </div>
                <div class="icon">
                  <i class="fa fa-plus"></i>
                </div>
                <a href="{{ '/tambah-user' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
           
            <!-- ./col -->
          </div>
        </div>
   
     
    </section>
    </div>
    
    @endsection
    
    @push('js-page')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/gantt/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/gantt/modules/accessibility.js"></script>
    
    <script type="text/javascript">
        function refreshGrafik(obj){
          requestDatta($(obj).val());
        }
    
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
                setInterval(function () {
                  requestDatta(document.getElementById("interface").value);
                }, 1000);
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
    
    
      });
      function convert( bytes) {      
                                                      
                                    var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                    if (bytes == 0) return '0 bps';
                                    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                    return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                                  }
    
                                  // Activate the custom button
    document.getElementById('pdf').addEventListener('click', function () {
      Highcharts.charts[0].exportChart({
        type: 'application/pdf'
      });
    });
    
       
    </script>
    @endpush