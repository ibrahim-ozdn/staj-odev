<div class="container-login100">
    <div class="wrap-login100">
        <form action="<?php echo base_url("reset-password"); ?>" method="post" class="login100-form validate-form">
            <span class="login100-form-title p-b-26">
                Enter your e-mail address
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                <input class="input100" type="text" name="email">
                <span class="focus-input100" data-placeholder="Email Address"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        SEND
                    </button>
                </div>
            </div>

            <div class="text-center p-t-15 text-dark">
                <span class="txt1">
                    <a href="<?php echo base_url("login"); ?>" class="forget">Login</a>
                </span>
            </div>
        </form>
    </div>
</div>