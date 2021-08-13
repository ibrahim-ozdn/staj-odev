<?php $user = get_active_user(); ?>
<?php $settings = get_settings(); ?>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header">
        
        <a href="<?php echo base_url(); ?>" class="logo">
            <img src="<?php echo base_url("assets"); ?>/img/logo2.svg" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg">
        
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <a href="<?php echo $settings->view_website; ?>" target="_blank" class="btn btn-default btn-sm mr-2">
                    <span class="btn-label">
                        <i class="fab fa-chrome"></i>
                    </span>
                    View Website
                </a>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <?php if($user->img_url != ""){ ?>
                                <img src="<?php echo base_url("uploads/users_view/$user->img_url"); ?>" class="avatar-img rounded-circle">
                            <?php } else {?>
                                <img src="<?php echo base_url("assets"); ?>/img/profile.jpg" class="avatar-img rounded-circle">
                            <?php } ?>          
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <?php if($user->img_url != ""){ ?>
                                        <div class="avatar-lg"><img src="<?php echo base_url("uploads/users_view/$user->img_url"); ?>" class="avatar-img rounded"></div>
                                    <?php } else {?>
                                        <div class="avatar-lg"><img src="<?php echo base_url("assets"); ?>/img/profile.jpg" class="avatar-img rounded"></div>
                                    <?php } ?>          
                                    <div class="u-text">
                                        <h4><?php echo $user->full_name; ?></h4>
                                        <p class="text-muted"><?php echo $user->email; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url("users/update_form/$user->id"); ?>">My Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url("users/update_password_form/$user->id"); ?>">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url("logout"); ?>">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>