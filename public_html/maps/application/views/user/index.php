<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            ผู้ใช้งาน
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>">หน้าหลัก</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">แผนที่</a></li> -->
                                <li class="breadcrumb-item active">ผู้ใช้งาน</li>
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
                        ยินดีต้อนรับ
                        <?= $user->first_name . " " . $user->last_name ?>
                    </h4>

                    <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#editUserModal" id="editUser">
                        แก้ไข
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        Email :
                        <?= $user->email ?>
                        <br>
                        Create :
                        <?= $user->date_added ?>

                    </p>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        ผู้ใช้งาน
                    </h4>
                    <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#addModal">
                        + เพิ่มผู้ใช้งาน
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-datatable">
                        <table class="dt-datatable table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>อีเมล์</th>
                                    <th>ชื่อผู้ใช้งาน</th>
                                    <th>รหัสผ่าน</th>
                                    <th>สร้างเมื่อ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tr>
                                <td colspan="7" class="text-center ">
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
                                    <th></th>
                                    <th>อีเมล์</th>
                                    <th>ชื่อผู้ใช้งาน</th>
                                    <th>รหัสผ่าน</th>
                                    <th>สร้างเมื่อ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

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
                <h1 class="address-title text-center mb-1" id="addNewTitle">เพิ่มผู้ใช้งาน</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    กรุณากรอกข้อมูลผู้ใช้งาน</h3>

                <form id="addNewForm" class="row gy-1 gx-2" onsubmit="return false">
                    <!-- <input type="hidden" name="id_zone" id="id_zone" value=""> -->

                    <div class="col-12">
                        <label class="form-label" for="email">อีเมล์</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="password">รหัสผ่าน</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            required />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="password_confirm">ยืนยันรหัสผ่าน</label>
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control"
                            placeholder="Password" required />
                        <div class="pt-1" id="err_password"></div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="first_name">ชื่อ</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            placeholder="First Name" data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="last_name">สกุล</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"
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
            </div>
        </div>
    </div>
</div>