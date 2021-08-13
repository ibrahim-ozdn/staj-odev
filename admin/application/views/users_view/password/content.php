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
        <form action="<?php echo base_url("users/update_password/$item->id"); ?>" method="post">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" 
                            class="form-control" 
                            name="password"
                            placeholder="Enter Password"
                            value="<?php echo isset($form_error) ? set_value("password") : ""; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("password"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>New Password Again</label>
                        <input type="password" 
                            class="form-control" 
                            placeholder="Enter Password Again"
                            name="re_password"
                            value="<?php echo isset($form_error) ? set_value("re_password") : ""; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("re_password"); ?></small>
                            <?php } ?>
                    </div>
                    <button class="btn btn-indigo mt-3 float-right">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>