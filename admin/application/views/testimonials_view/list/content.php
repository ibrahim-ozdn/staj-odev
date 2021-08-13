<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column pb-4 flex-md-row">
                <div>
                    <h2 class="text-white fw-bold"><?php echo $pageTitle; ?></h2>
                </div>
                <div class="ml-md-auto py-4 py-md-0">
                    <a href="testimonials/new_form" class="btn btn-light btn-round">Add New</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-inner mt--5">

        <?php if(empty($items)) { ?>

            <div class="alert alert-warning text-center" role="alert">
                <strong>Warning!</strong> No records found.
            </div>

        <?php } else { ?>

            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">          
                        <div class="card-body p-0">         
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-bordered content-container">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Company</th>
                                            <th>Designation</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable" data-url="<?php echo base_url("testimonials/rankSetter"); ?>">

                                        <?php foreach($items as $item) { ?>

                                            <tr id="ord-<?php echo $item->id; ?>">
                                                <td class="wt-10"><?php echo $item->id; ?></td>
                                                <td class="wt-10">
                                                    <div class="avatar">
                                                        <img src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" class="avatar-img rounded-circle">
                                                    </div>
                                                </td>
                                                <td><?php echo character_limiter(strip_tags($item->title), 45); ?></td>
                                                <td><?php echo character_limiter(strip_tags($item->company), 45); ?></td>
                                                <td><?php echo character_limiter(strip_tags($item->designation), 45); ?></td>
                                                <td><?php echo character_limiter(strip_tags($item->description), 45); ?></td>
                                                <td class="wt-10">
                                                    <input data-url="<?php echo base_url("testimonials/isActiveSetter/$item->id"); ?>"
                                                        class="isActive"
                                                        type="checkbox"
                                                        data-switchery
                                                        data-color="#10c469"
                                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                                    /> 
                                                </td>
                                                <td class="wt-10">
                                                    <div class="btn-group" role="group">
                                                        <a href="<?php echo base_url("testimonials/update_form/$item->id"); ?>" 
                                                            class="btn btn-outline-secondary btn-sm" 
                                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>                         
                                                        </a>
                                                        <button data-url="<?php echo base_url("testimonials/delete/$item->id"); ?>" 
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
    </div>
</div>