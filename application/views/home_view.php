<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("includes/head"); ?>
  </head>
  
  <body>

    <header id="home" class="hero-area">    
      <div class="overlay"></div>
      <?php $this->load->view("includes/navbar"); ?>
      <?php $this->load->view("{$viewFolder}/hero"); ?>                 
    </header>
    
    <?php $this->load->view("{$viewFolder}/features"); ?>
    <?php $this->load->view("{$viewFolder}/video"); ?>
    <?php $this->load->view("{$viewFolder}/counter"); ?>
    <?php $this->load->view("{$viewFolder}/screenshots"); ?>
    <?php $this->load->view("{$viewFolder}/testimonial"); ?>
    <?php $this->load->view("{$viewFolder}/clients"); ?>
    <?php $this->load->view("{$viewFolder}/subscribe"); ?>
    <?php $this->load->view("{$viewFolder}/app_download"); ?>
    <?php $this->load->view("{$viewFolder}/team"); ?>
    <?php $this->load->view("{$viewFolder}/map-area"); ?>
    <?php $this->load->view("{$viewFolder}/contact"); ?>   

    <?php $this->load->view("includes/footer"); ?>

    <?php $this->load->view("includes/back-to-top"); ?>

    <?php $this->load->view("includes/preloader"); ?>  

    <?php $this->load->view("includes/include-script"); ?>
    
  </body>
</html>