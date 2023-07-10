<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui" />
    <meta name="description"
        content="การบูรณาการระบบสารสนเทศทางภูมิศาสตร์เพื่อยกระดับการท่องเที่ยวเชิงวัฒนธรรมอาหารของประเทศไทย" />
    <meta name="keywords"
        content="การบูรณาการ,ระบบสารสนเทศ,ภูมิศาสตร์,กระดับการท่องเที่ยว,เชิงวัฒนธรรมอาหาร,ประเทศไทย" />
    <meta name="author" content="LMU Gastro" />
    <title>การบูรณาการระบบสารสนเทศ
        ทางภูมิศาสตร์เพื่อยกระดับการท่องเที่ยว
        เชิงวัฒนธรรมอาหารของประเทศไทย</title>
    <link rel="apple-touch-icon" href="<?= base_url("/app-assets/images/ico/apple-icon-120.png") ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("/app-assets/images/ico/favicon.ico") ?>" />
    <link href="
        https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet" />

    <?php
    // <!-- BEGIN: Vendor CSS-->
    echo link_tag('/app-assets/vendors/css/vendors.min.css');
    echo link_tag('/app-assets/vendors/css/maps/leaflet.min.css');

    echo link_tag('/app-assets/vendors/css/editors/quill/katex.min.css');
    echo link_tag('/app-assets/vendors/css/editors/quill/monokai-sublime.min.css');
    echo link_tag('/app-assets/vendors/css/editors/quill/quill.snow.css');
    echo link_tag('/app-assets/vendors/css/forms/select/select2.min.css');
    echo link_tag('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css');
    echo link_tag('/app-assets/vendors/css/extensions/dragula.min.css');
    echo link_tag('/app-assets/vendors/css/extensions/toastr.min.css');
    // <!-- END: Vendor CSS-->
    
    // <!-- BEGIN: Theme CSS-->
    echo link_tag('/app-assets/css/bootstrap.css');
    echo link_tag('/app-assets/css/bootstrap-extended.css');
    echo link_tag('/app-assets/css/colors.css');
    echo link_tag('/app-assets/css/components.css');
    echo link_tag('/app-assets/css/themes/dark-layout.css');
    echo link_tag('/app-assets/css/themes/bordered-layout.css');
    echo link_tag('/app-assets/css/themes/semi-dark-layout.css');

    // <!-- BEGIN: Page CSS-->
    echo link_tag('/app-assets/css/core/menu/menu-types/vertical-menu.css');
    echo link_tag('/app-assets/css/plugins/maps/map-leaflet.css');

    echo link_tag('/app-assets/css/plugins/forms/form-quill-editor.css');
    echo link_tag('/app-assets/css/plugins/forms/pickers/form-flat-pickr.css');
    echo link_tag('/app-assets/css/plugins/extensions/ext-component-toastr.css');
    echo link_tag('/app-assets/css/plugins/forms/form-validation.css');
    echo link_tag('/app-assets/css/pages/app-todo.css');
    // <!-- END: Page CSS-->
    
    // <!-- BEGIN: Custom CSS-->
    echo link_tag('/assets/css/style.css');
    echo link_tag('/assets/css/leaflet-routing.css');
    // <!-- END: Custom CSS-->
    
    ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed" data-open="click"
    data-menu="vertical-menu-modern" data-col="">