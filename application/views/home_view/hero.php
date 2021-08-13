<div class="container">      
  <div class="row space-100">
    <?php foreach($heros as $hero) { ?>
      <div class="col-lg-7 col-md-12 col-xs-12">
        <div class="contents">
          <h2 class="head-title"><?php echo $hero->title; ?></h2>
          <p><?php echo character_limiter(strip_tags($hero->description), 175); ?></p>
          <div class="header-button">
            <a href="#<?php echo $hero->button_link; ?>" class="btn page-scroll btn-border-filled"><?php echo $hero->button_title; ?></a>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 col-xs-12">
        <div class="intro-img">
          <img src="<?php echo base_url("admin/uploads/hero_view/$hero->img_url");?>" alt="<?php echo $hero->slug; ?>">
          
        </div>            
      </div>
    <?php } ?>
  </div> 
</div>  