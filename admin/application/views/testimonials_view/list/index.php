<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/includes/head"); ?>	
</head>
    
<body>
    
    <div class="wrapper">

        <?php $this->load->view("includes/top-nav"); ?>	

        <?php $this->load->view("includes/vertical-nav"); ?>	

        <div class="main-panel">

            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

            <?php $this->load->view("includes/footer"); ?>	

        </div>

    </div>

    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/includes/page-script"); ?>	

</body>
</html>