<?php $settings = get_settings(); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php foreach($seos as $seo) { ?>
    <meta name="description" content="<?php echo strip_tags($seo->description); ?>">
    <meta name="keywords" content="<?php echo strip_tags($seo->keywords); ?>">
    <meta name="author" content="<?php echo strip_tags($seo->author); ?>">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $settings->company_name; ?></title>

<?php $this->load->view("includes/include-style"); ?>