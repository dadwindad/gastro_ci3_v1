<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ร้านอาหาร</h4>
                    <?php
                    if (@$_SESSION['email']) {
                        ?>
                        <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#addNewForm">
                            + เพิ่มร้านอาหาร
                        </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <!-- Column Search -->

                    <div class="card-datatable">
                        <table class="dt-restaurant table table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th></th>
                                    <th>ร้านอาหาร</th>
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
                                    <th>No.</th>
                                    <th></th>
                                    <th>ร้านอาหาร</th>
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
<div class="modal fade" id="addNewForm" tabindex="-1" aria-labelledby="addNewTitle" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewTitle">เพิ่มร้านอาหาร</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลร้านอาหาร</h3>

                <form id="addNewAddressForm" class="row gy-1 gx-2" onsubmit="return false">
                    <input name="rest_id" id="rest_id" type="hidden" value="">

                    <div class="col-12">
                        <label class="form-label" for="rest_zone">กลุ่ม / ลุ่มน้ำ</label>
                        <select class="select2 form-select" id="rest_zone" name="rest_zone">
                            <option value="#" label="-- กรุณาเลือก --"></option>
                            <?php foreach ($zone as $item) { ?>
                                <option value="<?= $item->id_zone ?>">
                                    <?= $item->zone_name_thai ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="rest_name_thai">ชื่อร้านอาหาร</label>
                        <input type="text" id="rest_name_thai" name="rest_name_thai" class="form-control"
                            placeholder="Arraction Name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="rest_highlight">รายละเอียด</label>
                        <textarea id="rest_highlight" name="rest_highlight" class="form-control"
                            placeholder="Highlight"></textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="rest_lat">ละติจูด</label>
                        <input type="text" id="rest_lat" name="rest_lat" class="form-control" placeholder="Latitude"
                            data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="rest_long">ลองกิจูด</label>
                        <input type="text" id="rest_long" name="rest_long" class="form-control" placeholder="Longitude"
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
                <h1 class="address-title text-center mb-1" id="addNewTitle">แก้ไขร้านอาหาร</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลร้านอาหาร</h3>

                <form id="editNewForm" class="row gy-1 gx-2" onsubmit="return false">
                    <input name="rest_id" id="ed_rest_id" type="hidden" value="">

                    <div class="col-12">
                        <label class="form-label" for="ed_rest_zone">กลุ่ม / ลุ่มน้ำ</label>
                        <select class="select2 form-select" id="ed_rest_zone" name="rest_zone" disabled>
                            <option value="#" label="-- กรุณาเลือก --"></option>
                            <?php foreach ($zone as $item) { ?>
                                <option value="<?= $item->id_zone ?>">
                                    <?= $item->zone_name_thai ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ed_rest_name_thai">ชื่อร้านอาหาร</label>
                        <input type="text" id="ed_rest_name_thai" name="rest_name_thai" class="form-control"
                            placeholder="Arraction Name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ed_rest_highlight">รายละเอียด</label>
                        <textarea id="ed_rest_highlight" name="rest_highlight" class="form-control"
                            placeholder="Highlight"></textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="ed_rest_lat">ละติจูด</label>
                        <input type="text" id="ed_rest_lat" name="rest_lat" class="form-control" placeholder="Latitude"
                            data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="ed_rest_long">ลองกิจูด</label>
                        <input type="text" id="ed_rest_long" name="rest_long" class="form-control"
                            placeholder="Longitude" data-msg="Please enter your last name" />
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