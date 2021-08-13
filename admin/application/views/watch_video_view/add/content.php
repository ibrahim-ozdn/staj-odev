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
        <form action="<?php echo base_url("watch_video/save"); ?>" method="post">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Video Link</label>
                        <input type="text" 
                            class="form-control" 
                            name="video_link"
                            placeholder="Enter Video Link">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("video_link"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Video Icon</label>
                        <input type="text" 
                            class="form-control" 
                            name="icon"
                            placeholder="Enter Video Icon"
                            value="<?php echo isset($form_error) ? set_value("icon") : ""; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("video_link"); ?></small>
                            <?php } ?>
                    </div>

                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

