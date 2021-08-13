<div class="container-login100">
    <div class="wrap-login100">

        <form action="<?php echo base_url("userop/do_login"); ?>" method="post" class="login100-form validate-form">
            <span class="login100-form-title p-b-26">
                Welcome, Login to continue
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                <input class="input100" type="text" name="user_email">
                <?php if(isset($form_error)){ ?>
                    <h6 class="float-right text-danger-login pt-2"><?= form_error("user_email"); ?></h6>
                <?php } ?>
                <span class="focus-input100" data-placeholder="Email Address"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <span class="btn-show-pass">
                    <i class="zmdi zmdi-eye"></i>
                </span>
                <input class="input100" type="password" name="user_password">
                <?php if(isset($form_error)){ ?>
                    <h6 class="float-right text-danger-login pt-2"><?= form_error("user_password"); ?></h6>
                <?php } ?>
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>

            <div class="text-center p-t-15 text-dark">
                <span class="txt1">
                    <a href="<?php echo base_url("forgot-password"); ?>" class="forget">Forgot Password?</a>
                </span>
            </div>
        </form>
    </div>
</div>