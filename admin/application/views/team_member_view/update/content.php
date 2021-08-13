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
        <form action="<?php echo base_url("team_member/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="title"
                            placeholder="Enter Full Name"
                            value="<?php echo $item->title; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="form-text text-muted text-danger"><?php echo form_error("title"); ?></small>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" 
                            class="form-control" 
                            name="designation"
                            placeholder="Enter Designation"
                            value="<?php echo $item->designation; ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" 
                            class="form-control" 
                            name="phone_number"
                            placeholder="Enter Phone Number"
                            value="<?php echo $item->phone_number; ?>">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Email Address</label>
                                <input type="email" 
                                    class="form-control" 
                                    name="email"
                                    placeholder="Enter Email Address"
                                    value="<?php echo $item->email; ?>">
                            </div>
                            <div class="col">
                                <label>Website</label>
                                <input type="url" 
                                    class="form-control" 
                                    name="website"
                                    placeholder="Enter Website"
                                    value="<?php echo $item->website; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Social Media Account Icon 1</label>
                                <input type="text" 
                                    class="form-control" 
                                    name="account_icon1"
                                    placeholder="for example: fab fa-instagram"
                                    value="<?php echo $item->account_icon1; ?>">
                            </div>
                            <div class="col">
                                <label>Social Media Account Link 1</label>
                                <input type="url" 
                                    class="form-control" 
                                    name="account_link1"
                                    placeholder="Enter Social Media Account Link 1"
                                    value="<?php echo $item->account_link1; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Social Media Account Icon 2</label>
                                <input type="text" 
                                    class="form-control" 
                                    name="account_icon2"
                                    placeholder="for example: fab fa-facebook"
                                    value="<?php echo $item->account_icon2; ?>">
                            </div>
                            <div class="col">
                                <label>Social Media Account Link 2</label>
                                <input type="url" 
                                    class="form-control" 
                                    name="account_link2"
                                    placeholder="Enter Social Media Account Link 2"
                                    value="<?php echo $item->account_link2; ?>">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label>About</label>
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
         
                    <a href="<?php echo base_url("team_member"); ?>" class="btn btn-outline-danger mt-3">Back to Team Members</a>
                    <button class="btn btn-indigo mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

