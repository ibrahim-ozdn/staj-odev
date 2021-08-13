<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-4 fw-bold">You are editing the <span class="border-bottom border-white"><?php echo character_limiter(strip_tags($item->title), 60); ?></span> record</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <form action="<?php echo base_url("hero/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" 
                            class="form-control" 
                            name="title"
                            placeholder="Enter Title"
                            value="<?php echo $item->title; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("title"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Button Text</label>
                                <input type="text" 
                                    class="form-control" 
                                    name="button_title"
                                    placeholder="Enter Button Text"
                                    value="<?php echo $item->button_title; ?>">
                                    <?php if(isset($form_error)){ ?>
                                        <small class="form-text text-muted text-danger"><?php echo form_error("button_title"); ?></small>
                                    <?php } ?>
                            </div>
                            <div class="col">
                                <label>Button URL</label>
                                <input type="text" 
                                    class="form-control" 
                                    name="button_link"
                                    placeholder="Enter Button URL"
                                    value="<?php echo $item->button_link; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor">
                            <?php echo $item->description; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" target="_blank"><img src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" class="img-responsive img-fluid rounded"></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="file" name="img_url" class="form-control">                     
                                </div>
                            </div>
                        </div>
                    </div>
                             
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

