<?php $settings = get_settings(); ?>
<nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
  <div class="container">
    <a href="index.html" class="navbar-brand"><img src="<?php echo base_url("admin/uploads/settings_view/$settings->logo");?>" alt="<?php echo $settings->slug; ?>"></a>       
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <i class="lni-menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto w-100 justify-content-end">
        <?php foreach($menus as $menu) { ?>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#<?php echo $menu->link; ?>"><?php echo $menu->title; ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>  