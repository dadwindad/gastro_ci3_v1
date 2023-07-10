<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover, user-scalable=no" />
    <title>ระบบภูมิสารสนเทศท่องเที่ยวเชิงอาหาร :: GASTRO-Tour Thai</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/custom.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css" />
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo-mini.png" />

    <link rel="stylesheet" type="text/css" href="styles/leaflet/leaflet.min.css">
    <link rel="stylesheet" type="text/css" href="styles/leaflet/map-leaflet.min.css">
    <link rel="stylesheet" type="text/css" href="styles/leaflet/leaflet-routing.css">

</head>

<body class="theme-light" data-highlight="blue2">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">
        <!-- header and footer bar go here-->
        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="#" data-back-button class="header-title header-subtitle">หน้าหลัก</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
            <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        </div>

        <div id="footer-bar" class="footer-bar-5">
            <a href="gastro-map.php" class="active-nav"><i data-feather="coffee" data-feather-line="1"
                    data-feather-size="21" data-feather-color="red2-dark"
                    data-feather-bg="red2-fade-light"></i><span>GASTRO Map</span></a>
            <a href="index.html"><i data-feather="home" data-feather-line="1" data-feather-size="21"
                    data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i><span>Home</span></a>
            <a href="culture-map.php"><i data-feather="map-pin" data-feather-line="1" data-feather-size="21"
                    data-feather-color="green1-dark" data-feather-bg="green1-fade-light"></i><span>Culture
                    Map</span></a>

            <a href="index-settings.html"><i data-feather="settings" data-feather-line="1" data-feather-size="21"
                    data-feather-color="gray2-dark" data-feather-bg="gray2-fade-light"></i><span>Settings</span></a>
        </div>

        <div class="page-content" style="min-height: 60vh !important">
            <div class="page-title page-title-small">
                <h2>
                    <a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>แผนที่ท่องเที่ยวเชิงอาหาร
                </h2>
                <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img"
                    data-src="images/logo-mini.png"></a>
            </div>
            <div class="card header-card shape-rounded" data-card-height="150">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/logo-mini.png"></div>
            </div>

            <div class="card card-style">
                <div class="content">
                    <p>
                        เยี่ยมชมแหล่งท่องเที่ยวที่เป็นแหล่ง ผลิตอาหาร เทศกาลอาหาร
                        ร้านอาหาร ผสมผสานการเชื่อมโยงวัฒนธรรม <br>
                        <span class="text-primary"> (หากข้อมูลไม่แสดงผล ลากนี้วจากบนลงล่างเพื่อเรียกข้อมูล)</span>
                    </p>
                    <!-- <p class="location-support mt-n3"></p> -->
                </div>
            </div>
            <div class="card card-style">
                <div class="content">
                    <h3 class="font-700">เลือกสิ่งที่สนใจ</h3>

                    <div id="gastro">
                        <div class="input-style input-style-2 input-required">
                            <span>ภูมิภาค</span>
                            <em><i class="fa fa-angle-down"></i></em>
                            <select class="form-control" id="sel_region">
                                <option value="default" selected>
                                    เลือกทั้งหมด
                                </option>
                            </select>
                        </div>

                        <div class="input-style input-style-2 input-required">
                            <span>จังหวัด</span>
                            <em><i class="fa fa-angle-down"></i></em>
                            <select class="form-control" id="sel_province">
                                <option value="default" selected>
                                    เลือกทั้งหมด
                                </option>
                            </select>
                        </div>

                        <div class="input-style input-style-2 input-required">
                            <span>ประเภทอาหาร</span>
                            <em><i class="fa fa-angle-down"></i></em>
                            <select class="form-control" id="sel_food_type">
                                <option value="default" selected>
                                    เลือกทั้งหมด
                                </option>
                            </select>
                        </div>

                        <div class="input-style input-style-2 input-required">
                            <span>ร้านอาหาร</span>
                            <em><i class="fa fa-angle-down"></i></em>
                            <select class="form-control" id="sel_restaurant">
                                <option value="default" selected>
                                    เลือกทั้งหมด
                                </option>
                            </select>
                        </div>

                        <div class="pb-3">
                            <a href="" onclick='location.reload(true); return false;'
                                class="btn btn-full btn-m bg-red2-dark rounded-sm text-uppercase shadow-l font-900">ล้างค่า</a>
                        </div>
                        <div class="leaflet-map" id="layer-control-map"></div>

                    </div>
                </div>
            </div>

            <!-- footer and footer card-->
            <!-- <div class="footer" data-menu-load="menu-footer.html"></div> -->
        </div>
        <!-- end of page content-->

        <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html"
            data-menu-height="420" data-menu-effect="menu-over"></div>

        <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached rounded-m"
            data-menu-load="menu-colors.html" data-menu-height="510" data-menu-effect="menu-over"></div>
        type="text/javascript"
        <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260"
            data-menu-load="menu-main.html" data-menu-active="nav-features" data-menu-effect="menu-over"></div>

        <div id="menu-cookie-bottom" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="230"
            data-menu-effect="menu-over" data-menu-select="page-components">
            <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
            <div class="boxed-text-xl">
                <h2 class="text-center mt-3 pt-1">We're using cookies</h2>
                <p class="text-center mt-n2 mb-3 color-highlight">
                    To make your experience awesome!
                </p>
                <p>
                    Our page uses cookies to make your overall experience better, faster
                    and smoother. It's awesome.
                </p>
                <!-- add hide-cookie to the class to delete the cookie-->
                <a href="#"
                    class="close-menu btn btn-sm btn-center-xl rounded-xs shadow-m bg-highlight text-uppercase font-900">Accept</a>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div id="modal-info" class="menu menu-box-modal rounded-m" data-menu-width="310">
        <h1 id="modal-info-title" class="text-center mt-3 font-700">All's Good</h1>
        <p id="modal-info-content" class="boxed-text-l">
            You can continue with your previous actions.<br />
            Easy to attach these to success calls.
        </p>
        <div class="row mr-3 ml-3 mb-3">
            <div class="col-6">
                <a id="modal-info-add-route" href="#"
                    class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">เดินทาง</a>
            </div>
            <div class="col-6">
                <a id="modal-info-more" href="#" target="_blank"
                    class="btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-blue1-dark">เพิ่มเติม</a>
            </div>
        </div>
    </div>


    <!-- ////////// -->
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>

    <script type="text/javascript" src="scripts/leaflet/leaflet.min.js"></script>
    <script type="text/javascript" src="scripts/leaflet/leaflet-routing-machine.min.js"></script>

    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>