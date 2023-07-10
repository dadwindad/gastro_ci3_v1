<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ชุมชน</h4>
                    <?php
                    if (@$_SESSION['email']) {
                        ?>
                        <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#addModal">
                            + เพิ่มชุมชน
                        </div>

                        <?php
                    }
                    ?>

                </div>
                <div class="card-body">
                    <!-- Column Search -->

                    <div class="card-datatable">
                        <table class="dt-datatable table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>ชุมชน</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                    <?php
                                    if (@$_SESSION['email']) {
                                        ?>
                                        <th></th>
                                        <th></th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center ">
                                        <div class="d-flex justify-content-center">
                                            <!-- <div class="loader"></div> -->
                                            <!-- <div class="lds-dual-ring"></div> -->
                                            <div class="lds-ripple">
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        กำลังเรียกข้อมูล ...
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>ชุมชน</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                    <?php
                                    if (@$_SESSION['email']) {
                                        ?>
                                        <th></th>
                                        <th></th>
                                        <?php
                                    }
                                    ?>
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


<!-- add new modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addNewTitle" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewTitle">เพิ่มแหล่งชุมชน</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลแหล่งชุมชน</h3>

                <form id="addNewForm" class="row gy-1 gx-2" onsubmit="return false">
                    <input name="comm_id" id="comm_id" type="hidden" value="">
                    <div class="col-12">
                        <label class="form-label" for="comm_zone">กลุ่ม / ลุ่มน้ำ</label>
                        <select class="select2 form-select" id="comm_zone" name="comm_zone" required>
                            <option value="#" label="-- กรุณาเลือก --"></option>
                            <?php foreach ($zone as $item) { ?>
                                <option value="<?= $item->id_zone ?>"><?= $item->zone_name_thai ?> </option>
                            <?php }
                            ?>

                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="comm_name">ชื่อชุมชน</label>
                        <input type="text" id="comm_name" name="comm_name" class="form-control"
                            placeholder="Arraction Name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="comm_detail">รายละเอียด</label>
                        <textarea id="comm_detail" name="comm_detail" class="form-control"
                            placeholder="Highlight"></textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="comm_lat">ละติจูด</label>
                        <input type="text" id="comm_lat" name="comm_lat" class="form-control" placeholder="Latitude"
                            data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="comm_long">ลองกิจูด</label>
                        <input type="text" id="comm_long" name="comm_long" class="form-control" placeholder="Longitude"
                            data-msg="Please enter your last name" />
                    </div>

                    <div class="col-12 text-center">
                        <button id="btn_addNew" type="submit" class="btn btn-primary me-1 mt-2">บันทึก</button>
                        <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            ยกเลิก
                        </button>
                    </div>
                </form>

                <!-- limit file upload starts -->
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                                <h4 class="card-title">ไฟล์ jpg ขนาดไม่เกิน 500kb</h4>
                            </div> -->
                        <div class="card-body">
                            <p class="card-text">
                                ไฟล์ jpg ขนาดไม่เกิน 2MB จำนวน 4 รูป
                            </p>
                            <form action="#" class="dropzone dropzone-area" id="dpz-file-limits">
                                <div class="dz-message">วางไฟล์ที่นี่</div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- limit file upload ends -->

            </div>
        </div>
    </div>
</div>


<!-- update new modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addNewTitle" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewTitle">แก้ไขแหล่งชุมชน</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลแหล่งชุมชน</h3>

                <form id="editNewForm" class="row gy-1 gx-2" onsubmit="return false">
                    <input name="comm_id" id="ed_comm_id" type="hidden" value="">
                    <div class="col-12">
                        <label class="form-label" for="comm_zone">กลุ่ม / ลุ่มน้ำ</label>
                        <select class="select2 form-select" id="ed_comm_zone" name="comm_zone" disabled>
                            <option value="#" label="-- กรุณาเลือก --"></option>
                            <?php foreach ($zone as $item) { ?>
                                <option value="<?= $item->id_zone ?>">
                                    <?= $item->zone_name_thai ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="comm_name">ชื่อชุมชน</label>
                        <input type="text" id="ed_comm_name" name="comm_name" class="form-control"
                            placeholder="Arraction Name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="comm_detail">รายละเอียด</label>
                        <textarea id="ed_comm_detail" name="comm_detail" class="form-control"
                            placeholder="Highlight"></textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="comm_lat">ละติจูด</label>
                        <input type="text" id="ed_comm_lat" name="comm_lat" class="form-control" placeholder="Latitude"
                            data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="comm_long">ลองกิจูด</label>
                        <input type="text" id="ed_comm_long" name="comm_long" class="form-control"
                            placeholder="Longitude" data-msg="Please enter your last name" />
                    </div>

                    <div class="col-12 text-center">
                        <button id="btn_editNew" type="submit" class="btn btn-primary me-1 mt-2">บันทึก</button>
                        <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                            aria-label="Close">ยกเลิก</button>
                    </div>
                </form>

                <!-- limit file upload starts -->
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                                <h4 class="card-title">ไฟล์ jpg ขนาดไม่เกิน 500kb</h4>
                            </div> -->
                        <div class="card-body">
                            <p class="card-text">
                                ไฟล์ jpg ขนาดไม่เกิน 2MB จำนวน 4 รูป
                            </p>
                            <form action="#" class="dropzone dropzone-area" id="ed_dpz-file-limits">
                                <div class="dz-message">วางไฟล์ที่นี่</div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- limit file upload ends -->

            </div>
        </div>
    </div>
</div>