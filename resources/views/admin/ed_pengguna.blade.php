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

<?php 
	$lev = array('Admin','Petugas Dinskes','Operator Kecamatan','Petugas Puskesmas');
?>


@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box col-md-12">
				<div class="pd-10">
					<h4 class="text-black h4">Edit Data Pengguna</h4>
				</div>
                @foreach($data as $upd)
                <form action="/pengguna:upd={{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
				<div class="card-body">
					<div class="row">
                		<div class="col-md-5">
                			<div class="col-md-12">

                				<div class="form-group">
									<label>Foto</label>
									<div class="custom-file">
										<input type="file" name="foto" class="custom-file-input">
										<label class="custom-file-label">Choose file</label>
									</div>
								</div>
	                            <div class="form-group">
	                                <label>Level</label>
	                                <select class="form-control" name="level" required="" id="level">
	                                  @foreach($lev as $le)
	                                  <?php if ($le == $upd->LEVEL){ ?>
	                                       <option value="{{$le}}" selected="">{{$le}}</option>
	                                    <?php }else{ ?>
	                                      <option value="{{$le}}">{{$le}}</option>
	                                    <?php }?>
	                                  @endforeach
	                                </select>
	                            </div>
	                            <?php if($upd->LEVEL == 'Admin'){

	                            }else if($upd->LEVEL == 'Petugas Dinkes'){

	                            }else{?>
	                            <div>
			                        <div class="form-group" id="ecbkec">
			                            <label for="password-vertical">Nama Kecamatan</label>
			                            <select class="js-example-basic-single form-control" name="kec" id="kec" style="width: 100%; height: 100%;">
			                            	@foreach($kec as $ke)
		                            		<?php if ($ke->KEC_ID == $upd->KEC_ID){ ?>
		                                       <option value="{{$ke->KEC_ID}}" selected="">{{$ke->KEC}}</option>
		                                    <?php }else{ ?>
		                                      <option value="{{$ke->KEC_ID}}">{{$ke->KEC}}</option>
		                                    <?php }?>
					                        @endforeach
			                            </select>
			                        </div>
			                    </div>
			                    <div>
			                        <div class="form-group" id="ecbpus">
			                            <label for="password-vertical">Nama Puskesmas</label>
			                            <select class="js-example-basic-single form-control" name="pus" id="pus" style="width: 100%; height: 100%;">
			                            	<option></option>
			                            	@foreach($pus as $pu)
			                            	<?php if ($pu->PUSK_ID == $upd->PUSK_ID){ ?>
		                                       <option value="{{$pu->PUSK_ID}}" selected="">{{$pu->PUSKESMAS}}</option>
		                                    <?php }else{ ?>
		                                      <option value="{{$pu->PUSK_ID}}">{{$pu->PUSKESMAS}}</option>
		                                    <?php }?>
			                            	@endforeach
			                            </select>
			                        </div>
			                    </div>
			                <?php } ?>
	                        </div>
                		</div>
                		<div class="col-md-7">
                			<div class="col-md-12">
                                <input type="hidden" name="idp" class="form-control" value="{{$upd->PENG_ID}}" readonly="">
	                            <div class="form-group">
	                                <label>Nama Pengguna</label>
	                                <input type="text" name="nama" class="form-control" value="{{$upd->NAMA}}" autocomplete="off">
	                            </div>
	                            <div class="form-group">
	                                <label>Email</label>
	                                <input type="text" name="email" class="form-control" value="{{$upd->EMAIL}}">
	                            </div>
	                            <div class="form-group">
	                                <label>Username</label>
	                                <input type="text" name="user" class="form-control" value="{{$upd->USERNAME}}" autocomplete="off">
	                            </div>
	                            <div class="form-group">
	                                <label>Password</label>
	                                <input type="text" name="pass" class="form-control" value="{{$upd->PASSWORD}}" autocomplete="off">
	                            </div>
                        	</div>
                		</div>
                	</div>

				</div>
				 <div class="card-footer" style="text-align: right;">
                    <a href="/datapengguna" class="btn btn-sm btn-danger"><i class="icon-copy dw dw-cancel"></i> Batal</a>
                    <button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Ubah</button>
                </div>
            </form>
            @endforeach
			</div>
		</div>
	</div>


	
	

@endsection