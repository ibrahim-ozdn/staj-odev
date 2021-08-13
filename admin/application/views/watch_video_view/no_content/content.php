<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column pb-4 flex-md-row">
                <div>
                    <h2 class="text-white fw-bold"><?php echo $pageTitle; ?></h2>
                </div>
                <div class="ml-md-auto py-4 py-md-0">
                    <a href="watch_video/new_form" class="btn btn-light btn-round">Add New</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-inner mt--5">

        <?php if(empty($items)) { ?>

            <div class="alert alert-warning text-center" role="alert">
                <strong>Warning!</strong> No records found.
            </div>

        <?php } ?>
    </div>
</div>