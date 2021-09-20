<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SIG Hasil Timbang</title>

<link rel="shortcut icon" href="assets/front/images/logo-6.png" type="image/x-icon">
<link rel="icon" href="assets/front/images/logo-6.png" type="image/x-icon">

<link href="assets/front/css/bootstrap.css" rel="stylesheet">
<link href="assets/front/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css">
<link href="assets/front/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css">
<link href="assets/front/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
<link href="assets/front/css/style.css" rel="stylesheet">
<link href="assets/front/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="assets/front/js/respond.js"></script><![endif]-->
</head>

<body onload="peta_awal()">

<div class="page-wrapper">
    
    <header class="main-header header-style-two">
        
        <!-- <div class="header-top">
            <div class="inner-container">
                <div class="top-left">
                    <div class="service-num">
                        <a href="tel:733255488"><i class="fa fa-phone"></i> 733 255 - 488</a>
                        <div class="text">Call us for any question or concern</div>
                    </div>
                </div>
                <div class="top-right">
                    <ul class="contact-list">
                        <li><a href="#"><i class="fa fa-envelope"></i>info@company.com</a></li>
                        <li><i class="fa fa-map-marker-alt"></i>121 King Street, Melbourne, Australia</li>
                    </ul>
                </div>
            </div>
        </div> -->

        <!-- Main box -->
        <div class="main-box">
            <div class="auto-container">
                <div class="menu-box">
                    <div class="logo"><a href="/" style="font-weight: bold;font-size: 20px;"><img src="assets/front/images/logo-6.png" alt="" title=""> SIG Hasil Timbang</a></div>

                    @yield('menu')

                    <div class="outer-box">

                        <!-- <div class="service_wrapper">
                            <span class="icon flaticon-whatsapp"></span> 
                            <p>Have Any Questions?</p>
                            <h4>0712 819 79 555</h4>
                        </div> -->

                        <!-- Search Btn -->
                        <div class="search-box">
                            <a href="/login" style="color: #3B7EFF;"><i class="fa fa-sign-in-alt" style="font-size:23px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="main-box">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="index.html"><img src="assets/front/images/logo-5.png" alt="" title="" ></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>

        <!-- Mobile Sticky Header -->
        <div class="mobile-sticky-header">
            <div class="logo"><a href="index.html"><img src="assets/front/images/logo-5.png" alt="" title="" ></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>

        
        <div class="mobile-menu">
            <span class="mobile-menu-back-drop"></span>
            <div class="menu-outer">
                <nav class="menu-box">
                    <div class="nav-logo">
                        <a href="/"><img src="assets/front/images/logo-5.png" alt="" title="" ></a>
                    </div>
                </nav>

                <div class="menu-search">
                    <a href="/login" style="font-family: Poppins;font-size: 17px;color: black;padding-left: 15px;"> Login </a>
                    <hr>
                </div>
            </div>
        </div>

        
        <!-- <div class="search-popup">
            <span class="search-back-drop"></span>
            
            <div class="search-inner">
                <div class="auto-container">
                    <div class="upper-text">
                        <div class="text">Search for anything.</div>
                        <button class="close-search"><span class="fa fa-times"></span></button>
                    </div>

                    <form method="post" action="/login">
                            <a type="submit" style="font-family: Poppins;"><i class="fa fa-search"></i> Login</a>
                    </form>
                </div>
            </div>
        </div> -->
        
    </header>
    <!--End Main Header -->



    @yield('content')

    <br>

    <!-- Main Footer -->
    <footer class="main-footer style-two">
        <!-- <div class="auto-container">
            <div class="widgets-section">
                <div class="row">
                    <div class="big-column col-xl-8 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="footer-column col-lg-3 col-md-12 col-sm-12">
                                <div class="logo"><a href="#"><img src="assets/front/images/logo-5.png" alt=""></a></div>
                            </div>

                            <div class="footer-column col-lg-3 col-md-4 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Quick Links</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="#">Creativity</a></li>
                                            <li><a href="#">News</a></li>
                                            <li><a href="#">Updates</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-column col-lg-3 col-md-4 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Page Links</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-column col-lg-3 col-md-4 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Page Links</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="#">Cloud Services</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="big-column col-xl-4 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="footer-column col-lg-12 col-md-12 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Subscribe</h2>
                                    <div class="widget-content">
                                        <div class="newsletter-form">
                                            <form method="post" action="#" id="subscribe-form">
                                                <div class="form-group"><div class="response"></div></div>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="email" value="" placeholder="Enter your email address.." required>
                                                    <button type="button" id="subscribe-newslatters" class="theme-btn"><i class="flaticon-arrow-pointing-to-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="call-us">
                <div class="service-num"><a href="#"><i class="fa fa-phone"></i>800 565 457</a></div>
                <div class="social-link">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </div> -->
        

        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text">© 2020 We believe that designing products and services in close partnership with our clients is the only way to have a real impact on their business.</div>
            </div>
        </div>
        
    </footer>

</div><!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-arrow-up"></span></div>

<script src="assets/front/js/jquery.js"></script> 
<script src="assets/front/js/popper.min.js"></script>
<script src="assets/front/js/bootstrap.min.js"></script>
<!--Revolution Slider-->
<script src="assets/front/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/front/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/front/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="assets/front/js/main-slider-script.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.jss"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.js.map"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js.map"></script>
<!--Revolution Slider-->
<script src="assets/front/js/jquery.fancybox.js"></script>
<script src="assets/front/js/owl.js"></script>
<script src="assets/front/js/wow.js"></script>
<script src="assets/front/js/appear.js"></script>
<script src="assets/front/js/script.js"></script>
<script>

    $(function() {
        $('#bln').show();
        $('#thn').show();
        $('#per').change(function(){
                if($('#per').val() == 'Bulan') {
                    $('#bln').show();
                    $('#thn').show();
                } else if($('#per').val() == 'Tahun') {
                    $('#bln').hide();
                    $('#thn').show();
                }
            });

        });
        
    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>


</body>
</html>