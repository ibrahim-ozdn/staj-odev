<section id="contact">      
  <div class="contact-form">
    <div class="container">
      <div class="row justify-content-center"> 
        <div class="offset-top">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="contact-block wow fadeInUp" data-wow-delay="0.2s">
              <div class="section-header">   
                <?php foreach($contactSettings as $contactSetting) { ?>
                  <p class="btn btn-subtitle wow fadeInDown" data-wow-delay="0.2s"><?php echo $contactSetting->sub_title; ?></p>       
                  <h2 class="section-title"><?php echo character_limiter(strip_tags($contactSetting->title), 115); ?></h2>
                <?php } ?>
              </div>
              <form id="contactForm" action="<?php echo base_url("message-send"); ?>" method="post"> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Email" id="email" name="email" class="form-control" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" name="subject" class="form-control" required="" data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" id="message" name="message" placeholder="Message" rows="7" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <button class="btn btn-common btn-effect" id="submit" type="submit">Submit</button>
                      <div id="msgSubmit" class="h3 hidden"></div> 
                      <div class="clearfix"></div> 
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
</section>