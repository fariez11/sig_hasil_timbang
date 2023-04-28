@extends('layout.layhome')

@section('menu')
    <div class="nav-outer">
        <nav class="main-menu navbar-expand-md navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navigation clearfix">
                    <li><a href="/"><span>Home</span></a></li>                    
                    <li class="dropdown">
                        <a href="#"><span>Data Hasil Timbang</span></a>
                        <ul>
                            <li><a href="/dataperkec">Berdasarkan Kecamatan</a></li>
                            <li><a href="/dataperpus">Berdasarkan Puskesmas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown current">
                        <a href="#"><span>Data Geografis</span></a>
                        <ul>
                            <li><a href="/mapkec">Berdasarkan Kecamatan</a></li>
                            <li class="current"><a href="/mappus">Berdasarkan Puskesmas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection

@section('content')

    <section class="page-title" style="background-image: url(assets/img/bg4.jpg);">
        <div class="auto-container">
            <h1 style="color:white;">Data Geografis Puskesmas Bulan Ini</h1>
            <span class="title_divider"></span>
            <ul class="page-breadcrumb" style="color:white;">
                <li><a href="/"  style="color:white;">Home</a></li>
                <li style="color:white;">Data Geografis</li>
                <li style="color:white;">Berdasarkan Puskesmas</li>
            </ul>
        </div>
    </section>
    
    <br>
    <!-- Contact Map Section -->
    <section class="contact-map-section">
        <div class="col-md-12">
            <div class="alert" style=" color: #004085; background-color: #cce5ff; border-color: #b8daff;margin-bottom: 20px;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" style="color:#004085;">&times;</span></button>
                Silahkan klik salah satu dari tanda merah dibawah ini untuk menampilkan data stunting, underweight, dan wasting dari puskesmas tersebut.
            </div>
        </div>
        <div class="map-outer">
            <div id="map-canvas" style="width: 100%; height: 630px;"></div>
        </div>
    </section>

    
    ///
    <script type="text/javascript">
    var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            foreach($data as $dat)
            {
                $kec = $dat->KEC;
                $pus = $dat->PUSKESMAS;
                $lat = $dat->LATITUDE;
                $lon = $dat->LONGITUDE;         
                $tb1 = ROUND($dat->S_PENDEK / $dat->ANORMAL * 100, 2);         
                $tb2 = ROUND($dat->PENDEK / $dat->ANORMAL * 100, 2);         
                $tb3 = ROUND($dat->TINGGI / $dat->ANORMAL * 100, 2);         
                $tb4 = $dat->ANORMAL;
                $bb1 = ROUND($dat->BERAT_S / $dat->BNORMAL * 100, 2);
                $bb2 = ROUND($dat->BERAT_K / $dat->BNORMAL * 100, 2);
                $bb3 = ROUND($dat->BERAT_L / $dat->BNORMAL * 100, 2);
                $bb4 = $dat->BNORMAL;
                $bt1 = ROUND($dat->G_BURUKA / $dat->CNORMAL * 100, 2);
                $bt2 = ROUND($dat->G_BURUKB / $dat->CNORMAL * 100, 2);
                $bt3 = ROUND($dat->G_BLEBIH / $dat->CNORMAL * 100, 2);
                $bt4 = ROUND($dat->G_LEBIH / $dat->CNORMAL * 100, 2);
                $bt5 = ROUND($dat->OBESITAS / $dat->CNORMAL * 100, 2);
                $bt6 = $dat->CNORMAL;

                echo ("addMarker($lat, $lon, '<style>table tr td{padding:4px;}</style><center><table><tr><td rowspan=2><img src=assets/img/pusk1.png width=50px style=margin-right:10px;></td><td>Kecamatan</td><td>:</td><td>$kec</td></tr><tr><td>Puskesmas</td><td>:</td><td>$pus</td></tr></table></center><br><style>table tr td{padding:3px;}</style><table><tr><td colspan=3 style=text-align:center;><b>Stunting</b></td><td colspan=3 style=text-align:center;><b>Underweight</b></td><td colspan=3 style=text-align:center;><b>Wasting(Kurus)</b></td></tr><td>Sangat Pendek</td><td>:</td><td>$tb1 %</td><td>Sangat Kurang</td><td>:</td><td>$bb1 %</td><td>Gizi Buruk (Severely Wasting)</td><td>:</td><td>$bt1 %</td></tr><tr><td>Pendek</td><td>:</td><td>$tb2 %</td><td>Kurang</td><td>:</td><td>$bb2 %</td><td>Gizi Buruk (Wasting)</td><td>:</td><td>$bt2 %</td></tr><tr><td>Tinggi</td><td>:</td><td>$tb3 %</td><td>Lebih</td><td>:</td><td>$bb3 %</td><td>Gizi Beresiko Lebih</td><td>:</td><td>$bt3 %</td></tr><tr><td>Normal</td><td>:</td><td>$tb4</td><td>Normal</td><td>:</td><td>$bb4</td><td>Gizi Lebih</td><td>:</td><td>$bt4 %</td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Obesitas</td><td>:</td><td>$bt5 %</td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Normal</td><td>:</td><td>$bt6 </td></tr></table>');\n");         
            }
          ?>

        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
    
