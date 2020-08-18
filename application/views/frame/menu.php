<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(!isset($this->session->userdata['rumahpremium_member']))
{
    redirect('login');
}
?>

<div class="container-fluid">
<div class="row">

<div class="col-2 p-0" style="background: #2351c2; min-height: 100vh;">
	<h6 class="p-3 text-white text-uppercase" style="background: #1841a6; letter-spacing: 2px;">
		Rumah Premium
	</h6>
	<div class="py-1 menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left sub-menu-style-over sub-menu-color-bright menu-activated-on-hover menu-has-selected-link">
		<div class="row px-3">
			<div class="col-4">
				<img src="<?php echo base_url(); ?>assets/admin.jpg" class="rounded-circle w-100">
			</div>
			<div class="col-8 pl-0">
				<h6 class="text-white mb-1"><?php echo member()->user_fullname; ?></h6>
				<h6 class="fontsize-mini text-uppercase" style="color: rgba(255,255,255,0.4); letter-spacing: 1px;">Administrator</h6>
			</div>
		</div>
        <hr style="border-bottom: 1px solid rgba(255,255,255,0.15);">
        <div class="px-3">
            <div class="menu-search">
                <input class="border-0 w-100" placeholder="Pencarian ..." />
            </div>
        </div>
		<hr style="border-bottom: 1px solid rgba(255,255,255,0.15);">
        <ul class="main-menu">
            <li class="sub-header"><span>Statistik</span></li>
            <li class="selected">
                <a href="<?php echo site_url(); ?>">
                    <div class="icon-w"><div class="os-icon os-icon-home"></div></div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-header"><span>Properti</span></li>
            <li class="selected has-sub-menu">
                <a href="<?php echo site_url(); ?>">
                    <div class="icon-w"><div class="os-icon os-icon-home"></div></div>
                    <span>Data Properti</span>
                </a>
                <div class="sub-menu-w">
                    <div class="sub-menu-header text-uppercase">Menu Properti</div>
                    <div class="sub-menu-icon"><i class="os-icon os-icon-home"></i></div>
                    <div class="sub-menu-i">
                        <ul class="sub-menu">
                            <li><a href="<?php echo site_url(); ?>item/category/apartment">Apartment</a></li>
                            <li><a href="<?php echo site_url(); ?>item/category/apartment">Rumah</a></li>
                            <li><a href="<?php echo site_url(); ?>item/category/apartment">Komersial</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="selected">
                <a href="<?php echo site_url(); ?>">
                    <div class="icon-w"><div class="os-icon os-icon-newspaper"></div></div>
                    <span>Berita Properti</span>
                </a>
            </li>
            <li class="selected">
                <a href="<?php echo site_url(); ?>">
                    <div class="icon-w"><div class="os-icon os-icon-bookmark"></div></div>
                    <span>Bookmark</span>
                </a>
            </li>
            <li class="sub-header"><span>User</span></li>
            <li class="selected">
                <a href="<?php echo site_url(); ?>">
                    <div class="icon-w"><div class="os-icon os-icon-user"></div></div>
                    <span>Agen</span>
                </a>
            </li>
        </ul>
    </div>
</div>