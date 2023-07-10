<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            แผนที่ท่องเที่ยวเชิงอาหาร
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>">หน้าหลัก</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">แผนที่</a></li> -->
                                <li class="breadcrumb-item active">แผนที่ท่องเที่ยวเชิงอาหาร</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none"></div>
        </div>

        <div class="content-body">
            <div class="todo-application">
                <div class="header-navbar-shadow"></div>
                <div class="content-area-wrapper container-xxl p-0">

                    <div class="sidebar-left">
                        <div class="sidebar">
                            <div class="sidebar-content todo-sidebar">
                                <div class="content-wrapper container-xxl p-0">
                                    <div class="content-header row">
                                    </div>
                                    <div class="content-body">
                                        <div class="body-content-overlay"></div>
                                        <div class="todo-app-list">
                                            <div class="leaflet-map" id="layer-control-map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="content-wrapper container-xxl p-0">
                            <div class="content-header row">
                            </div>
                            <div class="content-body">
                                <div class="body-content-overlay"></div>
                                <div class="todo-app-list">
                                    <!-- Todo search starts -->
                                    <div class="app-fixed-search d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none ms-1">
                                            <i data-feather="menu" class="font-medium-5"></i>
                                        </div>
                                        <div class="d-flex align-content-center justify-content-between w-100">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="search"
                                                        class="text-muted"></i></span>
                                                <input type="text" class="form-control" id="todo-search"
                                                    placeholder="ค้นหา" aria-label="Search..."
                                                    aria-describedby="todo-search" />
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle hide-arrow me-1" id="todoActions"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="todoActions">
                                                <a class="dropdown-item sort-asc" href="#">Sort A - Z</a>
                                                <a class="dropdown-item sort-desc" href="#">Sort Z - A</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Todo search ends -->

                                    <!-- Todo List starts -->
                                    <div class="todo-task-list-wrapper list-group">
                                        <ul class="todo-task-list media-list" id="todo-task-list">
                                        </ul>
                                        <div class="no-results">
                                            <h5>No Items Found</h5>
                                        </div>
                                    </div>
                                    <!-- Todo List ends -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>