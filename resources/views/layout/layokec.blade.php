<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIPS - Operator Kecamatan</title>

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
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/back/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/back/vendors/styles/style.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
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

			<span class="micon dw dw-map-5" style="padding: 0px 10px 0px 30px;"></span> <span class="mtext">Kecamatan {{Session::get('nkec')}}</span>
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
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#infoPengguna{{$key->PENG_ID}}"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editPengguna{{$key->PENG_ID}}"><i class="icon-copy dw dw-edit"></i> Edit Profile</a>
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


	@foreach($sesp as $ed)
	<div class="modal fade" id="infoPengguna{{$ed->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md">
		  <div class="modal-content">
		    <div class="modal-header">
		      <h5 class="modal-title" id="exampleModalCenterTitle">Info Pengguna </h5>
		    </div>
		    <?php 
		        $id = $ed->PENG_ID;
		        $edit = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
		    ?>
		    @foreach($edit as $upd)
		        <div class="modal-body">             
		          <div class="row">
		            <div class="col-md-4">
		                <center>                       
		                  <img src="assets/foto/{{$ed->FOTO}}" style="width: 120px; height: 120px;margin: 0px 0px 0px 0px;border:1px solid white;border-radius: 100px;margin-bottom: 20px;"> 
		                </center>
		            </div>
		            <div class="col-md-8">
		              <style type="text/css">
		                table tr td{
		                  padding: 5px;
		                }
		              </style>

		                <table>
		                  <tr>
		                    <td>Nama </td>
		                    <td>:</td>
		                    <td>{{$ed->NAMA}}</td>
		                  </tr>
		                  <tr>
		                    <td>Email</td>
		                    <td>:</td>
		                    <td>{{$ed->EMAIL}}</td>
		                  </tr>
		                  <tr>
		                    <td>Level</td>
		                    <td>:</td>
		                    <td>{{$ed->LEVEL}}</td>
		                  </tr>
		                  <?php 
		                  	 $kec = DB::SELECT("select*from kecamatan where KEC_ID = '$ed->KEC_ID'");
		                  	 $pus = DB::SELECT("select*from puskesmas where PUSK_ID = '$ed->PUSK_ID'");
		                  ?>
		                  @foreach($kec as $ke)
		                  <tr>
		                    <td>Kecamatan</td>
		                    <td>:</td>
		                    <td>{{$ke->KEC}}</td>
		                  </tr>
		                  @endforeach
		                  @foreach($pus as $pu)
		                  <tr>
		                    <td>Puskesmas</td>
		                    <td>:</td>
		                    <td>{{$pu->PUSKESMAS}}</td>
		                  </tr>
		                  @endforeach
		                </table>
		                
		            </div>
		          </div>
		        </div>
		        <div class="modal-footer bg-whitesmoke br">
		          <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="icon-copy dw dw-cancel"></i> Tutup</button>
		        </div>
		    @endforeach
		  </div>
		</div>
	</div>
	@endforeach

	@foreach($sesp as $edit) 
    <div class="modal fade" id="editPengguna{{$edit->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit Pengguna</h5>
                </div>

                    <?php
                        $id = $edit->PENG_ID;
                        $ed = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
                    ?>
                    @foreach($ed as $upd)
                    <form action="/sesope:upd={{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                    	<div class="row">
                    		<div class="col-md-12">
	                            <div class="form-group">
	                                <label>Nama Pengguna</label>
	                                <input type="text" name="nama" class="form-control" value="{{$upd->NAMA}}" autocomplete="off">
	                            </div>
	                            <div class="form-group">
	                                <label>Email</label>
	                                <input type="text" name="email" class="form-control" value="{{$upd->EMAIL}}">
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-group">
	                                <label>Username</label>
	                                <input type="text" name="user" class="form-control" value="{{$upd->USERNAME}}" autocomplete="off">
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-group">
	                                <label>Password</label>
	                                <input type="text" name="pass" class="form-control" value="{{$upd->PASSWORD}}" autocomplete="off">
	                            </div>
	                        </div>
	                        <div class="col-md-12">
	                            <div class="form-group">
									<label>Foto</label>
									<div class="custom-file">
										<input type="file" name="foto" class="custom-file-input">
										<label class="custom-file-label">Choose file</label>
									</div>
								</div>
                    		</div>
                    	</div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</button>
                        <button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Ubah</button>
                    </div>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
    @endforeach



	<!-- js -->
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

	<script type="text/javascript">
			
		$(document).ready(function() {
		    $('#example').DataTable();
		} );

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

	</script>
	
</body>
</html>