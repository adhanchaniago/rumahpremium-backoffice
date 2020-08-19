<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="modal fade" id="popup-small" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-medium" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-large" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!-- #JS -->

<script>
var base_url = '<?php echo base_url(); ?>';
</script>

<script>
var e;
$(".menu-activated-on-hover").on("mouseenter", "ul.main-menu > li.has-sub-menu", function () {
var t = $(this);
clearTimeout(e), t.closest("ul").addClass("has-active").find("> li").removeClass("active"), t.addClass("active");
}),
$(".menu-activated-on-hover").on("mouseleave", "ul.main-menu > li.has-sub-menu", function () {
var t = $(this);
e = setTimeout(function () {
t.removeClass("active").closest("ul").removeClass("has-active");
}, 30);
}),
$(".menu-activated-on-click").on("click", "li.has-sub-menu > a", function (e) {
var t = $(this).closest("li");
return t.hasClass("active") ? t.removeClass("active") : (t.closest("ul").find("li.active").removeClass("active"), t.addClass("active")), !1;
});
</script>

<!-- NOTIF -->
<script src="<?php echo base_url(); ?>plugins/notif/jquery.amaran.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/notif/notif-module.js"></script>
<?php
if($this->session->flashdata('failed') != '')
{
    echo'<script>notify("'.$this->session->flashdata('failed').'","#dc3545","fa-exclamation-circle");</script>';
}
elseif($this->session->flashdata('success') != '')
{
    echo'<script>notify("'.$this->session->flashdata('success').'","#1fb89e","fa-check");</script>';
}
?>
<!-- #NOTIF -->

<!-- TIME AGO -->
<script src="<?php echo base_url(); ?>plugins/time/jquery.timeago.js"></script>
<script src="<?php echo base_url(); ?>plugins/time/jquery.timeago.id.js"></script>
<!-- #TIME AGO -->

<!-- UPLOADER -->
<script src="<?php echo base_url(); ?>plugins/uploader/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/uploader/dropzone-module.js"></script>
<!-- #UPLOADER -->

<!-- TABLE -->
<script src="<?php echo base_url(); ?>plugins/table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/table/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/table/dataTables-module.js"></script>
<script src="<?php echo base_url(); ?>plugins/table/dataTables.select.min.js"></script>
<!-- #TABLE -->

<!-- NUMERIC -->
<script src="<?php echo base_url(); ?>plugins/numeric/auto-numeric.min.js"></script>
<!-- #NUMERIC -->

<!-- SELECT INPUT -->
<script src="<?php echo base_url(); ?>plugins/select/select2.min.js"></script>
<!-- #SELECT INPUT -->

<script src="<?php echo base_url(); ?>js/libraries.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>