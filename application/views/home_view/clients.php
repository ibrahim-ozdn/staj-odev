<div id="clients" class="section">
  <div class="container">
    <div class="row" id="clients-scroller">
      <?php foreach($clients as $client) { ?>
        <div class="client-item-wrapper">
          <a href="<?php echo $client->website_url; ?>" target="_blank">
            <img src="<?php echo base_url("admin/uploads/client_view/$client->img_url");?>" alt="<?php echo $client->slug; ?>">
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>