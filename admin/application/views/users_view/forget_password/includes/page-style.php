<script src="<?php echo base_url("assets"); ?>/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url("assets"); ?>/css/fonts.min.css']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/iziToast.min.css">

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/atlantis.min.css">

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/custom.css">

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/util.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/main.css">

