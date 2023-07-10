<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">แหล่งท่องเที่ยว</h4>

                    <div>
                        <?= anchor(base_url('attraction/create'), '+ เพิ่มแหล่งท่องเที่ยว') ?>
                    </div>
                </div>
                <div class="card-body">


                    <!-- Column Search -->

                    <div class="card-datatable">
                        <table class="dt-attraction table table-responsive">
                            <thead>
                                <tr>
                                    <th>สถานที่ท่องเที่ยว</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>
                                        <?= $item; ?>
                                    </td>
                                    <td>
                                        <?= $item; ?>
                                    </td>

                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>สถานที่ท่องเที่ยว</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    </section>
                    <!--/ Column Search -->

                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>