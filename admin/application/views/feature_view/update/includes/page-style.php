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

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/iziToast.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/js/plugin/summernote/summernote-lite.min.css">

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/atlantis.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/custom.css">
