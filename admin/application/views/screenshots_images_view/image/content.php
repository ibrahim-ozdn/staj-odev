<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column pb-4 flex-md-row">
                <div>
                    <h2 class="text-white fw-bold"><?php echo $pageTitle; ?></h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-inner mt--5">

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div>
                            <form 
                                data-url="<?php echo base_url("screenshots_images/refresh_image_list"); ?>" action="<?php echo base_url("screenshots_images/image_upload"); ?>" id="dropzone" 
                                class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("screenshots_images/image_upload"); ?>'}">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                    </div>
                                    
                                    <h4>Drop files here to upload</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="image_list_container">
            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list_v"); ?>   
        </div>
    </div>
</div>