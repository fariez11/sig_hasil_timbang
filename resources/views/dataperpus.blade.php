@extends('layout.layhome')

@section('menu')
    <div class="nav-outer">
        <nav class="main-menu navbar-expand-md navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navigation clearfix">
                    <li><a href="/"><span>Home</span></a></li>                    
                    <li class="dropdown current">
                        <a href="#"><span>Data Hasil Timbang</span></a>
                        <ul>
                            <li><a href="/dataperkec">Berdasarkan Kecamatan</a></li>
                            <li class="current"><a href="#">Berdasarkan Puskesmas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Data Geografis</span></a>
                        <ul>
                            <li><a href="/mapkec">Berdasarkan Kecamatan</a></li>
                            <li><a href="/mappus">Berdasarkan Puskesmas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
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

    <section class="page-title" style="background-image: url(assets/img/bg4.jpg);">
        <div class="auto-container">
            <h1 style="color:white;">Data Hasil Timbang Berdasarkan Puskesmas</h1>
            <span class="title_divider"></span>
            <ul class="page-breadcrumb" style="color:white;">
                <li><a href="/" style="color:white;">Home</a></li>
                <li style="color:white;">Data Hasil Timbang</li>
                <li style="color:white;">Berdasarkan Puskesmas</li>
            </ul>
        </div>
    </section>
    
    <br>
    <section class="cart-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <style>
                        table tr td{
                            padding: 10px;
                        }
                    </style>
                    <form action="/dataperpus">
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
                                <button class="btn btn-primary" style="margin-top:20px;"><i class="fa fa-search"></i> Cari</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Puskesmas</th>
                                <th style="text-align:center;">Stunting</th>
                                <th style="text-align:center;">Underweight</th>
                                <th style="text-align:center;">Wasting</th>
                                <!-- <th style="text-align:center;">Aksi</th> -->
                            </tr>
                        </thead>
                        <?php $no = 1;?>
                        <tbody>
                        @foreach($data as $dat)
                            <tr style="font-size: 13px;">
                                <td style="width:20px;">{{$no++}}</td>
                                <td style="width:100px;">{{$dat->PUSKESMAS}}</td>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span style="color: red;">*</span>) <b>Gizi Buruk (Severely Wasting)</b>  <span style="padding-left: 20px;color: red;">**</span>) <b>Gizi Buruk(Wasting)</b>

                </div>
            </div>
        </div>
    </section>

@endsection
    