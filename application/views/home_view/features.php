<section id="services" class="section">
  <div class="container">
    <div class="section-header">   
      <?php foreach($featuresSettings as $featuresSetting) { ?>
        <p class="btn btn-subtitle wow fadeInDown" data-wow-delay="0.2s"><?php echo $featuresSetting->sub_title; ?></p>       
        <h2 class="section-title"><?php echo character_limiter(strip_tags($featuresSetting->title), 115); ?></h2>
      <?php } ?>
    </div>
    <div class="row">
      <?php foreach($features as $feature) { ?>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="icon">
              <i class="<?php echo $feature->icon; ?>"></i>
            </div>
            <h4><?php echo $feature->title; ?></h4>
            <p><?php echo character_limiter(strip_tags($feature->description), 175); ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>