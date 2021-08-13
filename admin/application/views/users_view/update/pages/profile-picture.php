<div class="card card-profile">
    <div class="card-header" style="background-image: url('<?php echo base_url("assets"); ?>/img/blogpost.jpg')">
        <div class="profile-picture">
            <div class="avatar avatar-xl">
                <?php if($item->img_url != ""){ ?>
                    <img src="<?php echo base_url("uploads/users_view/$item->img_url"); ?>" class="avatar-img rounded-circle">
                <?php } else {?>
                    <img src="<?php echo base_url("assets"); ?>/img/profile.jpg" class="avatar-img rounded-circle">
                <?php } ?>          
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="user-profile text-center">
            <div class="name"><?php echo $item->full_name; ?></div>
            <div class="view-profile pt-3">
                <label class="custom-file-upload-profile">
                    <input type="file" name="img_url" class="form-control">SELECT A NEW PHOTO                     
                </label>
            </div>
        </div>
    </div>
</div>