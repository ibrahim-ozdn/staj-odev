<script src="<?php echo base_url("assets"); ?>/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/core/popper.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/core/bootstrap.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/feather.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/sweetalert2.all.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/iziToast.min.js"></script>
<?php $this->load->view("includes/alert"); ?>
<script src="<?= base_url("assets"); ?>/js/plugin/switchery/dist/switchery.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/plugin/datatables/datatables.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/js/atlantis.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/custom.js"></script>

<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            "ordering": false,
        });
    });
</script>

<script>
    $(".sortable").sortable();
</script>

<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.isActive'));

    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });
</script>

<script>
  feather.replace()
</script>
