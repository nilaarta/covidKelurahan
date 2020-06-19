@extends('layout.master')

@section('title','Dashboard')
@section('content')
<div class="card card-widget widget-user-2"> 
    <div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="row">
						<div class="col-md-4">
							<div class="widget">
								<header class="widget-header">
									<h4 class="widget-title">Total Positif</h4>
								</header><!-- .widget-header -->
								<hr class="widget-separator">
								<div class="widget-body">
									<div class="clearfix">
										<div class="pull-left">
											<div class="pieprogress text-warning" data-plugin="circleProgress" data-value=".999" data-thickness="3" data-start-angle="180" data-empty-fill="rgba(249, 200, 81, .3)" data-fill="{&quot;color&quot;: &quot;#f9c851&quot;}">
				
												<strong>{{$totalPositif[0]->total}}</strong>
											</div>
										</div>
									</div>
								</div><!-- .widget-body -->
							</div><!-- .widget -->
						</div><!-- END column -->
			
						<div class="col-md-4">
							<div class="widget">
								<header class="widget-header">
									<h4 class="widget-title">Total Sembuh</h4>
								</header><!-- .widget-header -->
								<hr class="widget-separator">
								<div class="widget-body">
									<div class="clearfix">
										<div class="pull-left">
											<div class="pieprogress text-success" data-plugin="circleProgress" data-value=".999" data-thickness="3" data-start-angle="0" data-empty-fill="rgba(16, 196, 105,.3)" data-fill="{&quot;color&quot;: &quot;#10c469&quot;}">
				
												<strong>{{$totalSembuh[0]->sembuh}}</strong>
											</div>
										</div>
									</div>
								</div><!-- .widget-body -->
							</div><!-- .widget -->
						</div><!-- END column -->
				
						<div class="col-md-4">
							<div class="widget">
								<header class="widget-header">
									<h4 class="widget-title">Total Meninggal</h4>
								</header><!-- .widget-header -->
								<hr class="widget-separator">
								<div class="widget-body">
									<div class="clearfix">
										<div class="pull-left">
											<div class="pieprogress text-danger" data-plugin="circleProgress" data-value=".999" data-thickness="3" data-start-angle="2" data-empty-fill="rgba(255, 91, 91, .3)" data-fill="{&quot;color&quot;: &quot;#ff5b5b&quot;}">
												<strong>{{$totalMeninggal[0]->meninggal}}</strong>
											</div>
										</div>
									</div>
								</div><!-- .widget-body -->
							</div><!-- .widget -->
						</div><!-- END column -->	
          </div>
          
          <div class="row">
            <div class col-md-12>
						<div class="form-group" style="position: relative;">
              <label for="datetimepicker5">.          Tanggal Data Yang Ditampilkan</label>
              <form action="/search" method="POST">
                @csrf
                <div class="col-md-4">
                  <input id="tanggalSearch" type="date" @if(isset($tanggal)) value="{{$tanggal}}" @endif name="tanggal"
                  class="form-control" required> 
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-outline col-md-12 btn-info">Cari</button>
                </div>             
              </form>
            </div><!-- .form-group -->
          </div>
          </div>
          <br>
          <br>
          
					
          
          <!-- <div class="row">
            <div class="col-sm-2">
              <p>Color Start:</p>
              <input type="color" value="#E8DEDB" class="form-control" id="colorStart">
            </div>
            <div class="col-sm-2">
              <p>Color End:</p>
              <input type="color" value="#E5310A" class="form-control" id="colorEnd">
            </div>
          
            <div class="col-sm-2">
            <p>  '</p>
              <button type="submit" class="btn btn-outline btn-warning" id="btnGenerateColor"><i class="fa fa-gear"></i></button>
            </div>
          </div> -->
    
					<div class="col-md-12">
						<div class="widget">
							<header class="widget-header">
								<h4 class="widget-title">Persebaran {{$tanggalSekarang}}</h4>
							</header><!-- .widget-header -->
							<hr class="widget-separator">
							<div class="widget-body">
								<div id="mapid" style="width: 100%;height: 400px;"></div>
							</div><!-- .widget-body -->
						</div><!-- .widget -->
					</div><!-- END column -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Tabel Persebaran</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>             
                    <th>Kabupaten</th>
                    <th>Positif</th>
                    <th>Meninggal</th>
                    <th>Sembuh</th>
                    <th>Dirawat</th>
                    {{-- <th>Tanggal</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td>{{ucfirst($item->kabupaten)}}</td>
                    <td>{{$item->total}}</td>
                    <td>{{$item->meninggal}}</td>
                    <td>{{$item->sembuh}}</td>
                    <td>{{$item->perawatan}}</td>
                    {{-- <td>{{$item->tanggal}}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
							</table>
						</div>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
@endsection

@section("js")
<script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
<script src="https://pendataan.baliprov.go.id/assets/frontend/map/leaflet.markercluster-src.js"></script>
<script src="http://leaflet.github.io/Leaflet.label/leaflet.label.js" charset="utf-8"></script>
<script>
  $(document).ready(function () {
    var dataMap=null;
    var dataColor=null;
    var colorMap=[
      "edff6b",
      "dcec5d",
      "ccd950",
      "bcc743",
      "acb436",
      "9ba128",
      "8b8f1b",
      "7b7c0e",
      "6b6a01"
    ];
    var tanggal = $('#tanggalSearch').val();
    $.ajax({
      async:false,
      url:'getDataMap',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response["dataMap"];
        dataColor = response["dataColor"];
      }
    });
    console.log(dataMap);
    var map = L.map('mapid',{
      fullscreenControl:true,
    });
    
    $('#btnGenerateColor').on('click',function(e){
      var colorStart = $('#colorStart').val();
      var colorEnd = $('#colorEnd').val();
      $.ajax({
        async:false,
        url:'/create-pallete',
        type:'get',
        dataType:'json',
        data:{start: colorStart, end:colorEnd},
        success: function(response){
          colorMap = response;
          setMapAttr();
        }
      });
      
    });
    
    
    map.setView(new L.LatLng(-8.500410, 115.195839),10);
    var OpenTopoMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            // zoomAnimation:true,
            id: 'mapbox/streets-v11',
            // tileSize: 512,
            // zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoid2lkaWFuYXB3IiwiYSI6ImNrNm95c2pydjFnbWczbHBibGNtMDNoZzMifQ.kHoE5-gMwNgEDCrJQ3fqkQ',
        }).addTo(map);
    OpenTopoMap.addTo(map);
    var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    setMapAttr();
    // var m = L.marker([-8.500410, 115.195839]).bindLabel('A sweet static label!', { noHide: true })
		// 	.addTo(map)
		// 	.showLabel();

    function setMapAttr(){
      var markerIcon = L.icon({
        iconUrl: '/img/marker.png',
        iconSize: [40, 40],
      });
      
      var kmzParser = new L.KMZParser({
          
          onKMZLoaded: function (kmz_layer, name) {
            
              control.addOverlay(kmz_layer, name);
              var markers = L.markerClusterGroup();
              var layers = kmz_layer.getLayers()[0].getLayers();
              console.log(layers[0]);
              layers.forEach(function(layer, index){
                var kab  = layer.feature.properties.NAME_2;
                var kec =  layer.feature.properties.NAME_3;
                var kel = layer.feature.properties.NAME_4;
                var data;
              
                var STYLE = {opacity:'1',color:'#000',fillOpacity:'1'};
                var HIJAU_MUDA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#81F781'};
                var HIJAU_TUA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#088A08'};
                var KUNING = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#FFFF00'};
                var MERAH_MUDA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#F78181'};
                var MERAH_TUA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#B40404'};
                if(!Array.isArray(dataMap) || !dataMap.length == 0){
                // set sub layer default style positif covid
                  // var STYLE = {opacity:'1',color:'#000',fillOpacity:'1',fillColor:'#'+colorMap[index]}; 
                  // layer.setStyle(STYLE);
                    var searchResult = dataMap.filter(function(it){
                      return it.kecamatan.replace(/\s/g,'').toLowerCase() === kec.replace(/\s/g,'').toLowerCase() &&
                              it.kelurahan.replace(/\s/g,'').toLowerCase() === kel.replace(/\s/g,'').toLowerCase();
                    });
                    if(!Array.isArray(searchResult) || !searchResult.length ==0){
                      var item = searchResult[0];
                      if(item.total == 0 ){
                        layer.setStyle(HIJAU_MUDA);  
                      }else if(item.perawatan == 0 && item.total>0 && item.sembuh >= 0 && item.meninggal >=0){
                        layer.setStyle(HIJAU_TUA);
                      }else if(item.ppln ==1 && item.perawatan == 1 && item.total == 1 && item.tl==0 || item.ppdn ==1 && item.perawatan == 1 && item.total == 1 && item.tl==0){
                        layer.setStyle(KUNING);
                      }else if((item.ppln >1 && item.perawatan <= item.ppln && item.sembuh <= item.ppln && item.tl == 0) || (item.ppdn >1 && item.perawatan <= item.ppdn && item.sembuh <= item.ppdn && item.tl == 0)  ){
                        layer.setStyle(MERAH_MUDA);
                      }else{
                        layer.setStyle(MERAH_TUA);
                      }
                      data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr >';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>PP-LN</td>';
                      data +='    <td>: '+item.ppln+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>PP-DN</td>';
                      data +='    <td>: '+item.ppdn+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>TL</td>';
                      data +='    <td>: '+item.tl+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Lainnya</td>';
                      data +='    <td>: '+item.lainnya+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:green">';
                      data +='    <td>Sembuh</td>';
                      data +='    <td>: '+item.sembuh+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:blue">';
                      data +='    <td>Dalam Perawatan</td>';
                      data +='    <td>: '+item.perawatan+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:red">';
                      data +='    <td>Meninggal</td>';
                      data +='    <td>: '+item.meninggal+'</td>';
                      data +='  </tr>';
                    }else{
                      console.log(kel.replace(/\s/g,'').toLowerCase());
                      console.log(kec.replace(/\s/g,'').toLowerCase());
                      data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr style="color:red">';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:red">';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';
                    }
                    

                    
                    // data +='  <tr style="color:green">';
                    // data +='    <td>Sembuh</td>';
                    // data +='    <td>: '+dataMap[index].sembuh+'</td>';
                    // data +='  </tr>'; 

                    // data +='  <tr style="color:black">';
                    // data +='    <td>Meninggal</td>';
                    // data +='    <td>: '+dataMap[index].meninggal+'</td>';
                    // data +='  </tr>';

                    // data +='  <tr style="color:blue">';
                    // data +='    <td>Dalam Perawatan</td>';
                    // data +='    <td>: '+dataMap[index].dirawat+'</td>';
                    // data +='  </tr>';               
                                  
                    // data +='</table>';
                    // if(kab == 'BANGLI'){
                    //   markers.addLayer( 
                    //     L.marker([-8.254251, 115.366936] ,{
                    //       icon: markerIcon
                    //     }).bindPopup(data).addTo(map)
                    //   );
                    // }
                    // else if(kab == 'GIANYAR'){
                    //   markers.addLayer( 
                    //     L.marker([-8.422739, 115.255700] ,{
                    //       icon: markerIcon
                    //     }).bindPopup(data).addTo(map)
                    //   );

                    // }else if(kab == 'KLUNGKUNG'){
                    //   markers.addLayer( 
                    //     L.marker([-8.487338, 115.380029] ,{
                    //       icon: markerIcon
                    //     }).bindPopup(data).addTo(map)
                    //   );

                    
                      
                    
                }else{
                  // var data = "Tidak ada Data pada tanggal tersebut"
                  layer.setStyle(defStyle);
                  data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr>';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';  
                }
                layer.bindPopup(data);
                // markers.addLayer(L.marker(getRandomLatLng(map)));
                markers.addLayer( 
                  L.marker(layer.getBounds().getCenter(),{
                    icon: markerIcon
                  }).bindPopup(data)
                );
              });
              map.addLayer(markers);
              kmz_layer.addTo(map);
          }
      });
      kmzParser.load('bali-kelurahan.kmz');
      var control = L.control.layers(null, null, {
          collapsed: true
      }).addTo(map);
      $('.leaflet-control-layers').hide();

    }
  });
</script>
@endsection

