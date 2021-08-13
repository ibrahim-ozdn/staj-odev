<section id="testimonial" class="section">
  <div class="container">
    <div class="section-header">   
      <?php foreach($testimonialsSettings as $testimonialsSetting) { ?>
        <p class="btn btn-subtitle wow fadeInDown" data-wow-delay="0.2s"><?php echo $testimonialsSetting->sub_title; ?></p>       
        <h2 class="section-title"><?php echo character_limiter(strip_tags($testimonialsSetting->title), 115); ?></h2>
      <?php } ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div id="testimonials" class="touch-slider owl-carousel">
          <?php foreach($testimonials as $testimonial) { ?>
            <div class="item">
              <div class="testimonial-item">
                <div class="author">
                  <div class="img-thumb">
                    <img src="<?php echo base_url("admin/uploads/testimonials_view/$testimonial->img_url");?>" alt="<?php echo $testimonial->slug; ?>">
                  </div>
                </div>
                <div class="content-inner">
                  <p class="description"><?php echo character_limiter(strip_tags($testimonial->description), 237); ?></p>
                  <div class="author-info">
                    <h2><a href="#"><?php echo $testimonial->title; ?></a></h2>
                    <span><?php echo $testimonial->company; ?></span>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

