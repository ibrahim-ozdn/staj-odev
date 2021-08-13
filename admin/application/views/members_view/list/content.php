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
                                            <th>Email</th>
                                            <th>Ip Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($items as $item) { ?>

                                            <tr>
                                                <td class="wt-10"><?php echo $item->id; ?></td>
                                                <td><?php echo character_limiter(strip_tags($item->email), 45); ?></td>
                                                <td><?php echo character_limiter(strip_tags($item->ip_address), 45); ?></td>
                                                <td class="wt-10">
                                                    <input data-url="<?php echo base_url("members/isActiveSetter/$item->id"); ?>"
                                                        class="isActive"
                                                        type="checkbox"
                                                        data-switchery
                                                        data-color="#10c469"
                                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                                    /> 
                                                </td>
                                                <td class="wt-10">
                                                    <div class="btn-group" role="group">
                                                        <button data-url="<?php echo base_url("members/delete/$item->id"); ?>" 
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