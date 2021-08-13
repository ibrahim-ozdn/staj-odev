<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-4 fw-bold"><?php echo $pageTitle; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <form action="<?php echo base_url("settings/save"); ?>" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                  <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <div class="nav flex-column nav-pills nav-primary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Website Informations</a>
                                        <a class="nav-link" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address" role="tab" aria-controls="v-pills-address" aria-selected="false">Address Settings</a>
                                        <a class="nav-link" id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo" aria-selected="false">Logo Settings</a>
                                        <a class="nav-link" id="v-pills-footer-tab" data-toggle="pill" href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="false">Footer Settings</a>
                                    </div>
                                </div>
                                <div class="col-7 col-md-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <?php $this->load->view("$viewFolder/$subViewFolder/pages/home-tab"); ?>
                                        <?php $this->load->view("$viewFolder/$subViewFolder/pages/address-tab"); ?>
                                        <?php $this->load->view("$viewFolder/$subViewFolder/pages/logo-tab"); ?>
                                        <?php $this->load->view("$viewFolder/$subViewFolder/pages/footer-tab"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-indigo mt-3">Submit</button>
        </form>
    </div>
</div>

