<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Sistem Informasi Stunting</title>

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
	<link rel="stylesheet" type="text/css" href="assets/back/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<!-- <div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="assets/back/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
		</div>
	</div> -->
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container" style="margin-top: 40px;">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="assets/back/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login</h2>
						</div>
							<?php if(Session::get('errlog')){ ?>
	                            <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
	                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
	                                silahkan login terlebih dahulu !!!
	                            </div>
	                        <?php }else if(Session::get('gagal')){ ?>
		                        <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
		                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
		                            Username dan password anda tidak cocok !!!
		                        </div>
		                    <?php }?>
                    	<br>
						<form action="/actlog" method="get">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="user" placeholder="Username" autocomplete="off">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="pass" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
									</div>
									<?php if($data == null){ ?>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="#" class="btn-block" data-toggle="modal" data-target="#Medium-modal" type="button">Register</a>
									<?php }else{?>
										<br><br><br><br>
									<?php }?>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Daftar Akun</h4>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
				</div>
				<form action="{{url('/regis')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
					<div class="modal-body">
						<input type="hidden" name="idp" value="1" readonly="">
						<div class="col-12">
	                        <div class="form-group">
	                            <label for="first-name-vertical">Nama</label>
	                            <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="nama lengkap" autocomplete="off" required="">
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label for="email-id-vertical">Email</label>
	                            <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="email" autocomplete="off" required="">
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label for="contact-info-vertical">Username</label>
	                            <input type="text" id="contact-info-vertical" class="form-control" name="user" placeholder="username" autocomplete="off" required="">
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label for="password-vertical">Password</label>
	                            <input type="text" id="password-vertical" class="form-control" name="pass" placeholder="password" autocomplete="off" required="">
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
								<label>Foto</label>
								<div class="custom-file">
									<input type="file" name="foto" class="custom-file-input">
									<label class="custom-file-label">Choose file</label>
								</div>
							</div>
	                    </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</button>
						<button class="btn btn-primary"><i class="icon-copy dw dw-checked"></i> Daftar </button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="assets/back/vendors/scripts/core.js"></script>
	<script src="assets/back/vendors/scripts/script.min.js"></script>
	<script src="assets/back/vendors/scripts/process.js"></script>
	<script src="assets/back/vendors/scripts/layout-settings.js"></script>
</body>
</html>