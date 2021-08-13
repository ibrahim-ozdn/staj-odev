<?php if(empty($item_images)) { ?>

    <div class="alert alert-warning text-center" role="alert">
        <strong>Warning!</strong> No records found.
    </div>

<?php } else { ?>

    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">          
                <div class="card-body p-0">         
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered pictures_list">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="sortable" data-url="<?php echo base_url("screenshots_images/imageRankSetter"); ?>">

                                <?php foreach($item_images as $image) { ?>

                                    <tr id="ord-<?php echo $image->id; ?>">
                                        <td class="wt-10"><?php echo $image->id; ?></td>
                                        <td class="wt-10">
                                            <div class="avatar">
                                                <img src="<?php echo base_url("uploads/$viewFolder/$image->img_url"); ?>" class="avatar-img rounded-circle">
                                            </div>
                                        </td>
                                        <td><?php echo character_limiter(strip_tags($image->img_url), 45); ?></td>
                                        <td class="wt-10">
                                            <input data-url="<?php echo base_url("screenshots_images/imageIsActiveSetter/$image->id"); ?>"
                                                class="isActive"
                                                type="checkbox"
                                                data-switchery
                                                data-color="#10c469"
                                                <?php echo ($image->isActive) ? "checked" : ""; ?>
                                            /> 
                                        </td>
                                        <td class="wt-10">
                                            <div class="btn-group" role="group">
                                                <button data-url="<?php echo base_url("screenshots_images/imageDelete/$image->id"); ?>" 
                                                    class="btn btn-outline-secondary btn-sm remove-btn" 
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="far fa-trash-alt"></i>                                                        
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                <?php } ?>      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>