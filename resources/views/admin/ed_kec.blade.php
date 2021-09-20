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
			<div class="card-box col-md-12" style="background-color: white;">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class=" h4" style="padding-top:20px;">Tambah Data Kecamatan</h4>
						<br>
					</div>
				</div>
				@foreach($data as $edit)
				<form action="/kecamatan:upd={{$edit->KEC_ID}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <input type="text" name="nama" class="form-control" value="{{$edit->KEC}}" autocomplete="off">
                        </div>
                    </div>
                    <div id="map_canvas" style=" width: 100%;height: 530px;border-radius: 5px;"></div>
	                <br>
	                <textarea name="koor" class="form-control" id="info" style="text-align:justify;"></textarea>
					<br>
					<center>
						<a href="/datakecamatan" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</a>
						<a href="/createkec" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="icon-copy dw dw-refresh2"></i> Reset</a>
						<button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Simpan </button>
					</center>
				</form>
				@endforeach	
			</div>
		</div>
	</div>

@endsection