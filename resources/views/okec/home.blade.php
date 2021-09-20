@extends('layout.layokec')

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
			<a href="/datahastim" class="dropdown-toggle no-arrow">
				<span class="micon dw dw-table"></span><span class="mtext">Data Hasil Timbang</span>
			</a>
		</li>
	</ul>
@endsection


@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="assets/back/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<?php 
							$sesi = Session::get('akun');
							$sesp = DB::SELECT("select*from pengguna where PENG_ID = '$sesi'");
						?>
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">@foreach($sesp as $ses){{$ses->NAMA}}@endforeach</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>

@endsection
	