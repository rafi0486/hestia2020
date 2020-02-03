<?php
if(isset($_SESSION['preloginpg']))
{
    $redurl=$_SESSION['preloginpg'];
    unset($_SESSION['preloginpg']);
    header('Location: '.$redurl);

}
if(isset($_COOKIE['redir']))
{
    setcookie("redir", "", time() - 3600);

    if($_COOKIE['redir']=='myevents')
    {
        $redurl="myevents";
        setcookie("redir", "", time() - 3600);
        header('Location: '.base_url().$redurl);

    }
        if($_COOKIE['redir']=='myprofile')
    {
        $redurl="myprofile";
        setcookie("redir", "", time() - 3600);
        header('Location: '.base_url().$redurl);

    }

}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
		Events | <?=APP_TITLE?>
	</title>
	<meta
		name="description"
		content="<?=APP_META_CONTENT?>"
	/>
	<meta
		name="keywords"
		content="<?=APP_META_KEYWORDS?>"
	/>
	<link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />	
	<link href="https://fonts.googleapis.com/css?family=Anton|Niramit:400,600,700" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/EventsMain.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/linkStyles.css" />


	<script>
		document.documentElement.className = "js";
		var supportsCssVars = function() {
			var e,
				t = document.createElement("style");
			return (
				(t.innerHTML = "root: { --tmp-var: bold; }"),
				document.head.appendChild(t),
				(e = !!(
					window.CSS &&
					window.CSS.supports &&
					window.CSS.supports("font-weight", "var(--tmp-var)")
				)),
				t.parentNode.removeChild(t),
				e
			);
		};
		supportsCssVars() ||
			alert(
				"Please view this demo in a modern browser that supports CSS Variables."
			);
	</script>
	<style>
		.box__shadow {
			position: absolute;
			width: 100%;
			height: 100%;
			top: -1rem;
			left: -1rem;
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAOklEQVQoU43MSwoAMAgD0eT+h7ZYaOlHo7N+DNHL2HAGgBWcyGcKbqTghTL4oQiG6IUpOqFEC5bI4QD8PAoKd9j4XwAAAABJRU5ErkJggg==);
		}

		.box__img {
			display: block;
			flex: none;
			margin: 0 auto;
			max-width: 100%;
			filter: grayscale(1);
			transition: filter 0.3s;
			pointer-events: none;
		}

		.grid__item:hover .box__img:not(.box__img--original) {
			filter: grayscale(0);
		}

		.box__img--original {
			max-height: calc(100vh - 10rem);
			filter: none;
		}
	</style>
</head>

<body class="loading">
	<svg class="hidden">
		<symbol id="icon-arrow" viewBox="0 0 24 24">
			<title>arrow</title>
			<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 " />
		</symbol>
	</svg>
	<main>
		<div style="width:100%;position: absolute;top:0;z-index: 100">
			<section>
				<nav class="links hestia-font desktoponly cl-effect-1" style="background-color:transparent !important;">
					<a href="<?=base_url()?>events">EVENTS</a>
					<a href="<?=base_url()?>sponsors">SPONSORS</a>
					<a href="<?=base_url()?>"><img style="max-height: 75px;position:relative;top:25px" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>
					<a href="<?=base_url()?>about">ABOUT</a>
					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
					<a href="<?= $google_login_url ?>">LOGIN</a>
					<?php } else{ ?>
					<a href="<?=base_url()?>myprofile">MY PROFILE</a>
					<?php } ?>
				</nav>


				<div class="mobileonly" style="width: 100%;padding:10px 20px;">
					<a style="margin-right: 20px;" href="<?=base_url()?>">
						<img style="max-height: 65px;z-index: 100;" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>

				</div>
			</section>

		</div>
		<nav class="menu" style="background-color: transparent;height: 550px">
			<div class="menu__item">
				<span class="menu__item-number">01</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Workshops</span></span>
				<a class="menu__item-link">Explore</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">02</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Technical</span></span>
				<a class="menu__item-link">Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">03</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Cultural</span></span>
				<a class="menu__item-link">Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">04</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Online</span></span>
				<a class="menu__item-link">Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">05</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">General</span></span>
				<a class="menu__item-link">Coming Soon</a>
			</div>
		</nav>

		<div class="page page--preview">
			<div class="gridwrap" style="padding-bottom: 0">
				<div class="grid grid--layout-1">
					<?php
					foreach ($workshops as $catrow){
						?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
				<?php } ?>
				</div>
				<div class="grid grid--layout-2">

					<?php
					 foreach ($technical as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
					<?php } ?>
				</div>
				<div class="grid grid--layout-3">
					<?php
					 foreach ($cultural as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
					<?php } ?>

				</div>
				<div class="grid grid--layout-4">
					<?php
					 foreach ($online as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>

				<?php } ?>

				</div>
				<div class="grid grid--layout-5">
					<?php
					 foreach ($general as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
				<?php } ?>
				</div>
				<button class="gridback">
					<svg class="icon icon--arrow">
						<use xlink:href="#icon-arrow"></use>
					</svg>
				</button>
			</div>
			<!-- /gridwrap -->
			<div class="content" style="display: none">
				<div class="content__item"></div>
				<div class="content__item"></div>
				<div class="content__item"></div>
				<div class="content__item"></div>
				<div class="content__item"></div>
			</div>
		</div>
		<!-- /page -->
	</main>
	<script src="<?=  base_url("assets/main/")?>js/main-event/imagesloaded.pkgd.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/main-event/TweenMax.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/main-event/main.js"></script>
</body>

</html>
