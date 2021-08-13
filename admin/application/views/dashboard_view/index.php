<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("{$viewFolder}/includes/head"); ?>	
</head>
    
<body>
    
    <div class="wrapper">

        <?php $this->load->view("includes/top-nav"); ?>	

        <?php $this->load->view("includes/vertical-nav"); ?>	

        <div class="main-panel">

            <?php $this->load->view("{$viewFolder}/content"); ?>	

            <?php $this->load->view("includes/footer"); ?>	

        </div>

    </div>

    <?php $this->load->view("{$viewFolder}/includes/page-script"); ?>	

</body>
</html>