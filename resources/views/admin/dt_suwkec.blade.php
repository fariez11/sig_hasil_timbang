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

    $per = array('Bulan','Tahun');
    $bul = array ( 
        [
            'id' => 1,
            'bulan' => 'Januari',
        ],
        [
            'id' => 2,
            'bulan' => 'Februari',
        ],
        [
            'id' => 3,
            'bulan' => 'Maret',
        ],
        [
            'id' => 4,
            'bulan' => 'April',
        ],
        [
            'id' => 5,
            'bulan' => 'Mei',
        ],
        [
            'id' => 6,
            'bulan' => 'Juni',
        ],
        [
            'id' => 7,
            'bulan' => 'Juli',
        ],
        [
            'id' => 8,
            'bulan' => 'Agustus',
        ],
        [
            'id' => 9,
            'bulan' => 'September',
        ],
        [
            'id' => 10,
            'bulan' => 'Oktober',
        ],
        [
            'id' => 11,
            'bulan' => 'November',
        ],
        [
            'id' => 12,
            'bulan' => 'Desember',
        ]
    );

    ?>

@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-black h4">Data Berdasarkan Kecamatan</h4>
				</div>
				<div style="padding:0px 20px 20px 20px;">
					<style>
						table tr td{
							padding: 10px;
						}
					</style>

					<form action="/datasuwkec">
					{{csrf_field()}}
					<table style="margin-bottom: 10px;">
						<tr>
							<td>
                                <div class="form-group">
                                    <label>Berdasarkan</label>
                                        <select class="form-control" name="per" id="per" required="">
                                        @foreach($per as $pr)
                                            <?php if ($pr == $per){ ?>
                                               <option value="{{$pr}}" selected="">{{$pr}}</option>
                                            <?php }else{ ?>
                                              <option value="{{$pr}}">{{$pr}}</option>
                                            <?php }?>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td id="bln">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select class="form-control" name="bulan">
                                        @foreach($bul as $bln)
                                            <?php if ($bln['id'] == $cbbln){ ?>
                                               <option value="{{$bln['id']}}" selected="">{{$bln['bulan']}}</option>
                                            <?php }else{ ?>
                                              <option value="{{$bln['id']}}">{{$bln['bulan']}}</option>
                                            <?php }?>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
							<td id="thn">
								<div class="form-group">
									<label>Tahun</label>
									<select class="form-control" name="tahun">
										@foreach($tahun as $thn)
										<option>{{$thn->tahun}}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td>
								<button class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-search"></i> Cari</button>
							</td>
						</tr>
					</table>
					</form>
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Kecamatan</th>
                                <th style="text-align:center;">Stunting</th>
                                <th style="text-align:center;">Underweight</th>
                                <th style="text-align:center;">Wasting</th>
                                <!-- <th style="text-align:center;">Aksi</th> -->
                            </tr>
                        </thead>
                        <?php $no = 1;?>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td style="width:20px;">{{$no++}}</td>
                                <td style="width:100px;">{{$dat->KEC}}</td>
                                <td style="width:200px;text-align: justify;">
                                	Sangat Pendek = {{$dat->S_PENDEK}}% <br> 
                                	Pendek = {{$dat->PENDEK}}% <br> 
                                	Tinggi = {{$dat->TINGGI}}% <br> 
                                	Normal = {{$dat->ANORMAL}}
                                </td>
                                <td style="width:200px;">
                                	Sangat Kurang = {{$dat->BERAT_S}}% <br> 
                                	Kurang = {{$dat->BERAT_K}}% <br> 
                                	Lebih = {{$dat->BERAT_L}}% <br> 
                                	Normal = {{$dat->BNORMAL}}
                                </td>
                                <td style="width:200px;">
                                	Gizi Buruk<span style="color:red;">*</span> = {{$dat->G_BURUKA}}% <br> 
                                	Gizi Buruk<span style="color:red;">**</span> = {{$dat->G_BURUKB}}% <br> 
                                	Gizi Berisiko Lebih = {{$dat->G_BLEBIH}}% <br> 
                                	Gizi Lebih = {{$dat->G_LEBIH}}% <br>
                                	Obesitas = {{$dat->OBESITAS}}% <br>
                                	Normal = {{$dat->CNORMAL}}
                                </td>
                                <!-- <td style="width: 60px;">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editStunting{{$dat->KEC_ID}}"><i class="icon-copy fa fa-info-circle" aria-hidden="true"></i></button>
                                </td> -->
                            </tr>
                        @endforeach
                        </tbody>
					</table>
					<span style="color: red;">*</span>) <b>Gizi Buruk (Severely Wasting)</b>  <span style="padding-left: 20px;color: red;">**</span>) <b>Gizi Buruk(Wasting)</b>
				</div>
			</div>
		</div>
	</div>




	<!-- @foreach($data as $edit) 
    <div class="modal fade" id="editStunting{{$edit->KEC_ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit Data</h5>
                </div>

                    <?php
                        $id = $edit->KEC_ID;
                        $ed = DB::SELECT("SELECT a.KEC_ID,a.KEC,a.KOORDINAT,
							                ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
							                ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
							                ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
							                SUM(c.NORMAL) as ANORMAL,

							                ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
							                ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
							                ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
							                SUM(d.NORMAL) as BNORMAL,

							                ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
							                ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
							                ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
							                ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
							                ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
							                SUM(e.NORMAL) as CNORMAL 
							            FROM kecamatan a, puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
							            WHERE a.KEC_ID = b.KEC_ID 
							            AND b.PUSK_ID = c.PUSK_ID 
							            AND b.PUSK_ID = d.PUSK_ID 
							            AND b.PUSK_ID = e.PUSK_ID 
							            AND b.KEC_ID = '$id' 
							            AND a.HAPUS = 0 AND b.HAPUS = 0 
							            GROUP BY a.KEC_ID");
                    ?>
                    @foreach($ed as $upd)
                    <form action="/stunting:upd={{$upd->KEC_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                    	<div class="row">
                        	<div class="col-md-12">
                        		<div class="col-md-12">
			                        <div class="form-group">
			                            <label for="first-name-vertical">Sangat Pendek</label>
			                            <input type="number" id="first-name-vertical" class="form-control" name="spen" value="{{$upd->S_PENDEK}}"  autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="email-id-vertical">Pendek</label>
			                            <input type="number" id="email-id-vertical" class="form-control" name="pend" value="{{$upd->PENDEK}}" vautocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="contact-info-vertical">Tinggi</label>
			                            <input type="number" id="contact-info-vertical" class="form-control" name="ting" value="{{$upd->TINGGI}}" autocomplete="off" required="">
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <label for="password-vertical">Normal</label>
			                            <input type="number" id="password-vertical" class="form-control" name="norm" value="{{$upd->ANORMAL}}" autocomplete="off" required="">
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