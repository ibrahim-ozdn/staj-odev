<div id="subscribe" class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-12 col-xs-12">
        <div class="subscribe-form">
          <div class="form-wrapper">
            <div class="sub-title text-center">
              <?php foreach($subscribeSettings as $subscribeSetting) { ?>
                <h3><?php echo $subscribeSetting->title; ?></h3>
                <p><?php echo character_limiter(strip_tags($subscribeSetting->description), 136); ?></p>
              <?php } ?>
            </div>
            <form action="<?php echo base_url("subscribers"); ?>" method="post">
              <div class="row">
                <div class="col-12 form-line">
                  <div class="form-group form-search">
                    <input type="email" class="form-control" name="subscribe_email" placeholder="Enter Your Email">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-common btn-search">Subscribe</button>
                  </div> 
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>