<section class="video-promo section">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
          <div class="video-promo-content text-center">
            <?php foreach($watchVideos as $watchVideo) { ?>
              <a href="https://www.youtube.com/watch?v=<?php echo $watchVideo->video_link; ?>" class="video-popup"><i class="<?php echo $watchVideo->icon; ?>"></i></a>
            <?php } ?>
            <?php foreach($watchvideoSettings as $watchvideoSetting) { ?>
              <h2 class="mt-3 wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms"><?php echo character_limiter(strip_tags($watchvideoSetting->title), 115); ?></h2>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>
</section>