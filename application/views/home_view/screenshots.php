<section id="screenshots" class="screens-shot section">
  <div class="container">
    <div class="section-header">   
      <?php foreach($ScreenshotSettings as $ScreenshotSetting) { ?>
        <p class="btn btn-subtitle wow fadeInDown" data-wow-delay="0.2s"><?php echo $ScreenshotSetting->sub_title; ?></p>       
        <h2 class="section-title"><?php echo character_limiter(strip_tags($ScreenshotSetting->title), 115); ?></h2>
      <?php } ?>
    </div>
    <div class="row">
      <div class="touch-slider owl-carousel">
        <?php foreach($screenshots as $screenshot) { ?>
          <div class="item">
            <div class="screenshot-thumb">
              <img class="img-fluid" src="<?php echo base_url("admin/uploads/screenshots_images_view/$screenshot->img_url");?>">
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>