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
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box col-md-9">
				<div class="pd-20">
					<h4 class="text-black h4">Data Puskesmas</h4>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
				</div>

				<div style="padding:20px;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Puskesmas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$dat->PUSK_ID}}</td>
                                <td>{{$dat->KEC}}</td>
                                <td>{{$dat->PUSKESMAS}}</td>
                                <td style="width: 90px;">
                                    <a href="/puskesmas:ed={{$dat->PUSK_ID}}" class="btn btn-sm btn-warning"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
                                    <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPusk{{$dat->PUSK_ID}}"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></button> -->
                                    <a href="/puskesmas:del={{$dat->PUSK_ID}}" class="btn btn-sm btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="tambahdata" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
				</div>
				<form action="{{url('/add_puskesmas')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
					<div class="modal-body">
						@foreach($idp as $id)
                            <input type="hidden" name="idp" class="form-control" value="{{$id->PUSK_ID+1}}" readonly="">
                        @endforeach
						<div class="col-12">
	                        <div class="form-group">
	                            <label for="first-name-vertical">Nama Kecamatan</label>
	                            <select class="js-example-basic-single" name="kec" required="" style="width: 100%; height: 50px;">
	                            	<option></option>
	                            	@foreach($kec as $ke)
	                            	<option value="{{$ke->KEC_ID}}">{{$ke->KEC}}</option>
	                            	@endforeach
	                            </select>
	                        </div>
                            <div class="form-group">
                                <label>Nama Puskesmas</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                            	<label>Longitude & Latitude</label>
                                <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#map"><i class="icon-copy dw dw-map-7"></i> Map</button>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col-md-6"><input type="text" class="form-control" id="lng" name="long" readonly=""></div>
                            		<div class="col-md-6"><input type="text" class="form-control" id="lat" name="lati" readonly=""></div>
                            	</div>
                            </div>
	                    </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</button>
						<button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Simpan </button>
					</div>
				</form>
			</div>
		</div>
	</div>



    <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:10px;width: 1080px;margin-left:-170px;margin-top: -15px;margin-bottom: -15px;">
                 <div id="googleMap" style="width:100%;height:530px;"></div>

                <div class="modal-footer">
                     <button type="button" class="btn btn-info btn-block" data-dismiss="modal"><i class="fa fa-check-circle"></i> Selesai</button>
                </div>

            </div>
        </div>
    </div>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD9qrkGVP3Udc6Jd9KteihJQ-bnr1nd2M4" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

	<script>

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
	    document.getElementById("elat").value = posisiTitik.lat();
	    document.getElementById("elng").value = posisiTitik.lng();
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