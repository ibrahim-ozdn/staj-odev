<section id="counter" class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="counter-text">  
          <div>
            <?php foreach($counterVideos as $counterVideo) { ?>
              <p class="btn btn-subtitle"><?php echo $counterVideo->sub_title; ?></p>       
              <h3><?php echo character_limiter(strip_tags($counterVideo->title), 115); ?></h3>
              <div class="desc-text">
                <P><?php echo character_limiter(strip_tags($counterVideo->description), 273); ?></P>
              </div>
            </div> 
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="row">
          <?php foreach($counters as $counter) { ?>
            <div class="col-lg-6 col-md-6 col-xs-12">
              <div class="counter-box <?php echo $counter->color; ?>">
                <div class="fact-count">
                  <h3><span class="counter"><?php echo $counter->counter; ?></span></h3>
                  <p><?php echo $counter->title; ?></p>
                </div>
                <div class="icon-o"><i class="<?php echo $counter->icon; ?>"></i></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>