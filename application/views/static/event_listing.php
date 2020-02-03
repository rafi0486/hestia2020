<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
		<?=$title?> | <?=APP_TITLE?>
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

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/EventsSub.css" />

	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />

	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/normalize.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/menu.css">
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
</head>

<body class="loading">
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

		<div style="width:100%;">
			<section>
				<nav class="links hestia-font desktoponly cl-effect-1" style="background-color:transparent !important;">
					<a href="<?=base_url()?>events">EVENTS</a>
					<a href="<?=base_url()?>sponsors">SPONSORS</a>
					<a href="<?=base_url()?>"><img style="max-height: 75px;position:relative;top:25px" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>
					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
					<a href="<?=base_url()?>about">ABOUT</a>
					<a href="<?= $google_login_url ?>">LOGIN</a>
					<?php } else{ ?>
					<a href="<?=base_url()?>myevents">MY EVENTS</a>
					<?php } ?>
				</nav>


				<div class="mobileonly" style="width: 100%;padding:10px 20px;">
					<a style="margin-right: 20px;">
						<img style="max-height: 65px;" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>

					<i class="material-icons btn--menu" style="cursor:pointer;color:white;font-size: 40px;float:right;margin:15px">
						menu
					</i>
				</div>
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

		<div class="">
			<div class="grid" style="margin-top: 100px;padding-bottom: 100px">
				<a class="grid__item" href="#preview-8">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/4.jpg" alt="Some image" />
						<h3 class="hestia-font box__title">
							<span class="box__title-inner" data-hover="Jack">Jack</span>
						</h3>
						<h4 class="hestia-font box__text box__text--bottom">
							<span class="box__text-inner">Bust</span>
						</h4>
						<div class="box__deco">&#10108;</div>
					</div>
				</a>
				<a class="grid__item" href="#preview-9">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/10.jpg" alt="Some image" />
						<h3 class="box__title">
							<span class="box__title-inner" data-hover="Wild">Wild</span>
						</h3>
						<h4 class="box__text box__text--bottom">
							<span class="box__text-inner">Zack</span>
						</h4>
					</div>
				</a>
				<a class="grid__item" href="#preview-10">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/11.jpg" alt="Some image" />
						<h3 class="box__title box__title--bottom">
							<span class="box__title-inner" data-hover="Lost">Lost</span>
						</h3>
						<h4 class="box__text">
							<span class="box__text-inner box__text-inner--rotated2">Rust</span>
						</h4>
					</div>
				</a>
				<a class="grid__item" href="#preview-11">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/12.jpg" alt="Some image" />
						<h3 class="box__title box__title--straight box__title--left">
							<span class="box__title-inner" data-hover="Grit">Grit</span>
						</h3>
						<h4 class="box__text box__text--bottom box__text--right">
							<span class="box__text-inner box__text-inner--rotated3">Mud</span>
						</h4>
						<div class="box__deco box__deco--top">&#10153;</div>
					</div>
				</a>
				<a class="grid__item" href="#preview-8">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/4.jpg" alt="Some image" />
						<h3 class="box__title">
							<span class="box__title-inner" data-hover="Jack">Jack</span>
						</h3>
						<h4 class="box__text box__text--bottom">
							<span class="box__text-inner">Bust</span>
						</h4>
						<div class="box__deco">&#10108;</div>
					</div>
				</a>
				<a class="grid__item" href="#preview-9">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/10.jpg" alt="Some image" />
						<h3 class="box__title">
							<span class="box__title-inner" data-hover="Wild">Wild</span>
						</h3>
						<h4 class="box__text box__text--bottom">
							<span class="box__text-inner">Zack</span>
						</h4>
					</div>
				</a>
				<a class="grid__item" href="#preview-10">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/11.jpg" alt="Some image" />
						<h3 class="box__title box__title--bottom">
							<span class="box__title-inner" data-hover="Lost">Lost</span>
						</h3>
						<h4 class="box__text">
							<span class="box__text-inner box__text-inner--rotated2">Rust</span>
						</h4>
					</div>
				</a>
				<a class="grid__item" href="#preview-11">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="img/event-listing/12.jpg" alt="Some image" />
						<h3 class="box__title box__title--straight box__title--left">
							<span class="box__title-inner" data-hover="Grit">Grit</span>
						</h3>
						<h4 class="box__text box__text--bottom box__text--right">
							<span class="box__text-inner box__text-inner--rotated3">Mud</span>
						</h4>
						<div class="box__deco box__deco--top">&#10153;</div>
					</div>
				</a>
			</div>
		</div>
		<div class="overlay">
			<div class="overlay__reveal"></div>
			<div class="overlay__item" id="preview-8">
				<div class="box">
					<div class="box__shadow"></div>
					<img class="box__img box__img--original" src="img/event-listing/original/9.jpg" alt="Some image" />
					<h3 class="box__title">
						<span class="box__title-inner">Jack</span>
					</h3>
					<h4 class="box__text box__text--bottom">
						<span class="box__text-inner">Bust</span>
					</h4>
					<div class="box__deco">&#10108;</div>
				</div>
				<p class="overlay__content">
					It's time the tale were told of how you took a child and you made
					him old.
				</p>
			</div>
			<div class="overlay__item" id="preview-9">
				<div class="box">
					<div class="box__shadow"></div>
					<img class="box__img box__img--original" src="img/event-listing/original/10.jpg" alt="Some image" />
					<h3 class="box__title">
						<span class="box__title-inner">Wild</span>
					</h3>
					<h4 class="box__text box__text--bottom">
						<span class="box__text-inner">Zack</span>
					</h4>
				</div>
				<p class="overlay__content">
					It's time the tale were told of how you took a child and you made
					him old.
				</p>
			</div>
			<div class="overlay__item" id="preview-10">
				<div class="box">
					<div class="box__shadow"></div>
					<img class="box__img box__img--original" src="img/event-listing/original/11.jpg" alt="Some image" />
					<h3 class="box__title box__title--bottom">
						<span class="box__title-inner">Lost</span>
					</h3>
					<h4 class="box__text">
						<span class="box__text-inner box__text-inner--rotated2">Rust</span>
					</h4>
				</div>
				<p class="overlay__content">
					It's time the tale were told of how you took a child and you made
					him old.
				</p>
			</div>
			<div class="overlay__item" id="preview-11">
				<div class="box">
					<div class="box__shadow"></div>
					<img class="box__img box__img--original" src="img/event-listing/original/12.jpg" alt="Some image" />
					<h3 class="box__title box__title--straight box__title--left">
						<span class="box__title-inner">Grit</span>
					</h3>
					<h4 class="box__text box__text--bottom box__text--right">
						<span class="box__text-inner box__text-inner--rotated3">Mud</span>
					</h4>
					<div class="box__deco box__deco--top">&#10153;</div>
				</div>
				<p class="overlay__content">
					It's time the tale were told of how you took a child and you made
					him old.
				</p>
			</div>
			<button class="overlay__close">
				<svg class="icon icon--cross">
					<use xlink:href="#icon-cross"></use>
				</svg>
			</button>
		</div>
	</main>
	<script src="<?=  base_url("assets/main/")?>js/event-listing/imagesloaded.pkgd.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/event-listing/TweenMax.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/event-listing/event-listing.js"></script>
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
