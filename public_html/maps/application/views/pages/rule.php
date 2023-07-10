<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rules</h4>

                    <div>
                        <?= anchor(base_url('blog/comments'), 'Click Here') ?>
                    </div>
                </div>
                <div class="card-body">

                    <?php
                    echo "<pre>";
                    print_r(get_loaded_extensions());
                    echo "<pre/>";


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>