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
	$lev = array('Petugas Dinkes','Operator Kecamatan','Petugas Puskesmas');
?>

@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-black h4">Data Pengguna</h4>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
				</div>

				<div style="padding:20px;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;?>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dat->NAMA}}</td>
                                <td>{{$dat->EMAIL}}</td>
                                <td>{{$dat->USERNAME}}</td>
                                <td>{{$dat->PASSWORD}}</td>
                                <td>{{$dat->LEVEL}}</td>
                                <td style="width: 135px;">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#infoPengguna{{$dat->PENG_ID}}"><i class="icon-copy fa fa-info-circle" aria-hidden="true"></i></button>
                                    <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPengguna{{$dat->PENG_ID}}"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></button> -->
                                    <a href="/pengguna:ed={{$dat->PENG_ID}}" class="btn btn-sm btn-warning"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="/pengguna:del={{$dat->PENG_ID}}" class="btn btn-sm btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="tambahdata"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
				</div>
				<form action="{{url('/add_pengguna')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
					<div class="modal-body">
						@foreach($idp as $id)
                            <input type="hidden" name="idp" class="form-control" value="{{$id->PENG_ID+1}}" readonly="">
                        @endforeach

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
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="password-vertical">Level</label>
			                            <select class="form-control" name="level" id="level" required="">
			                            	<option></option>
			                            	@foreach($lev as $le)
			                            		<option>{{$le}}</option>
			                            	@endforeach
			                            </select>
			                        </div>
			                    </div>
			                    <div class="col-md-12" id="cbkec">
			                        <div class="form-group">
			                            <label for="password-vertical">Nama Kecamatan</label>
			                            <select class="js-example-basic-single form-control" name="kec" id="kec" style="width: 100%; height: 50px;">
			                            	<option></option>
			                            	@foreach($kec as $ke)
			                            		<option value="{{$ke->KEC_ID}}">{{$ke->KEC}}</option>
			                            	@endforeach
			                            </select>
			                        </div>
			                    </div>
			                    <div class="col-md-12" id="cbpus">
			                        <div class="form-group">
			                            <label for="password-vertical">Nama Puskesmas</label>
			                            <select class="js-example-basic-single form-control" name="pus" id="pus" style="width: 100%; height: 50px;">
			                            	<option></option>
			                            	@foreach($pus as $pu)
			                            		<option value="{{$pu->PUSK_ID}}">{{$pu->PUSKESMAS}}</option>
			                            	@endforeach
			                            </select>
			                        </div>
			                    </div>
                        	</div>
                        	<div class="col-md-7">
                        		<div class="col-md-12">
			                        <div class="form-group">
			                            <label for="first-name-vertical">Nama</label>
			                            <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="nama lengkap" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="email-id-vertical">Email</label>
			                            <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="email" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="contact-info-vertical">Username</label>
			                            <input type="text" id="contact-info-vertical" class="form-control" name="user" placeholder="username" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="password-vertical">Password</label>
			                            <input type="text" id="password-vertical" class="form-control" name="pass" placeholder="password" autocomplete="off" required="">
			                        </div>
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


	@foreach($data as $ed)
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


	<!-- @foreach($data as $edit) 
    <div class="modal fade" id="editPengguna{{$edit->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit Pengguna</h5>
                </div>

                    <?php
                        $id = $edit->PENG_ID;
                        $ed = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
                    ?>
                    @foreach($ed as $upd)
                    <form action="/pengguna:upd={{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

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
		                                <select class="form-control" name="level" required="" id="elevel">
		                                  @foreach($lev as $le)
		                                  <?php if ($le == $upd->LEVEL){ ?>
		                                       <option value="{{$le}}" selected="">{{$le}}</option>
		                                    <?php }else{ ?>
		                                      <option value="{{$le}}">{{$le}}</option>
		                                    <?php }?>
		                                  @endforeach
		                                </select>
		                            </div>
		                            <div >
				                        <div class="form-group" id="ecbkec">
				                            <label for="password-vertical">Nama Kecamatan</label>
				                            <select class="js-example-basic-single" name="kec" id="kec" style="width: 100%; height: 50px;">
				                            	<option></option>
				                            	@foreach($kec as $ke)
				                            		<option value="{{$ke->KEC_ID}}">{{$ke->KEC}}</option>
				                            	@endforeach
				                            </select>
				                        </div>
				                    </div>
				                    <div >
				                        <div class="form-group" id="ecbpus">
				                            <label for="password-vertical">Nama Puskesmas</label>
				                            <select class="js-example-basic-single" name="pus" id="pus" style="width: 100%; height: 50px;">
				                            	<option></option>
				                            	@foreach($pus as $pu)
				                            		<option value="{{$pu->PUSK_ID}}">{{$pu->PUSKESMAS}}</option>
				                            	@endforeach
				                            </select>
				                        </div>
				                    </div>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</button>
                        <button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Ubah</button>
                    </div>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
    @endforeach -->


@endsection