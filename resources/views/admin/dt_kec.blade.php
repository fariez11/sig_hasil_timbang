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
			<div class="card-box col-md-9">
				<div class="pd-20">
					<h4 class="text-black h4">Data Kecamatan</h4>
					<a href="/createkec" class="btn btn-sm btn-primary"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</a>
				</div>

				<div style="padding:20px;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$dat->KEC_ID}}</td>
                                <td>{{$dat->KEC}}</td>
                                <td style="width: 90px;">
                                    <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editKec{{$dat->KEC_ID}}"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></button> -->
                                    <a href="/kecamatan:ed={{$dat->KEC_ID}}" class="btn btn-sm btn-warning"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="/kecamatan:del={{$dat->KEC_ID}}" class="btn btn-sm btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

	@foreach($data as $edit) 
        <div id="editKec{{$edit->KEC_ID}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Edit Kecamatan</h5>
                    </div>
                    <form action="/kecamatan:upd={{$edit->KEC_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Kecamatan</label>
                                    <input type="text" name="nama" class="form-control" value="{{$edit->KEC}}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="icon-copy dw dw-cancel"></i> Batal</button>
                            <button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-checked"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach


@endsection