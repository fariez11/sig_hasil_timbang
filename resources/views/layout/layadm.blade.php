<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<?php if(Session::get('level') == 'Admin'){?>
		<title>SIPS - Admin</title>
	<?php }else{?>
		<title>SIPS - Petugas Dinkes</title>
	<?php }?>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/back/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/back/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/back/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/back/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="assets/back/vendors/styles/icon-font.min.css">
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/switchery/switchery.min.css">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/back/vendors/styles/style.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

	
</head>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<!-- <div class="loader-logo"><img src="assets/back/vendors/images/deskapp-logo.svg" alt=""></div> -->
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			<div class="user-notification">
				<div class="dropdown">
					<!-- <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a> -->
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/photo1.jpg" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/photo2.jpg" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/photo3.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/photo4.jpg" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/back/vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php 
				$sesi = Session::get('akun');
				$sesp = DB::SELECT("select*from pengguna where PENG_ID = '$sesi'");

				foreach ($sesp as $key) {
			?>
			<div class="user-info-dropdown" style="margin-right: 20px;">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="assets/foto/{{$key->FOTO}}" alt="">
						</span>
						<span class="user-name">{{$key->NAMA}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<!-- <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a> -->
						<!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> -->
						<a class="dropdown-item" href="/logout"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>

	
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="assets/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="assets/back/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				
				@yield('menu')

			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

			@yield('content')

	<!-- js -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	
	<script src="assets/back/vendors/scripts/core.js"></script>
	<script src="assets/back/vendors/scripts/script.min.js"></script>
	<script src="assets/back/vendors/scripts/process.js"></script>
	<script src="assets/back/vendors/scripts/layout-settings.js"></script>

	<script src="assets/back/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="assets/back/vendors/scripts/dashboard.js"></script>
	<!-- buttons for Export datatable -->
	<script src="assets/back/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="assets/back/src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="assets/back/vendors/scripts/datatable-setting.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- switchery js -->
	<script src="assets/back/src/plugins/switchery/switchery.min.js"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="assets/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
	<!-- bootstrap-touchspin js -->
	<script src="assets/back/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyBw6bnAk0C2jIDDbz_dVRso9gUEnHLTH68"></script>

	<script type="text/javascript">
			
		$(document).ready(function() {
		    $('#example').DataTable();
		} );

		var geocoder;
	      var map;
	      var polygonArray = [];

	      function initialize() {
	        map = new google.maps.Map(
	          document.getElementById("map_canvas"), {
	            center: new google.maps.LatLng(-7.814406, 112.009495),
	            zoom: 10,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	          });
	        var drawingManager = new google.maps.drawing.DrawingManager({
	          drawingMode: google.maps.drawing.OverlayType.POLYGON,
	          drawingControl: true,
	          drawingControlOptions: {
	            position: google.maps.ControlPosition.TOP_CENTER,
	            drawingModes: [
	              google.maps.drawing.OverlayType.POLYGON
	            ]
	          },
	          /* not useful on jsfiddle
	          markerOptions: {
	            icon: 'images/car-icon.png'
	          }, */
	          circleOptions: {
	            fillColor: '#ffff00',
	            fillOpacity: 1,
	            strokeWeight: 5,
	            clickable: false,
	            editable: true,
	            zIndex: 1
	          },
	          polygonOptions: {
	            fillColor: '#BCDCF9',
	            fillOpacity: 0.5,
	            strokeWeight: 2,
	            strokeColor: '#57ACF9',
	            clickable: false,
	            editable: false,
	            zIndex: 1
	          }
	        });
	        console.log(drawingManager)
	        drawingManager.setMap(map)

	        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
	          // document.getElementById('info').innerHTML += "polygon points:" + "<br>";
	          for (var i = 0; i < polygon.getPath().getLength(); i++) {
	            document.getElementById('info').innerHTML += polygon.getPath().getAt(i).toUrlValue(6) + " ";
	          }
	          polygonArray.push(polygon);
	        });

	      }
	      google.maps.event.addDomListener(window, "load", initialize);

	      $(document).ready(function(){
	        $('#pus').attr('disabled',true);

	        $('#desa').keyup(function(){
	            if($(this).val().length !=0){
	                $('#pus').attr('disabled', false);
	            }else{
	                $('#pus').attr('disabled', true);
	            }
	        })
	    });

		$(document).ready(function(){
            $('#kec').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('kec')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#pus').empty();
                    $.each(data, function(index, element){
                        $('#pus').append("<option value="+element.PUSK_ID+">"+element.PUSKESMAS+"</option>");
                    });
                });
            });
        });

        $(function() {
        $('#cbkec').hide();
        $('#cbpus').hide();
        $('#level').change(function(){
	            if($('#level').val() == 'Petugas Dinskes') {
	                $('#cbkec').hide();
	                $('#cbpus').hide();
	                $('#ecbkec').hide();
	                $('#ecbpus').hide();
	            } else if($('#level').val() == 'Operator Kecamatan') {
	                $('#cbkec').show();
	                $('#ecbkec').show();
	                $('#cbpus').hide();
	                $('#ecbpus').hide();
	            } else if($('#level').val() == 'Petugas Puskesmas') {
	                $('#cbkec').show();
	                $('#cbpus').show();
	                $('#ecbkec').show();
	                $('#ecbpus').show();
	            }
	        });

	    });

	    $(function() {
        $('#bln').show();
        $('#thn').show();
        $('#per').change(function(){
	            if($('#per').val() == 'Bulan') {
	                $('#bln').show();
	                $('#thn').show();
	            } else if($('#per').val() == 'Tahun') {
	                $('#bln').hide();
	                $('#thn').show();
	            }
	        });

	    });

	    $(document).ready(function() {
		    $('.js-example-basic-single').select2();
		});

	</script>
	
</body>
</html>