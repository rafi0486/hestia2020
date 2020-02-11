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
	<link href="https://fonts.googleapis.com/css?family=Anton|Niramit:400,600,700" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157830270-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157830270-1');
</script>

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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="<?=base_url("assets/main/")?>js/Loader.js"></script>
  <link rel="stylesheet" href="<?=base_url("assets/main/")?>css/Loader.css"/>
	<link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/EventsMain.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />


	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/menuMain.css">


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
		.a_coming{
				pointer-events: none !important;
		}
	</style>
</head>

<body>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
	<svg class="hidden">
		<symbol id="icon-arrow" viewBox="0 0 24 24">
			<title>arrow</title>
			<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 " />
		</symbol>
	</svg>

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
		<symbol id="icon-cross" viewBox="0 0 24 23">
			<title>cross</title>
			<path
			  d="M23.865 3.677c.197-.383.164-.818-.008-1.18.048-.41-.06-.827-.448-1.147L22.323.457c-.636-.524-1.632-.689-2.25 0a155.348 155.348 0 0 1-8.797 9.001C9.011 7.342 6.72 5.255 4.443 3.165c-.8-.734-1.956-.503-2.458.37C1.253 3.9.659 4.374.168 5.182c-.233.386-.215.872 0 1.258 1.47 2.635 4.31 4.951 6.646 7.083-.313.28-.623.562-.942.836-3.146 2.702-5.268 4.416-1.331 7.187.053.037.107.029.161.05.076.036.148.06.232.074.026 0 .05.005.075.003.082.007.16.027.243.011 2.117-.415 4.085-2.074 5.872-3.9 1.74 1.715 3.592 3.353 5.63 4.325.485.232 1.063.097 1.436-.227.626.047 1.197-.342 1.484-.901.042-.026.07-.041.116-.07.91-.569.993-1.701.32-2.482-1.522-1.762-3.138-3.438-4.787-5.084 2.968-2.9 6.674-6.027 8.542-9.667z" />
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


	<main>
		<div style="width:100%;position: absolute;top:0;z-index: 100">
			<section>
				<nav class="links hestia-font desktoponly" style="background-color:transparent !important;">
					<a href="<?=base_url()?>events">EVENTS</a>
					<a href="<?=base_url()?>sponsors">SPONSORS</a>
					<a href="<?=base_url()?>"><img style="max-height: 75px;position:relative;top:25px" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>
					<a href="<?=base_url()?>about">ABOUT</a>
					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
					<a href="<?= $google_login_url ?>">LOGIN</a>
					<?php } else{ ?>
					<a href="<?=base_url()?>myevents">MY EVENTS</a>
					<?php } ?>
				</nav>


				<div class="mobileonly" style="width: 100%;padding:10px 20px;">
					<a style="margin-right: 20px;" href="/">
						<img style="max-height: 65px;z-index: 100;" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>
					<i class="material-icons btn--menu" style="cursor:pointer;font-size: 40px;float:right;margin:15px">
						menu
					</i>
				</div>
			</section>

		</div>
		<nav class="menu" style="background-color: transparent;height: 550px">
			<div class="menu__item">
				<span class="menu__item-number">01</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Workshops</span></span>
				<a class="menu__item-link" href="<?=base_url("events/workshops")?>">Explore</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">02</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Technical</span></span>
																<a class="menu__item-link a_coming" >Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">03</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Cultural</span></span>
				<a class="menu__item-link a_coming" >Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">04</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">Online</span></span>
				<a class="menu__item-link a_coming" >Coming Soon</a>
			</div>
			<div class="menu__item">
				<span class="menu__item-number">05</span>
				<span class="menu__item-textwrap"><span class="menu__item-text">General</span></span>
				<a class="menu__item-link a_coming">Coming Soon</a>
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
 <div class="grid__item" style="background-image: url(data:image/png;base64,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)">
						<div class="name-overlay">COMING SOON</div>
					<?php
					 foreach ($technical as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
					<?php } ?>
				</div>
				<div class="grid grid--layout-3">
                                    <div class="grid__item" style="background-image: url(data:image/png;base64,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)">
						<div class="name-overlay">COMING SOON</div>
					<?php
					 foreach ($cultural as $catrow){
					?>
					<div class="grid__item" style="background-image: url(<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>)">
						<div class="name-overlay"><?=$catrow->cat_text?></div>
					</div>
					<?php } ?>

				</div>
				<div class="grid grid--layout-4">
                                      <div class="grid__item" style="background-image: url(data:image/png;base64,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)">
						<div class="name-overlay">COMING SOON</div>
					</div>
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


		<nav class="Mobilemenu">
			<button class="btn btn--close">
				<svg class="icon icon--cross">
					<use xlink:href="#icon-cross"></use>
				</svg>
			</button>
			<ul class="Mobilemenu__inner ">
				<li class="Mobilemenu__item"><a class="Mobilemenu__link  " href="<?=base_url()?>events">EVENTS</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link"  href="<?=base_url()?>sponsors">SPONSORS</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>about">ABOUT</a></li>
        <li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>contact">CONTACT</a></li>

					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?= $google_login_url ?>">LOGIN</a></li>
				<?php }else { ?>
					<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>myevents">MY EVENTS</a></li>
				<?php } ?>
			</ul>
		</nav>
		<!-- /page -->
	</main>
	<script src="<?=  base_url("assets/main/")?>js/main-event/imagesloaded.pkgd.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/main-event/TweenMax.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/main-event/main.js"></script>

	<script src="<?=  base_url("assets/main/")?>js/home/anime.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/main.js"></script>
	<script>
		(function() {
			var navEl = document.querySelector("nav.Mobilemenu"),
				revealer = new RevealFx(navEl),
				closeCtrl = navEl.querySelector(".btn--close");

			document
				.querySelector(".btn--menu")
				.addEventListener("click", function() {
					revealer.reveal({
						bgcolor: "#101010",
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
					bgcolor: "#101010",
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
