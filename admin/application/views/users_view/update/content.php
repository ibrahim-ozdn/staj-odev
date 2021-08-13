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
        <form action="<?php echo base_url("users/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                <div class="col-md-3">
                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/pages/profile-picture"); ?>
                </div>
                <div class="col-md-9">
                    <label class="mt-3"><b>Profile Information</b></label><hr>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="full_name"
                            placeholder="Enter Email"
                            value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name ; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("full_name"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" 
                            class="form-control" 
                            placeholder="Enter Email"
                            name="email"
                            value="<?php echo isset($form_error) ? set_value("email") : $item->email ; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("email"); ?></small>
                            <?php } ?>
                    </div>
                    <button class="btn btn-indigo mt-3 float-right">Save Changes</button>
                    <a href="<?php echo base_url("users/update_password_form/$item->id"); ?>" 
                        class="btn btn-link text-danger mt-3 ml-2 float-right">Change Password
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>