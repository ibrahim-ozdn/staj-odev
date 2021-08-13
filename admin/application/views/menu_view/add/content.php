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
        <form action="<?php echo base_url("menu/save"); ?>" method="post">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="title"
                            placeholder="Enter Name">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("title"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Menu Link</label>
                        <input type="text" 
                            class="form-control" 
                            name="link"
                            placeholder="Enter Menu Link"
                            value="<?php echo isset($form_error) ? set_value("link") : ""; ?>">        
                    </div>
                    
                    <a href="<?php echo base_url("menu"); ?>" class="btn btn-outline-danger mt-3">Back to Menu</a>
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

