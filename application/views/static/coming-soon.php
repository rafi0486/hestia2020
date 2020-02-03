<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>About <?=APP_TITLE?></title>
	<meta
		name="description"
		content="<?=APP_META_CONTENT?>"
	/>
	<meta
		name="keywords"
		content="<?=APP_META_KEYWORDS?>"
	/>
	<link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>fonts/font-awesome-4.3.0/css/font-awesome.min.css" />

	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/about/demo2.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/linkStyles.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/style6.css" />
	<script src="<?=  base_url("assets/main/")?>js/sponsor/modernizr-custom.js"></script>
</head>

<body class="demo-6">
	<svg class="hidden">
		<symbol id="icon-arrow" viewBox="0 0 24 24">
			<title>arrow</title>
			<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 " />
		</symbol>
		<symbol id="icon-drop" viewBox="0 0 24 24">
			<title>drop</title>
			<path
			  d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z" />
			<path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z" />
		</symbol>
		<symbol id="icon-menu" viewBox="0 0 17.6 9.9">
			<title>menu</title>
			<path d="M17.6,1H0V0h17.6V1z M17.6,4.3h-12v1h12V4.3z M17.6,8.9h-6.9v1h6.9V8.9z" />
		</symbol>
		<symbol id="icon-cross" viewBox="0 0 10.2 10.2">
			<title>cross</title>
			<path d="M5.8,5.1l4.4,4.4l-0.7,0.7L5.1,5.8l-4.4,4.4L0,9.5l4.4-4.4L0,0.7L0.7,0l4.4,4.4L9.5,0l0.7,0.7L5.8,5.1z" />
		</symbol>
	</svg>
	<div class="container">
		<header class="custom-header" style="position:absolute;top: 0;">
			<img class="custom-logo" src="<?=  base_url("assets/main/")?>img/logo.png" />
			<button class="btn btn--menu">
				<svg class="icon icon--menu">
					<use xlink:href="#icon-menu"></use>
				</svg>
			</button>
		</header>
		<div style="position:absolute;top:35px;z-index:100;width:100%;">
			<section class="custom-nav">
				<nav class="links hestia-font cl-effect-1	" style="background-color:transparent !important">
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
			</section>
		</div>
		<nav class="menu">
			<button class="btn btn--close">
				<svg class="icon icon--cross">
					<use xlink:href="#icon-cross"></use>
				</svg>
			</button>
			<ul class="menu__inner">
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>events">EVENTS</a></li>
				<li class="menu__item"><a class="menu__link" href="#">SPONSORS</a></li>
				<li class="menu__item"><a class="menu__link" href="#">ABOUT</a></li>
				
				<?php if($this->session->userdata('sess_logged_in')==0){ ?>
				<li class="menu__item"><a class="menu__link" href="<?= $google_login_url ?>">LOGIN</a></li>
				<?php }else { ?>
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>myprofile">MY PROFILE</a></li>
				<?php } ?>
			</ul>
		</nav>
		<div class="content" style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);
">

      <h1 style="font-size:3rem">Coming Soon</h1>

		</div>
		<!-- /content -->
	</div>
	<!-- /container -->
	<script src="<?=  base_url("assets/main/")?>js/home/anime.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/main.js"></script>
	<script>
		(function() {
			var navEl = document.querySelector("nav.menu"),
				revealer = new RevealFx(navEl),
				closeCtrl = navEl.querySelector(".btn--close");

			document
				.querySelector(".btn--menu")
				.addEventListener("click", function() {
					revealer.reveal({
						bgcolor: "#7f40f1",
						duration: 400,
						easing: "easeInOutCubic",
						onCover: function(contentEl, revealerEl) {
							navEl.classList.add("menu--open");
							contentEl.style.opacity = 1;
						},
						onComplete: function() {
							closeCtrl.addEventListener("click", closeMenu);
						}
					});
				});

			function closeMenu() {
				closeCtrl.removeEventListener("click", closeMenu);
				navEl.classList.remove("menu--open");
				revealer.reveal({
					bgcolor: "#7f40f1",
					duration: 400,
					easing: "easeInOutCubic",
					onCover: function(contentEl, revealerEl) {
						navEl.classList.remove("menu--open");
						contentEl.style.opacity = 0;
					}
				});
			}
		})();
	</script>
</body>

</html>
