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
                                <th>Bulan</th>
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
                                <td style="width:100px;">{{$dat->bulan}}</td>
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


@endsection