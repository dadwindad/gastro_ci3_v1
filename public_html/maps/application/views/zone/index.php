<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ลุ่มน้ำ/กลุ่ม</h4>

                    <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#addModal">
                        + เพิ่มลุ่มน้ำ/กลุ่ม
                    </div>

                </div>
                <div class="card-body">
                    <!-- Column Search -->
                    <div class="card-datatable">
                        <table class="dt-datatable table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ลุ่มน้ำ/กลุ่ม</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tr>
                                <td colspan="4" class="text-center ">
                                    <div class="d-flex justify-content-center">
                                        <div class="lds-ripple">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    กำลังเรียกข้อมูล ...
                                </td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>ลุ่มน้ำ/กลุ่ม</th>
                                    <th></th>
                                    <th></th>
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

<!-- add new modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addNewTitle" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewTitle">เพิ่มลุ่มน้ำ/กลุ่ม</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลลุ่มน้ำ/กลุ่ม</h3>

                <form id="addNewForm" class="row gy-1 gx-2" onsubmit="return false">
                    <input type="hidden" name="id_zone" id="id_zone" value="">

                    <div class="col-12">
                        <label class="form-label" for="zone_name">ชื่อลุ่มน้ำ/กลุ่ม</label>
                        <input type="text" id="zone_name" name="zone_name" class="form-control"
                            placeholder="Zone Name" />
                    </div>

                    <div class="col-12 text-center">
                        <button id="btn_addNew" type="submit" class="btn btn-primary me-1 mt-2">บันทึก</button>
                        <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            ยกเลิก
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>