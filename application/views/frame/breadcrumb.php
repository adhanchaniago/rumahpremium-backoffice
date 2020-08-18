<div class="col-10">
<div class="breadcrumb-nav border-top border-bottom py-3 pl-4 mt-4 fontsize-smaller text-uppercase">
    <span><?php echo $basetitle; ?></span>
    <span class="mx-2">/</span>
    <?php if($title != null): ?>
    	<span><?php echo $subtitle; ?></span>
	    <span class="mx-2">/</span>
	    <span><strong><?php echo $title; ?></strong></span>
    <?php else: ?>
    	<span><strong><?php echo $subtitle; ?></strong></span>
    <?php endif; ?>
</div>
<div class="px-4 mt-4">
    <h6 class="text-uppercase element-header"><strong><?php echo $title; ?></strong></h6>
</div>
<div class="row">