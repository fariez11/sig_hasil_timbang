@extends('layout.layhome')

@section('menu')
    <div class="nav-outer">
        <nav class="main-menu navbar-expand-md navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navigation clearfix">
                    <li class="current"><a href="/"><span>Home</span></a></li>
                    <li class="dropdown">
                        <a href="#"><span>Data Hasil Timbang</span></a>
                        <ul>
                            <li><a href="/dataperkec">Berdasarkan Kecamatan</a></li>
                            <li><a href="/dataperpus">Berdasarkan Puskesmas</a></li>
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

@section('content') 
    <!--Main Slider-->
    <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_two_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_two" data-version="5.4.1">
                <ul>

                    <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-delay="5000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        
                        <img src="assets/img/bg1.jpg" title="head" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['750','750','750','650']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-80','-80','-100','-100']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <h2>SIG Hasil Timbang</h2>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['520','520','600','455']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['0','0','0','0']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="text"><br>adalah sistem informasi yang merekap beberapa data stunting, underweight dan wasting dari beberapa kecamatan yang ada di kabupaten kediri dan sekitarnya dalam bentuk geografis</div>
                        </div>
                        
                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-width="['650','650','650','250']"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['100','100','120','120']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="btn-box">
                                <br><a href="#" class="theme-btn btn-style-one"><span class="btn-title"> Read More</span></a>
                            </div>
                        </div>
                    </li>

                    <li data-index="rs-2" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-delay="5000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        
                        <img src="assets/img/bg3.jpg" title="head" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['750','750','750','650']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-80','-80','-100','-100']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <h2 style="color:black;">SIG Hasil Timbang</h2>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['520','520','600','455']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['0','0','0','0']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="text" style="color:black;"><br> adalah sistem informasi yang merekap beberapa data stunting, underweight dan wasting dari beberapa kecamatan yang ada di kabupaten kediri dan sekitarnya dalam bentuk geografis </div>
                        </div>
                        
                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-width="['650','650','650','250']"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['100','100','120','120']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="btn-box">
                                <br><a href="#" class="theme-btn btn-style-one"><span class="btn-title">Read More</span></a>
                            </div>
                        </div>
                    </li>

                    <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-delay="5000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        
                        <img src="assets/img/bg3.png" title="head" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['750','750','750','650']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-80','-80','-100','-100']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <h2>SIG Hasil Timbang</h2>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['520','520','600','455']"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['0','0','0','0']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="text"><br> adalah sistem informasi yang merekap beberapa data stunting, underweight dan wasting dari beberapa kecamatan yang ada di kabupaten kediri dan sekitarnya dalam bentuk geografis</div>
                        </div>
                        
                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[15,15,15,15]"
                        data-paddingright="[15,15,15,15]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-width="['650','650','650','250']"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['100','100','120','120']"
                        data-x="['left','left','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <div class="btn-box">
                                <br><a href="#" class="theme-btn btn-style-one "><span class="btn-title">Read More</span></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

   
    <!-- <section class="top-features" style="background-image: url(assets/front/images/background/5.jpg);">
        <div class="auto-container">
            <div class="row">

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-online-shopping" style="color:#3B7EFF;"></span>
                        <h4>Pendek (stunting)</h4>
                        <p style="text-align:justify;"> merupakan klasifikasi dari indikator status gizi TB/U. Anak yang dikatakan stunting yakni mereka yang memiliki tinggi badan tidak sesuai dengan umurnya. </p>
                    </div>
                </div>

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-speech-bubble" style="color:#3B7EFF;"></span>
                        <h4>Berat kurang (underweight)</h4>
                        <p style="text-align:justify;"> merupakan klasifikasi dari status gizi BB/U. BB/U menunjukkan pertumbuhan berat badan anak terhadap umurnya, apakah sesuai atau tidak.</p>
                    </div>
                </div>


                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-box" style="color:#3B7EFF;"></span>
                        <h4>Kurus (wasting)</h4>
                        <p>innovations</p>
                    </div>
                </div>

            
            </div>
        </div>
    </section> -->

    <!-- Services Section Three -->
    <section class="services-section">
        <div class="auto-container">
            <div class="row">
                <div class="text-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">            
                        <div class="sec-title">
                            <span class="sub-title">Kesehatan</span>
                            <h3>Mengenal Berbagai Jenis Status Gizi</h3>
                            
                        </div>
                        <p style="text-align:justify;">Sebagian besar dari Anda mungkin mengetahui jika tubuh seseorang gemuk, kurus, atau normal. Tetapi, lebih jauh dari itu, badan kesehatan dunia WHO telah mengklasifikasikan status gizi seseorang berdasarkan tinggi badan, berat badan, dan usia.</p>
                        <br>
                        <div class="text"><strong>Apa itu status gizi?</strong></div>
                        <p style="text-align: justify;">
                            Setiap orang pasti mendambakan status gizinya normal, mempunyai berat badan ideal serta tinggi badannya. Status gizi normal menunjukkan Anda mempunyai status kesehatan yang baik dan dapat menurunkan risiko terkena penyakit.
                            <br>
                            Status gizi merupakan kondisi kesehatan yang dipengaruhi oleh asupan zat gizi dan penggunaan zat gizi.

                            Ketika asupan gizi Anda memenuhi kebutuhan, Anda akan mempunyai status gizi yang baik. Namun, ketika asupan gizi Anda kurang atau berlebihan, hal ini akan menimbulkan ketidakseimbangan dalam tubuh Anda.
                        </p>
                        <!-- <a href="#" class="theme-btn icon-btn-two"><span>Read More</span></a> -->
                    </div>
                </div>

                <div class="column col-lg-7 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- Service Block -->
                            <div class="service-block">
                                <div class="inner-box">
                                    <!-- <div class="hover_layer" style="background-image: url(assets/front/images/resource/service_bg_1.jpg);"></div> -->
                                    <div class="hover_layer"></div>
                                    <span class="icon"><img src="assets/front/images/icons/service_icon_1.png" alt=""></span>
                                    <h3>Pendek (stunting)</h3>
                                    <div class="text" style="text-align:justify;">
                                        merupakan klasifikasi dari indikator status gizi TB/U. Anak yang dikatakan stunting yakni mereka yang memiliki tinggi badan tidak sesuai dengan umurnya.
                                    </div>
                                    <a href="#" class="overlay-link"></a>
                                </div>
                            </div>

                            <!-- Service Block -->
                            <div class="service-block">
                                <div class="inner-box">
                                    <div class="hover_layer"></div>
                                    <span class="icon"><img src="assets/front/images/icons/service_icon_3.png" alt=""></span>
                                    <h3>Berat kurang (underweight)</h3>
                                    <div class="text" style="text-align:justify;">
                                        Jika berat badan anak di bawah rata-rata anak seusianya, anak tersebut dikatakan underweight. Namun, jangan khawatir karena berat badan anak dapat berubah dengan mudah.
                                    </div>
                                    <a href="#" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <!-- Service Block -->
                            <div class="service-block margin-top-50">
                                <div class="inner-box">
                                    <div class="hover_layer"></div>
                                    <span class="icon"><img src="assets/front/images/icons/service_icon_2.png" alt=""></span>
                                    <h3>Kurus (wasting)</h3>
                                    <div class="text" style="text-align:justify;">merupakan salah satu klasifikasi dari indikator gizi BB/TB. Anak yang dikatakan kurus yaitu mereka dengan berat badan rendah dan tidak sesuai terhadap tinggi badan yang dimilikinya.</div>
                                    <a href="#" class="overlay-link"></a>
                                </div>
                            </div>

                            <!-- <div class="service-block">
                                <div class="inner-box">
                                    <div class="hover_layer" style="background-image: url(assets/front/images/resource/service_bg_4.jpg);"></div>
                                    <span class="icon"><img src="assets/front/images/icons/service_icon_4.png" alt=""></span>
                                    <h3>Kurus (wasting)</h3>
                                    <div class="text">Overview As a global player in the telecoms industry</div>
                                    <a href="#" class="overlay-link"></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section -->

    <!-- <section class="brand-section">
        <div class="upper-banner" style="background-image: url(assets/front/images/background/7.jpg);">
            <div class="auto-container">
                <div class="row">
                    <div class="quot-column col-lg-6 col-md-12 col-sm-12">
                        <blockquote class="quote-style-one">
                            <span class="icon flaticon-cloud"></span>
                            <p><a href="#">Businesses today cross borders and <br> regions, so you need a service provider</a></p>
                        </blockquote>
                    </div>
                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                        <div class="text">Assertively brand ethical meta-services after fully tested customer service. Completely orchestrate intuitive communities through superior markets. Efficiently leverage other’s out-of-the-box.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto-container">
            <div class="brand-block row no-gutters">
                <div class="image-column col-lg-6 col-md-12" style="background-image: url(assets/front/images/background/8.jpg);"></div>
                <div class="content-column col-lg-6 col-md-12">
                    <div class="inner-column">
                        <h3>Authorised Finance Brand</h3>
                        <div class="text">From banking & insurances to wealth management and<br> securitie distribution.</div>
                        <a href="#" class="theme-btn icon-btn-two"><span>Read More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="icon flaticon-team-1"></span>
                <h3>Professionals</h3>
                <div class="text">Businesses today cross borders and regions, so you need a<br> service provider that goes where you are.</div>
            </div>

            <div class="row">
                <div class="team-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="assets/front/images/resource/team-1.jpg" alt=""></a></figure>
                            <ul class="social-links">
                                <li><a href="#"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#"><span class="flaticon-linked-in"></span></a></li>
                                <li><a href="#"><span class="flaticon-vimeo"></span></a></li>
                                <li><a href="#"><span class="flaticon-twitter"></span></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h5 class="name"><a href="#">Katie Hilton</a></h5>
                            <span class="designation">Designer</span>
                        </div>
                    </div>
                </div>

                <div class="team-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="assets/front/images/resource/team-2.jpg" alt=""></a></figure>
                            <ul class="social-links">
                                <li><a href="#"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#"><span class="flaticon-linked-in"></span></a></li>
                                <li><a href="#"><span class="flaticon-vimeo"></span></a></li>
                                <li><a href="#"><span class="flaticon-twitter"></span></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h5 class="name"><a href="#">Alex White</a></h5>
                            <span class="designation">SEO</span>
                        </div>
                    </div>
                </div>

                <div class="team-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="assets/front/images/resource/team-3.jpg" alt=""></a></figure>
                            <ul class="social-links">
                                <li><a href="#"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#"><span class="flaticon-linked-in"></span></a></li>
                                <li><a href="#"><span class="flaticon-vimeo"></span></a></li>
                                <li><a href="#"><span class="flaticon-twitter"></span></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h5 class="name"><a href="#">Emma Forest</a></h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                </div>

                <div class="team-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="assets/front/images/resource/team-4.jpg" alt=""></a></figure>
                            <ul class="social-links">
                                <li><a href="#"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#"><span class="flaticon-linked-in"></span></a></li>
                                <li><a href="#"><span class="flaticon-vimeo"></span></a></li>
                                <li><a href="#"><span class="flaticon-twitter"></span></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h5 class="name"><a href="#">John Miller</a></h5>
                            <span class="designation">Director</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sec-bottom-text">Our Managed IT services will help you succeed. <a href="#">Let’s get started</a></div>

        </div>
    </section>

    <section class="clients-section style-two">
        <div class="auto-container">

            <div class="sponsors-outer">
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/1_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/1.png" alt="">
                        </a>
                    </li>
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/2_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/2.png" alt="">
                        </a>
                    </li>
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/3_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/3.png" alt="">
                        </a>
                    </li>
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/4_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/4.png" alt="">
                        </a>
                    </li>
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/5_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/5.png" alt="">
                        </a>
                    </li>
                    <li class="slide-item">
                        <a href="#">
                            <img src="assets/front/images/clients/6_hover_red.png" alt="" class="hover_img">
                            <img src="assets/front/images/clients/6.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>  -->

    <section class="testimonials-section-two" style="background-image: url(assets/img/bg2.jpg);">
        <div class="auto-container">
            <div class="testimonial-carousel owl-carousel owl-theme" style="color:black;">
                <div class="testimonials-block-two">
                    <div class="inner-box">
                        <span class="icon flaticon-cite" style="color:black;"></span>
                        <!-- <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div> -->
                        <p style="color:black;">Gizi itu penting untuk anak-anak kita. Karena anak-anak harus sehat sejak dalam kandungan
                            
                        </p>
                        <span class="name" style="color:black;">Ir.Joko Widodo, Presiden Republik Indonesia</span>
                    </div>
                </div>

                <div class="testimonials-block-two">
                    <div class="inner-box">
                        <span class="icon flaticon-cite" style="color:black;"></span>
                        <!-- <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div> -->
                        <p style="color:black;">Intervensi gizi sensitif sudah terbukti mampu berkontribusi sampai 70% untuk keberhasilan perbaikakn gizi masyarakat, terutama untuk penurunan angka stunting</p>
                        <span class="name" style="color:black;">dr. Kirana Pritnatasari, MQIH, Dirijen Kesehatan Masyarakat</span>
                    </div>
                </div>

                <div class="testimonials-block-two">
                    <div class="inner-box">
                        <span class="icon flaticon-cite" style="color:black;"></span>
                        <!-- <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div> -->
                        <p style="color:black;">Anak yang memiliki kesehatan memiliki harapan, dan dia yang memiliki harapan memiliki segalanya</p>
                        <span class="name" style="color:black;">Syaifulloh</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- <section class="pricing-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="icon flaticon-dollar"></span>
                <h3>Our Pricing</h3>
                <div class="text">Businesses today cross borders and regions, so you need a <br>service provider that goes where you are.</div>
            </div>

            <div class="row clearfix">
                <div class="pricing-table col-lg-4 col-md-6 col-sm-12" >
                    <div class="inner-box">
                        <div class="table-header">
                            <div class="title">Standard</div>
                        </div>
                        <div class="table-content">
                            <ul>
                                <li>24/7 system monitoring</li>
                                <li>Security management</li>
                                <li>Patch management</li>
                                <li>Remote support</li>
                            </ul>

                            <div class="table-info-wrapper">
                                <div class="price_wrapper">
                                    <i>$</i><span>19<span class="subprice">99</span></span><p>month</p>
                                </div>
                                <a href="#" class="theme-btn icon-btn-two bg_gray"><span>Start Free Trial</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pricing-table tagged col-lg-4 col-md-6 col-sm-12" >
                    <div class="inner-box">
                        <div class="table-header">
                            <div class="title">Most popular</div>
                        </div>
                        <div class="table-content">
                            <ul>
                                <li>Preventive maintenance</li>
                                <li>Asset management</li>
                                <li>Secure cloud backup</li>
                                <li>Server/Network support</li>
                            </ul>
                            <div class="table-info-wrapper">
                                <div class="price_wrapper">
                                    <i>$</i><span>39<span class="subprice">99</span></span><p>month</p>
                                </div>
                                <a href="#" class="theme-btn icon-btn-two"><span>Start Free Trial</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pricing-table col-lg-4 col-md-6 col-sm-12" >
                    <div class="inner-box">
                        <div class="table-header">
                            <div class="title">Speed</div>
                        </div>
                        <div class="table-content">
                            <ul>
                                <li>Reporting</li>
                                <li>Vendor management</li>
                                <li>Virtual CIO (vCIO)</li>
                                <li>Workstation support</li>
                            </ul>
                            <div class="table-info-wrapper">
                                <div class="price_wrapper">
                                    <i>$</i><span>59<span class="subprice">99</span></span><p>month</p>
                                </div>
                                <a href="#" class="theme-btn icon-btn-two bg_gray"><span>Start Free Trial</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  -->
    
@endsection