<section id="download">
  <div class="container">
    <div class="row">
      <?php foreach($appDownloads as $appDownload) { ?>
        <div class="col-lg-6 col-md-6 col-xs-12">            
          <div class="download-thumb wow fadeInLeft" data-wow-delay="0.2s">
            <img class="img-fluid" src="<?php echo base_url("admin/uploads/app_download_view/$appDownload->img_url");?>" alt="<?php echo $appDownload->slug; ?>">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="download-wrapper wow fadeInRight" data-wow-delay="0.2s">
            <div>
              <div class="download-text">
                <h4><?php echo $appDownload->title; ?></h4>
                <p><?php echo character_limiter(strip_tags($appDownload->description), 175); ?></p>
              </div>
              <div class="header-button">
              <a href="<?php echo $appDownload->button_link_1; ?>" class="btn btn-border" target="_blank"><i class="<?php echo $appDownload->button_icon_1; ?>"></i> <?php echo $appDownload->button_title_1; ?></a>
              <a href="<?php echo $appDownload->button_link_2; ?>" class="btn btn-common btn-effect" target="_blank"><i class="<?php echo $appDownload->button_icon_2; ?>"></i> <?php echo $appDownload->button_title_2; ?></a>
            </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>