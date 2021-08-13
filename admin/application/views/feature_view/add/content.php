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
        <form action="<?php echo base_url("features/save"); ?>" method="post">
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
                        <label>Icon</label>
                        <input type="text" 
                            class="form-control" 
                            name="icon"
                            placeholder="for example: fab fa-instagram"
                            value="<?php echo isset($form_error) ? set_value("icon") : ""; ?>">        
                    </div>
                    <div class="alert alert-primary shadow-none p-2 mt-2" role="alert">
                        Supports Font Awesome 5. <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" target="_blank">Click</a> to use.
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor">
                            <?php echo isset($form_error) ? set_value("description") : ""; ?>                        
                        </textarea>
                    </div>
                    
                    <a href="<?php echo base_url("features"); ?>" class="btn btn-outline-danger mt-3">Back to Features</a>
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

