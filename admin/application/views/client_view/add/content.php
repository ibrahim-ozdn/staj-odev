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
        <form action="<?php echo base_url("client/save"); ?>" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="title"
                            placeholder="Enter Company Name">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("title"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Website URL</label>
                        <input type="url" 
                            class="form-control" 
                            name="website_url"
                            placeholder="Enter Website URL"
                            value="<?php echo isset($form_error) ? set_value("website_url") : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label>Select Image</label>
                        <input type="file" name="img_url" class="form-control">                 
                    </div>

                    <a href="<?php echo base_url("client"); ?>" class="btn btn-outline-danger mt-3">Back to Clients</a>
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

