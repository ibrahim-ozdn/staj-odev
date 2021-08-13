<?php $settings = get_settings(); ?>

<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="site-info float-left">
          <p><?php echo $settings->footer_copyright; ?> <?php echo date("Y"); ?></p>
        </div>              
        <div class="float-right">  
          <ul class="footer-social">
            <?php foreach($socials as $social) { ?>
              <li><a class="facebook" href="<?php echo $social->link; ?>"><i class="<?php echo $social->icon; ?>"></i></a></li>
            <?php } ?>
          </ul> 
        </div>
      </div>
    </div>
  </div>
</div>