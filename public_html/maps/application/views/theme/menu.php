<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="/">
                    <span class="brand-logo">
                        <img src="/maps/app-assets/images/logo/logo-mini.png">
                    </span>
                    <h2 class="brand-text">Gastro-Tour Thai</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Home">หน้าหลัก</span></a>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/gastro"><i data-feather="grid"></i><span
                        class="menu-title text-truncate" data-i18n="Gastro">อาหารพาเที่ยว</span></a>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/map"><i data-feather="map"></i><span
                        class="menu-title text-truncate"
                        data-i18n="Gastronomy Maps">แผนที่ท่องเที่ยวเชิงอาหาร</span></a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/calendar"><i data-feather="calendar"></i><span
                        class="menu-title text-truncate" data-i18n="Culture Calendar">ปฏิทินวัฒนธรรม</span></a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/attraction"><i data-feather="grid"></i><span
                        class="menu-title text-truncate" data-i18n="Attractions">แหล่งท่องเที่ยว</span></a>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href=""><i data-feather="coffee"></i><span
                        class="menu-title text-truncate" data-i18n="Local Foods">อาหารพื้นถิ่น</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center sub-menu" href="/maps/dish"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Food">อาหาร</span></a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center sub-menu" href="/maps/ingredient"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Ingredient">วัตถุดิบ</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/restaurant"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Restaurant">ร้านอาหาร</span></a>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/community"><i data-feather="users"></i><span
                        class="menu-title text-truncate" data-i18n="Community">ชุมชน</span></a>
            </li>


            <li>
                <hr />
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/permission"><i data-feather="shield"></i><span
                        class="menu-title text-truncate" data-i18n="Permission">เงื่อนไขการใช้งาน</span></a>
            </li>


            <!-- <li class="nav-item">
                <a class="d-flex align-items-center" href=""><i data-feather="shield"></i><span
                        class="menu-title text-truncate" data-i18n="Roles &amp; Permission">เงื่อนไขการใช้งาน</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="rule"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Roles">กฏ</span></a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="permission"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Permission">การอนุญาต</span></a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/maps/about"><i data-feather="info"></i><span
                        class="menu-title text-truncate" data-i18n="Contact">ติดต่อโครงการ</span></a>
            </li>

            <?php
            if (@$_SESSION['email']) {
                ?>
                <li>
                    <hr />
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/maps/zone"><i data-feather="wind"></i><span
                            class="menu-title text-truncate" data-i18n="zone">ลุ่มน้ำ/กลุ่ม</span></a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/maps/api"><i data-feather="cloud"></i><span
                            class="menu-title text-truncate" data-i18n="api">API</span></a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/maps/user"><i data-feather="user-check"></i><span
                            class="menu-title text-truncate" data-i18n="user-profile">ผู้ใช้งาน</span></a>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>
</div>

<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="about" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="ติดต่อโครงการ"><i class="ficon" data-feather="message-square"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="calendar" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="ปฏิทินวัฒนธรรม"><i class="ficon" data-feather="calendar"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="attraction" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="แหล่งท่องเที่ยวน่าสนใจ"><i class="ficon text-warning" data-feather="star"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="map" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="แผนที่ท่องเที่ยวเชิงอาหาร"><i class="ficon text-primary" data-feather="map"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
            </li>
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Gastro..." tabindex="-1"
                        data-search="search" />
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-th"></i><span
                        class="selected-language">ภาษาไทย</span></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="#" data-language="th"><i class="flag-icon flag-icon-th"></i>
                        ภาษาไทย</a><a class="dropdown-item" href="#" data-language="en"><i
                            class="flag-icon flag-icon-us"></i> English</a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block">
                <?php
                if (@$_SESSION['email']) {
                    ?>
                    <a class="nav-link nav-link-login" href="logout" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="ออกจากระบบ"><i class=" ficon" data-feather="log-out"></i></a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link nav-link-login" href="login" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="เข้าสู่ระบบ"><i class="ficon" data-feather="log-in"></i></a>
                    <?php
                }
                ?>

            </li>
        </ul>
    </div>
</nav>