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
                            <li class="current"><a href="/mapkec">Berdasarkan Kecamatan</a></li>
                            <li><a href="/mappus">Berdasarkan Puskesmas</a></li>
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
            <h1 style="color:white;">Data Geografis Kecamatan Bulan Ini</h1>
            <span class="title_divider"></span>
            <ul class="page-breadcrumb" style="color:white;">
                <li><a href="/"  style="color:white;">Home</a></li>
                <li style="color:white;">Data Geografis</li>
                <li style="color:white;">Berdasarkan Kecamatan</li>
            </ul>
        </div>
    </section>
    
    <br>
    <!-- Contact Map Section -->
    <section class="contact-map-section">
        <div class="col-md-12">
            <div class="alert" style=" color: #004085; background-color: #cce5ff; border-color: #b8daff;margin-bottom: 20px;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" style="color:#004085;">&times;</span></button>
                Silahkan klik salah satu dari batas wilayah dibawah ini untuk menampilkan data stunting, underweight, dan wasting dari wilayah tersebut.
            </div>
        </div>
        <div class="map-outer">
            <div id="map-canvas" style="width: 100%; height: 630px;"></div>
        </div>
    </section>

    
    <script src="assets/front/js/jquery-1.12.1.min.js"></script>
    ///
    <script>
        // var nama = [];
        var keca = [];
        var aa1 = [];
        var aa2 = [];
        var aa3 = [];
        var aa4 = [];
        var bb1 = [];
        var bb2 = [];
        var bb3 = [];
        var bb4 = [];
        var cc1 = [];
        var cc2 = [];
        var cc3 = [];
        var cc4 = [];
        var cc5 = [];
        var cc6 = [];
        var lokasi = [];
        var cords = '';
        var area = [];
        var infoWindow;

        function peta_awal(){
            var kediri = new google.maps.LatLng(-7.802047, 112.1312201);
            var petaoption = {
                zoom: 11,
                center: kediri,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            peta = new google.maps.Map(document.getElementById("map-canvas"),petaoption);

            url = "/kec";
            $.ajax({
                url: url,
                dataType: 'json',
                cache: false,
                success: function(msg){
                    var polygon;
                    var cords = [];
                    for(i=0;i<msg.kec.lahan.length;i++){
                        keca[i] = msg.kec.lahan[i].kecamatan;
                        aa1[i] = msg.kec.lahan[i].aa1;
                        aa2[i] = msg.kec.lahan[i].aa2;
                        aa3[i] = msg.kec.lahan[i].aa3;
                        aa4[i] = msg.kec.lahan[i].aa4;
                        bb1[i] = msg.kec.lahan[i].bb1;
                        bb2[i] = msg.kec.lahan[i].bb2;
                        bb3[i] = msg.kec.lahan[i].bb3;
                        bb4[i] = msg.kec.lahan[i].bb4;
                        cc1[i] = msg.kec.lahan[i].cc1;
                        cc2[i] = msg.kec.lahan[i].cc2;
                        cc3[i] = msg.kec.lahan[i].cc3;
                        cc4[i] = msg.kec.lahan[i].cc4;
                        cc5[i] = msg.kec.lahan[i].cc5;
                        cc6[i] = msg.kec.lahan[i].cc6;
                        lokasi[i] = msg.kec.lahan[i].polygon;
                       
                        var str = lokasi[i].split(" "); 
                        
                        for (var j=0; j < str.length; j++) { 
                            var point = str[j].split(",");
                            cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                        }

                       var contentString = '<center><span style=font-weight:bold;> Kecamatan '+keca[i]+'</span></center><br>' +
                                        '<table>'+
                                            '<tr>'+
                                                '<td colspan=3 style=text-align:center;padding-bottom:9px;><b>Stunting</b></td>'+
                                                '<td colspan=3 style=text-align:center;padding-bottom:9px;><b>Underweight</b></td>'+
                                                '<td colspan=3 style=text-align:center;padding-bottom:9px;><b>Wasting(Kurus)</b></td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Sangat Pendek</td><td style=padding:2px 7px; 0px 7px>:</td><td style=padding-right:15px;>'+ aa1[i] +'%</td>'+
                                                '<td>Sangat Kurang</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ bb1[i] +'%</td>'+
                                                '<td>Gizi Buruk (Severely Wasting)</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc1[i] +'%</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Pendek</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ aa2[i] +'%</td>'+
                                                '<td>Kurang</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ bb2[i] +'%</td>'+
                                                '<td>Gizi Buruk (Wasting)</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc2[i] +'%</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Tinggi</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ aa3[i] +'%</td>'+
                                                '<td>Lebih</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ bb3[i] +'%</td>'+
                                                '<td>Gizi Beresiko Lebih</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc3[i] +'%</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Normal</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ aa4[i] +'</td>'+
                                                '<td>Normal</td><td style=padding:2px 7px; 0px 7px;>:</td><td style=padding-right:15px;>'+ bb4[i] +'</td>'+
                                                '<td>Gizi Lebih</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc4[i] +'%</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td></td><td style=padding:2px 7px; 0px 7px;></td><td style=padding-right:15px;></td>'+
                                                '<td></td><td style=padding:2px 7px; 0px 7px;></td><td style=padding-right:15px;></td>'+
                                                '<td>Obesitas</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc5[i] +'%</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td></td><td style=padding:2px 7px; 0px 7px;></td><td style=padding-right:15px;></td>'+
                                                '<td></td><td style=padding:2px 7px; 0px 7px;></td><td style=padding-right:15px;></td>'+
                                                '<td>Normal</td><td style=padding:2px 7px; 0px 7px;>:</td><td>'+ cc6[i] +'</td>'+
                                            '</tr>'+
                                        '</table>'
                                           ;

                       
                        polygon = new google.maps.Polygon({
                            paths: [cords],
                            strokeColor: '#007BFF',
                            strokeOpacity: 0.8,
                            strokeWeight: 1,
                            fillColor: '#007BFF',
                            fillOpacity: 0.30,
                            html: contentString
                        });   

                        cords = []; 
                        polygon.setMap(peta); 
                        infoWindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(polygon, 'click', function(event) {
                            infoWindow.setContent(this.html);
                            infoWindow.setPosition(event.latLng);
                            infoWindow.open(peta);
                        });
                    }               
                }
            });
        }
    </script>
@endsection
    
