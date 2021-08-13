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
        <form action="<?php echo base_url("emailsettings/update/$item->id"); ?>" method="post">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Protocol</label>
                        <input type="text" 
                            class="form-control" 
                            name="protocol"
                            placeholder="Enter Protocol"
                            value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("protocol"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Email Server Information</label>
                        <input type="text" 
                            class="form-control" 
                            name="host"
                            placeholder="Enter Email Server Information"
                            value="<?php echo isset($form_error) ? set_value("host") : $item->host; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("host"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Port Number</label>
                        <input type="text" 
                            class="form-control" 
                            name="port"
                            placeholder="Enter Port Number"
                            value="<?php echo isset($form_error) ? set_value("port") : $item->port; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("port"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Email Address (User)</label>
                        <input type="email" 
                            class="form-control" 
                            name="user"
                            placeholder="Enter Email Address (User)"
                            value="<?php echo isset($form_error) ? set_value("user") : $item->user; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("user"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Email Address Password</label>
                        <input type="password" 
                            class="form-control" 
                            name="password"
                            placeholder="Enter Email Address Password"
                            value="<?php echo isset($form_error) ? set_value("password") : $item->password; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("password"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>From Email</label>
                        <input type="email" 
                            class="form-control" 
                            name="from"
                            placeholder="Enter From Email"
                            value="<?php echo isset($form_error) ? set_value("from") : $item->from; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("from"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>To Email</label>
                        <input type="email" 
                            class="form-control" 
                            name="to"
                            placeholder="Enter To Email"
                            value="<?php echo isset($form_error) ? set_value("to") : $item->to; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("to"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Mail Title</label>
                        <input type="text" 
                            class="form-control" 
                            name="user_name"
                            placeholder="Enter To Email"
                            value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("user_name"); ?></small>
                            <?php } ?>
                    </div>
                   
                    <button class="btn btn-indigo mt-3 float-right">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

