<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-basic px-2">
                <div class="auth-inner my-2">
                    <!-- Login basic -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="<?= $this->session->userdata('previous_url') ?>" class="brand-logo">
                                <img src="/maps/app-assets/images/logo/logo-mini.png" height="100">
                                <h1 class="brand-text text-primary ms-1 text-center">GASTRO <br>TOUR<br> THAI</h1>
                            </a>

                            <h4 class="card-title mb-1 text-center">
                                โครงงการการบูรณาการระบบสารสนเทศทางภูมิศาสตร์เพื่อยกระดับการท่องเที่ยวเชิงวัฒนธรรมอาหารของประเทศไทย
                                <strong>ยินดีต้อนรับ</strong>
                            </h4>
                            <p class="card-text mb-2">กรุณากรอกอีเมลล์และรหัสผ่านที่ลงทะเบียน หรือ ติดต่อผู้ดูแลระบบ</p>

                            <!-- <form class="auth-login-form mt-2" action="index.html" method="POST">
                                <div class="mb-1">
                                    <label for="login-email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="login-email" name="login-email"
                                        placeholder="john@example.com" aria-describedby="login-email" tabindex="1"
                                        autofocus />
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">Password</label>
                                        <a href="auth-forgot-password-basic.html">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge"
                                            id="login-password" name="login-password" tabindex="2"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="login-password" />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                            </form> -->

                            <div class="container">
                                <?php echo form_open('user/login'); ?>
                                <div class="form-group mb-1">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" value="<?php echo set_value('email'); ?>"
                                        id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <?php echo form_error('email'); ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div> -->
                                <div class="form-group">
                                    <label for="password">Password</label>

                                    <div class="input-group input-group-merge form-password-toggle mb-1">
                                        <input type="password" class="form-control form-control-merge" id="password"
                                            name="password" tabindex="2"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100" tabindex="4">เข้าสู่ระบบ</button>
                                <div class="pt-1">
                                    <?php echo $this->session->flashdata('login_error'); ?>
                                </div>
                                <?php form_close(); ?>
                            </div>

                            <div class=" divider my-2">
                                <div class="divider-text">or</div>
                            </div>

                            <div class="auth-footer-btn d-flex justify-content-center">
                                <a href="#" class="btn btn-facebook">
                                    <i data-feather="facebook"></i>
                                </a>
                                <a href="#" class="btn btn-twitter white">
                                    <i data-feather="twitter"></i>
                                </a>
                                <a href="#" class="btn btn-google">
                                    <i data-feather="mail"></i>
                                </a>
                                <a href="#" class="btn btn-github">
                                    <i data-feather="github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Login basic -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->