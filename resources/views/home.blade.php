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
                            <th>Download</th>
                        </tr>
                        <tr>
                            <td>
                              <select name="interface" id="interface" onclick="refreshGrafik(this)" >
                                <option value="ether1" >ether1</option>
                                <option value="ether2" >ether2</option>
                                <option value="ether3" selected>ether3</option>
                                <option value="ether4" >ether4</option>
                                <option value="ether5" >ether5</option>
                                <option value="ether6" >ether6</option>
                                <option value="ether7" >ether7</option>
                                <option value="ether8" >ether8</option>
                                <option value="ether9" >ether9</option>
                                <option value="ether10" >ether10</option>
                                <option value="ether11" >ether11</option>
                                <option value="ether12" >ether12</option>
                                <option value="ether13-Jakarta" >ether13-Jakarta</option>
                                <option value="vlan10" >vlan10</option>
                                <option value="vlan20" >vlan20</option>
                                <option value="vlan30" >vlan30</option>
                                <option value="Loopback" >Loopback</option>
                                <option value="<pppoe-isp-ngsm-32>" > pppoe-isp-ngsm-32 </option>
                                <option value="<pppoe-isp-ngsm-84>" > pppoe-isp-ngsm-84 </option>
                                <option value="<pppoe-isp-ngsm-34>" > pppoe-isp-ngsm-34 </option>
                                <option value="<pppoe-isp-ngsm-86>" > pppoe-isp-ngsm-86 </option>
                                <option value="<pppoe-isp-ngsm-89>" > pppoe-isp-ngsm-89 </option>
                                <option value="<pppoe-isp-ngsm-81>" > pppoe-isp-ngsm-81 </option>
                                <option value="<pppoe-isp-ngsm-76>" > pppoe-isp-ngsm-76 </option>
                                <option value="<pppoe-isp-ngsm-30>" > pppoe-isp-n" >gsm-30 </option>
                                <option value="<pppoe-isp-ngsm-35>" > pppoe-isp-ngsm-35 </option>
                                <option value="<pppoe-isp-ngsm-61>" > pppoe-isp-ngsm-61 </option>
                                <option value="<pppoe-isp-ngsm-82>" >pppoe-isp-ngsm-82 </option>
                                <option value="<pppoe-isp-ngsm-77>" >pppoe-isp-ngsm-77 </option>
                                <option value="<pppoe-isp-ngsm-59>" >pppoe-isp-ngsm-59   </option>
                                <option value="<pppoe-isp-ngsm-85>" >pppoe-isp-ngsm-85</option>
                                <option value="<pppoe-isp-ngsm-38>" >pppoe-isp-ngsm-38</option>
                                <option value="<pppoe-isp-ngsm-46>" >pppoe-isp-ngsm-46</option>
                                <option value="<pppoe-isp-ngsm-47>" >pppoe-isp-ngsm-47</option>
                                <option value="<pppoe-isp-ngsm-07>" >pppoe-isp-ngsm-07</option>
                                <option value="<pppoe-isp-ngsm-64>" >pppoe-isp-ngsm-64</option>
                                <option value="<pppoe-isp-ngsm-05>" >pppoe-isp-ngsm-05</option>
                                <option value="<pppoe-isp-ngsm-80>" >pppoe-isp-ngsm-80</option>
                                <option value="<pppoe-isp-ngsm-50>" >pppoe-isp-ngsm-50</option>
                                <option value="<pppoe-isp-ngsm-75>" >pppoe-isp-ngsm-75</option>
                                <option value="<pppoe-isp-ngsm-53>" >pppoe-isp-ngsm-53</option>
                                <option value="<pppoe-isp-ngsm-55>" >pppoe-isp-ngsm-55</option>
                                <option value="<pppoe-isp-ngsm-54>" >pppoe-isp-ngsm-54</option>
                                <option value="<pppoe-isp-ngsm-52>" >pppoe-isp-ngsm-52</option>
                                <option value="<pppoe-isp-ngsm-78>" >pppoe-isp-ngsm-78</option>
                                <option value="<pppoe-isp-ngsm-67>" >pppoe-isp-ngsm-67</option>
                                <option value="<pppoe-isp-ngsm-49>" >pppoe-isp-ngsm-49</option>
                                <option value="<pppoe-isp-ngsm-56>" >pppoe-isp-ngsm-56</option>
                                <option value="<pppoe-isp-ngsm-31>" >pppoe-isp-ngsm-31</option>
                                <option value="<pppoe-isp-ngsm-37>" >pppoe-isp-ngsm-37</option>
                                <option value="<pppoe-isp-ngsm-62>" >pppoe-isp-ngsm-62</option>
                                <option value="<pppoe-isp-ngsm-73>" >pppoe-isp-ngsm-73</option>
                                <option value="<pppoe-isp-ngsm-58>" >pppoe-isp-ngsm-58</option>
                                <option value="<pppoe-isp-ngsm-65>" >pppoe-isp-ngsm-65</option>
                                <option value="<pppoe-isp-ngsm-71>" >pppoe-isp-ngsm-71</option>
                                <option value="<pppoe-isp-ngsm-51>" >pppoe-isp-ngsm-51</option>
                                <option value="<pppoe-isp-ngsm-48>" >pppoe-isp-ngsm-48</option>
                                <option value="<pppoe-isp-ngsm-90>" >pppoe-isp-ngsm-90</option>
                                <option value="<pppoe-isp-ngsm-88>" >pppoe-isp-ngsm-88</option>
                                <option value="<pppoe-isp-ngsm-91>" >pppoe-isp-ngsm-91</option>
                                <option value="<pppoe-isp-ngsm-69>" >pppoe-isp-ngsm-69</option>
                                <option value="<pppoe-isp-ngsm-08>" >pppoe-isp-ngsm-08</option>
                                <option value="<pppoe-isp-ngsm-33>" >pppoe-isp-ngsm-33</option>
                                <option value="<pppoe-isp-ngsm-79>" >pppoe-isp-ngsm-79</option>
                                <option value="<pppoe-isp-ngsm-70>" >pppoe-isp-ngsm-70</option>
                                <option value="<pppoe-isp-ngsm-74>" >pppoe-isp-ngsm-74</option>
                                <option value="<pppoe-isp-ngsm-03>" >pppoe-isp-ngsm-03</option>
                                <option value="<pppoe-isp-ngsm-24>" >pppoe-isp-ngsm-24</option>
                                <option value="<pppoe-isp-ngsm-23>" >pppoe-isp-ngsm-23</option>
                                <option value="<pppoe-isp-ngsm-21>" >pppoe-isp-ngsm-21</option>
                                <option value="<pppoe-isp-ngsm-29>" >pppoe-isp-ngsm-29</option>
                                <option value="<pppoe-isp-ngsm-20>" >pppoe-isp-ngsm-20</option>
                                <option value="<pppoe-isp-ngsm-36>" >pppoe-isp-ngsm-36</option>
                                <option value="<pppoe-isp-ngsm-57>" >pppoe-isp-ngsm-57</option>
                                <option value="<pppoe-isp-ngsm-87>" >pppoe-isp-ngsm-87</option>
                                <option value="<pppoe-isp-ngsm-72>" >pppoe-isp-ngsm-72</option>
                                <option value="<pppoe-isp-ngsm-13>" >pppoe-isp-ngsm-13</option>
                                <option value="<pppoe-isp-ngsm-22>" >pppoe-isp-ngsm-22</option>
                                <option value="<pppoe-isp-ngsm-04>" >pppoe-isp-ngsm-04</option>
                                 
              
              
                              </select>
              
                              {{-- <input name="interface" id="interface" type="text" value="ether2" /> --}}
                            </td>
                            <td><div id="tabletx"></div></td>
                            <td><div id="tablerx"></div></td>
                            <td>
                              <div id="button-container">
                                <button id="pdf">
                                  <i class="fa fa-download"></i> Download PDF
                                </button>
                              </div>
                            </td>
                        </tr>
                        </table>
                    </div>
                    
                </div>
            </div>	
            </section><!-- /.container -->
          </div>
          
          
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