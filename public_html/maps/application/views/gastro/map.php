<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            อาหารพาเที่ยว
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>">หน้าหลัก</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">แผนที่</a></li> -->
                                <li class="breadcrumb-item active">อาหารพาเที่ยว</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none"></div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="region">1. ภูมิภาค</label>
                                            <select class="select2 form-select" name="region" id="region">
                                                <option value="#">- เลือกทั้งหมด -</option>
                                                <!-- <?php foreach ($region as $item) { ?>
                                                <option>
                                                    <?= $item->dish_region ?>
                                                </option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="province">2. จังหวัด</label>
                                            <select class="select2 form-select" name="province" id="province">
                                                <option value="#">- เลือกทั้งหมด -</option>
                                                <!-- <?php foreach ($province as $item) { ?>
                                                <option>
                                                    <?= $item->rest_province ?>
                                                </option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="food-type">3. ประเภทอาหาร</label>
                                            <select class="select2 form-select" name="food-type" id="food-type">
                                                <option value="#">- เลือกทั้งหมด -</option>
                                                <!-- <?php foreach ($food as $item) { ?>
                                                <option value="<?= $item->dish_food_type ?>">
                                                    <?= $item->dish_food_type ?></option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="restaurant">4. ร้านอาหาร</label>
                                            <select class="select2 form-select" name="restaurant" id="restaurant">
                                                <option value="#">- เลือกทั้งหมด -</option>
                                                <!-- <?php foreach ($rest as $item) { ?>
                                                <option>
                                                    <?= $item->rest_name_thai ?>
                                                </option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="attraction">5. สถานที่ท่องเที่ยว</label>
                                            <select class="select2 form-select" name="attraction" id="attraction">
                                                <option value="#">- เลือกทั้งหมด -</option>
                                                <!-- <?php foreach ($attr as $item) { ?>
                                                <option value="<?= $item->attr_name ?>"><?= $item->attr_name ?></option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mt-2 d-flex gap-2">
                                            <button type="button" id="btn_reset"
                                                class="btn btn-danger mr-1 waves-effect waves-float waves-light w50p">ล้างค่า</button>

                                            <button type="button" id="btn_info" data-bs-toggle="modal"
                                                data-bs-target="#infoModal"
                                                class="btn btn-info mr-5 waves-effect waves-float waves-light w50p">คู่มือการใช้งาน</button>

                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="leaflet-map" id="layer-control-map"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<!-- modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="addNewTitle" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewTitle">คู่มือการใช้งาน</h1>
                <h3 id="id_title" data-zoneid="" class="address-subtitle text-center mb-2 pb-75">
                    แผนที่อาหารพาเที่ยว</h3>

                <div class="col-12">
                    <p> การใช้งานที่ถูกต้อง<br>
                        1.เลือกหมวดหมู่ที่ต้องการกรองข้อมูล ตามลำดับเลขที่เล็กไปใหญ่ เช่น 1 >> 2 หรือ
                        2 >> 3 >> 4<br>
                        2. ในกรณีต้องการเลือกหัวข้อ 3 แล้วเลือกหมวดหมู่ที่ 2 (หมวดหมู่ใหญ่ไปเล็ก)) ทำการกดล้างค่าก่อน
                        แล้วดำเนินตามข้อ 1 ในกรณีนี้ให้เลือกหมวดหมู่ 2 >> 3<br>
                        <hr>
                        ข้อควรระวัง : หากต้องการเริ่มต้นการรองให้กด "ล้างค่า" เสมอ
                    </p>

                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-success mt-2" data-bs-dismiss="modal" aria-label="Close">
                        ปิด
                    </button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>