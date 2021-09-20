@extends('layout.layadm')

@section('menu')
	<ul id="accordion-menu">
		<li>
			<a href="/admin" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
			</a>
		</li>
		<li>
			<div class="dropdown-divider"></div>
		</li>
		<li>
			<div class="sidebar-small-cap">Data</div>
		</li>
		<li>
			<a href="/datakecamatan" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-map"></span><span class="mtext">Data Kecamatan</span>
			</a>
		</li>
		<li>
			<a href="/datapuskesmas" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-hospital"></span><span class="mtext">Data Puskesmas</span>
			</a>
		</li>
		<li>
			<a href="/datapengguna" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-user1"></span><span class="mtext">Data Pengguna</span>
			</a>
		</li>
		<li>
			<div class="dropdown-divider"></div>
		</li>
		<li>
			<div class="sidebar-small-cap">Data Hasil Timbang</div>
		</li>
		<li>
			<a href="/datasuwkec" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-map"></span><span class="mtext">per Kecamatan</span>
			</a>
		</li>
		<li>
			<a href="/datasuwpus" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-hospital"></span><span class="mtext">per Puskesmas</span>
			</a>
		</li>
	</ul>
@endsection


@section('content')



@foreach($data as $upd)
	<div class="main-container">

		<div class="pd-ltr-20">
			<div class="card-box col-md-12">
				<div class="pd-20">
					<h4 class="text-black h4" style="margin-left:-20px;">Edit Data Puskesmas</h4>
				</div>
				<form action="/puskesmas:upd={{$upd->PUSK_ID}}" method="post" enctype="multipart/form-data">
	                {{csrf_field()}}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
			                    <label for="first-name-vertical">Nama Kecamatan</label>
			                    <select class="js-example-basic-single" name="kec" required="" style="width: 100%; height: 50px;">
			                    	@foreach($kec as $kc)
			                          <?php if ($kc->KEC_ID == $upd->KEC_ID){ ?>
			                               <option value="{{$kc->KEC_ID}}" selected="">{{$kc->KEC}}</option>
			                            <?php }else{ ?>
			                              <option value="{{$kc->KEC_ID}}">{{$kc->KEC}}</option>
			                            <?php }?>
			                         @endforeach
			                    </select>
			                </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
			                    <label>Nama Puskesmas</label>
			                    <input type="text" name="nama" class="form-control" value="{{$upd->PUSKESMAS}}" autocomplete="off" required="">
			                </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
			                    <label>Longitude</label>
			                    <input type="text" name="long" class="form-control" id="lng" value="{{$upd->LONGITUDE}}" autocomplete="off" required="">
			                </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
			                    <label>Latitude</label>
			                    <input type="text" name="lati" class="form-control" id="lat" value="{{$upd->LATITUDE}}" autocomplete="off" required="">
			                </div>
						</div>
						<div class="col-md-12">
							<button type="button" class="btn btn-info btn-block" onclick="myFunction()"><i class="fa fa-map-pin"></i> Map</button>
							<br>
							<div id="googleMap" style="width:100%;height:530px;"></div>
						</div>
						<div class="col-md-6" style="margin-top:10px;"> 
							<a href="/datapuskesmas" class="btn btn-danger btn-block"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
						</div>
						<div class="col-md-6" style="margin-top:10px;"> 
							<button class="btn btn-info btn-block" ><i class="fa fa-edit"></i> Ubah</button>
						</div>
					</div>
				</form>
                <br>
			</div>
		</div>
	</div>
@endforeach

	

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD9qrkGVP3Udc6Jd9KteihJQ-bnr1nd2M4" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

	<script>
		
		function myFunction() {
		  var x = document.getElementById("googleMap");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}

	    var marker; 
	    function taruhMarker(peta, posisiTitik){
	    if( marker ){
	      // pindahkan marker
	      marker.setPosition(posisiTitik);
	    } else {
	      // buat marker baru
	      marker = new google.maps.Marker({
	        position: posisiTitik,
	        map: peta
	      });
	    }
	    document.getElementById("lat").value = posisiTitik.lat();
	    document.getElementById("lng").value = posisiTitik.lng();
	    }

	    function initialize() {
	      var propertiPeta = {
	        center:new google.maps.LatLng(-7.8444723,112.0327153),
	        zoom:11,
	        mapTypeId:google.maps.MapTypeId.ROADMAP
	      };
	      
	      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
	      
	      // even listner ketika peta diklik
	      google.maps.event.addListener(peta, 'click', function(event) {
	        taruhMarker(this, event.latLng);
	      });
	    }  
	    google.maps.event.addDomListener(window, 'load', initialize);

	    function previewImage() {
	    document.getElementById("image-preview").style.display = "inline";
	    var oFReader = new FileReader();
	     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

	    oFReader.onload = function(oFREvent) {
	      document.getElementById("image-preview").src = oFREvent.target.result;
	        };
	    };
	</script>

@endsection