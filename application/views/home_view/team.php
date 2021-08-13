<section id="team" class="section">
  <div class="container">
    <div class="section-header">   
      <?php foreach($teamSettings as $teamSetting) { ?>
        <p class="btn btn-subtitle wow fadeInDown" data-wow-delay="0.2s"><?php echo $teamSetting->sub_title; ?></p>       
        <h2 class="section-title"><?php echo character_limiter(strip_tags($teamSetting->title), 115); ?></h2>
      <?php } ?>
    </div>
    <div class="row">
      <?php foreach($teams as $team) { ?>
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="single-team">
            <div class="team-thumb">
              <img src="<?php echo base_url("admin/uploads/team_member_view/$team->img_url");?>" alt="<?php echo $team->slug; ?>">
              <ul class="social-list">
                <li class="facebook"><a href="<?php echo $team->account_link1; ?>"><i class="<?php echo $team->account_icon1; ?>"></i></a></li>
                <li class="twitter"><a href="<?php echo $team->account_link2; ?>"><i class="<?php echo $team->account_icon2; ?>"></i></a></li>
              </ul>
            </div>
            <div class="team-details">
              <div class="team-inner">
                <h4 class="team-title"><?php echo $team->title; ?></h4>
                <p><?php echo $team->designation; ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>