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
        <form action="<?php echo base_url("counter_settings/update/$item->id"); ?>" method="post">
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
                        <label>Sub Title</label>
                        <input type="text" 
                            class="form-control" 
                            name="sub_title"
                            placeholder="Enter Sub Title"
                            value="<?php echo $item->sub_title; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor">
                            <?php echo $item->description; ?>
                        </textarea>
                    </div>
                             
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

