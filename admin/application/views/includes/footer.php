<?php $settings = get_settings(); ?>
<footer class="footer">
    <div class="container-fluid">
        <div class="copyright">
            Copyright © <?php echo (empty($settings->company_name)) ? 'MaterialSoftware' : "$settings->company_name"; ?> <?php echo date("Y"); ?>
        </div>				
    </div>
</footer>

