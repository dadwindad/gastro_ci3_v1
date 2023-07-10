<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            API
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>">หน้าหลัก</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">แผนที่</a></li> -->
                                <li class="breadcrumb-item active">API</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none"></div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <strong> Base URL :</strong>
                        <?= base_url() ?>
                        <br>
                        <strong>Token :</strong> $2y$10$UwwCn/1I/LuuBVwgkbt5a.dPhHfN6FmjJzSDH9uigT7.3X46YdmlK <br>

                    </h4>
                </div>
                <div class="card-body">

                    <!-- Column Search -->
                    <div class="card-datatable">
                        <table class="dt-datatable table table-responsive">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Path</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GET</td>
                                    <td>/zone/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/zone/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/zone/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/attraction/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/attraction/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/attraction/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/dish/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/dish/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/dish/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/ingredient/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/ingredient/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/ingredient/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/community/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/community/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/community/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/community/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/community/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/community/delete/$1</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td>/user/json</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td>/user/store</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td>/user/delete/$1</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Path</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!--/ Column Search -->

                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>