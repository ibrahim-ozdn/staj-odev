<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/includes/head"); ?>	
</head>
    
<body>
    
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/includes/page-script"); ?>	

</body>
</html>