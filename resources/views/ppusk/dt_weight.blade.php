@extends('layout.layppus')

@section('menu')
	<ul id="accordion-menu">
		<li>
			<a href="/petpuskesmas" class="dropdown-toggle no-arrow">
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
			<a href="/datastunting" class="dropdown-toggle no-arrow">
				<span class="micon ion-clipboard"></span><span class="mtext">Data Stunting</span>
			</a>
		</li>
		<li>
			<a href="#" class="dropdown-toggle no-arrow">
				<span class="micon ion-clipboard"></span><span class="mtext">Data Underweight</span>
			</a>
		</li>
		<li>
			<a href="/datawasting" class="dropdown-toggle no-arrow">
				<span class="micon ion-clipboard"></span><span class="mtext">Data Wasting</span>
			</a>
		</li>
	</ul>
@endsection

<?php 
	$lev = array('Petugas Dinskes','Operator Kecamatan','Petugas Puskesmas');
?>

@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-black h4">Data UnderWeight</h4>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
				</div>

				<div style="padding:20px;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>Tanggal</th>
                                <th style="text-align:center;">BB Sangat Kurang (%)</th>
                                <th style="text-align:center;">BB Kurang (%)</th>
                                <th style="text-align:center;">BB Lebih (%)</th>
                                <th style="text-align:center;">BB Normal</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td style="width:130px;"><?= date('d M Y',strtotime($dat->TGL)); ?></td>
                                <td style="width:160px;text-align: center;">{{$dat->BERAT_S}}  &nbsp <i>( {{ROUND($dat->BERAT_S / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:150px;text-align: center;">{{$dat->BERAT_K}} &nbsp <i>( {{ROUND($dat->BERAT_K / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:150px;text-align: center;">{{$dat->BERAT_L}} &nbsp <i>( {{ROUND($dat->BERAT_L / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->NORMAL}}</td>
                                <td style="width: 90px;">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editStunting{{$dat->BB_ID}}"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></button>
                                    <a href="/weight:del={{$dat->BB_ID}}" class="btn btn-sm btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
				</div>
				<form action="{{url('/add_weight')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
					<div class="modal-body">
						@foreach($idb as $id)
                            <input type="hidden" name="idb" class="form-control" value="{{$id->BB_ID+1}}" readonly="">
                        @endforeach

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="col-md-12">
			                        <div class="form-group">
			                            <label for="first-name-vertical">Berat Badan Sangat Kurang</label>
			                            <input type="number" id="first-name-vertical" class="form-control" name="bbs"  autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="email-id-vertical">Berat Badan Kurang</label>
			                            <input type="number" id="email-id-vertical" class="form-control" name="bbk" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="contact-info-vertical">Berat Badan Lebih</label>
			                            <input type="number" id="contact-info-vertical" class="form-control" name="bbl" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="password-vertical">Berat Badan Normal</label>
			                            <input type="number" id="password-vertical" class="form-control" name="bbn" autocomplete="off" required="">
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




	@foreach($data as $edit) 
    <div class="modal fade" id="editStunting{{$edit->BB_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit Data</h5>
                </div>

                    <?php
                        $id = $edit->BB_ID;
                        $ed = DB::SELECT("select*from bb_umur where BB_ID = '$id'");
                    ?>
                    @foreach($ed as $upd)
                    <form action="/weight:upd={{$upd->BB_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                    	<div class="row">
                        	<div class="col-md-12">
                        		<div class="col-md-12">
			                        <div class="form-group">
			                            <label for="first-name-vertical">Berat Badan Sangat Kurang</label>
			                            <input type="number" id="first-name-vertical" class="form-control" name="bbs" value="{{$upd->BERAT_S}}"  autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="email-id-vertical">Berat Badan Kurang</label>
			                            <input type="number" id="email-id-vertical" class="form-control" name="bbk" value="{{$upd->BERAT_K}}" vautocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="contact-info-vertical">Berat Badan Lebih</label>
			                            <input type="number" id="contact-info-vertical" class="form-control" name="bbl" value="{{$upd->BERAT_L}}" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="password-vertical">Berat Badan Normal</label>
			                            <input type="number" id="password-vertical" class="form-control" name="bbn" value="{{$upd->NORMAL}}" autocomplete="off" required="">
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


@endsection