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
			<a href="/dataweight" class="dropdown-toggle no-arrow">
				<span class="micon ion-clipboard"></span><span class="mtext">Data Underweight</span>
			</a>
		</li>
		<li>
			<a href="#" class="dropdown-toggle no-arrow">
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
					<h4 class="text-black h4">Data Wasting</h4>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
				</div>

				<div style="padding:20px;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>Tanggal</th>
                                <th style="text-align:center;">Gizi Buruk<span style="color:red;">*</span> (%)</th>
                                <th style="text-align:center;">Gizi Buruk<span style="color:red;">**</span> (%)</th>
                                <th style="text-align:center;">Gizi Lebih<span style="color:red;">***</span> (%)</th>
                                <th style="text-align:center;">Gizi Lebih (%)</th>
                                <th style="text-align:center;">Obesitas (%)</th>
                                <th style="text-align:center;">Gizi Baik Normal</th>
                                <th style="text-align:center;">Aks</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td style="width:120px;"><?= date('d M Y',strtotime($dat->TGL)); ?></td>
                                <td style="width:140px;text-align: center;">{{$dat->G_BURUKA}}  &nbsp <i>( {{ROUND($dat->G_BURUKA / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->G_BURUKB}} &nbsp <i>( {{ROUND($dat->G_BURUKB / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->G_BLEBIH}} &nbsp <i>( {{ROUND($dat->G_BLEBIH / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->G_LEBIH}} &nbsp <i>( {{ROUND($dat->G_LEBIH / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->OBESITAS}} &nbsp <i>( {{ROUND($dat->OBESITAS / $dat->NORMAL * 100, 2)}} )</i></td>
                                <td style="width:140px;text-align: center;">{{$dat->NORMAL}}</td>
                                <td style="width: 50px;text-align: center;">
                                    <div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a href="#" type="button" class="dropdown-item" data-toggle="modal" data-target="#editWasting{{$dat->BT_ID}}"><i class="dw dw-edit2" aria-hidden="true"></i> Edit</a>
											<a href="/wasting:del={{$dat->BT_ID}}" class="dropdown-item" onclick="return(confirm('Anda Yakin ?'));"><i class="dw dw-delete-3" aria-hidden="true"></i> Hapus</a>

											<!-- <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
											<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a> -->
										</div>
									</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
					</table>
					<br>
					<span style="margin-top: 20px;">
						<span style="color:red;">*</span>) Gizi Buruk (Severely Wasting) &nbsp&nbsp <span style="color:red;">**</span>)  Gizi Buruk (Wasting) &nbsp&nbsp <span style="color:red;">***</span>) Gizi Berisiko Lebih
					</span>
				</div>
			
			</div>
		</div>

	</div>


	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
				</div>
				<form action="{{url('/add_wasting')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
					<div class="modal-body">
						@foreach($idb as $id)
                            <input type="hidden" name="idb" class="form-control" value="{{$id->BT_ID+1}}" readonly="">
                        @endforeach

                        <div class="row">
                        	<div class="col-md-6">
		                        <div class="form-group">
		                            <label for="first-name-vertical">Gizi Buruk (Severely Wasting)</label>
		                            <input type="number" id="first-name-vertical" class="form-control" name="gzs" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Gizi Beresiko Lebih</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="gbl" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Obesitas</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="obs" autocomplete="off" required="">
		                        </div>
			                </div>
			                <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="email-id-vertical">Gizi Buruk (Wasting)</label>
		                            <input type="number" id="email-id-vertical" class="form-control" name="gzb" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Gizi Lebih</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="gzl" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="password-vertical">Gizi Baik Normal</label>
		                            <input type="number" id="password-vertical" class="form-control" name="gzn" autocomplete="off" required="">
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
    <div class="modal fade" id="editWasting{{$edit->BT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit Data</h5>
                </div>

                    <?php
                        $id = $edit->BT_ID;
                        $ed = DB::SELECT("select*from bb_tinggi where BT_ID = '$id'");
                    ?>
                    @foreach($ed as $upd)
                    <form action="/wasting:upd={{$upd->BT_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                    	<div class="row">
                        	<div class="col-md-6">
		                        <div class="form-group">
		                            <label for="first-name-vertical">Gizi Buruk (Severely Wasting)</label>
		                            <input type="number" id="first-name-vertical" class="form-control" name="gzs" value="{{$upd->G_BURUKA}}" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Gizi Beresiko Lebih</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="gbl" value="{{$upd->G_BLEBIH}}"autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Obesitas</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="obs" value="{{$upd->OBESITAS}}" autocomplete="off" required="">
		                        </div>
			                </div>
			                <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="email-id-vertical">Gizi Buruk (Wasting)</label>
		                            <input type="number" id="email-id-vertical" class="form-control" name="gzb" value="{{$upd->G_BURUKB}}" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="contact-info-vertical">Gizi Lebih</label>
		                            <input type="number" id="contact-info-vertical" class="form-control" name="gzl" value="{{$upd->G_LEBIH}}" autocomplete="off" required="">
		                        </div>
		                        <div class="form-group">
		                            <label for="password-vertical">Gizi Baik Normal</label>
		                            <input type="number" id="password-vertical" class="form-control" name="gzn" value="{{$upd->NORMAL}}" autocomplete="off" required="">
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