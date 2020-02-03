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
	<title><?=APP_TITLE?></title>
	<meta
		name="description"
		content="<?=APP_META_CONTENT?>"
	/>
	<meta
		name="keywords"
		content="<?=APP_META_KEYWORDS?>"
	/>
	<link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
	<link href="https://fonts.googleapis.com/css?family=Barlow:400,800" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/Home.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/linkStyles.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/menu.css">

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
				"Please view this website in a modern browser that supports CSS Variables."
			);
	</script>
</head>

<body class="demo-3">
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
		<svg id="icon-cross" viewBox="0 0 10.2 10.2">
			<title>cross</title>
			<path d="M5.8,5.1l4.4,4.4l-0.7,0.7L5.1,5.8l-4.4,4.4L0,9.5l4.4-4.4L0,0.7L0.7,0l4.4,4.4L9.5,0l0.7,0.7L5.8,5.1z"></path>
		</svg>
	</svg>
	<main>

		<div style="width: 100%;position: absolute;top:0;left:0;z-index: 10000;min-height: 100vh">


			<section>
				<nav class="links hestia-font desktoponly cl-effect-1" style="background-color:transparent !important;">
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
					<a style="margin-right: 20px;">
						<img style="max-height: 65px;" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>

					<i class="material-icons btn--menu" style="cursor:pointer;font-size: 40px;float:right;margin:15px">
						menu
					</i>

				</div>
			</section>


			<div>
				<p class="hestia-font hestia-main " style="margin-bottom: 10px">
					HESTIA 20
				</p>
			</div>

			<div>
				<p class="hestia-font " style="text-align:center;letter-spacing:1px;font-size:14px; margin-top:3px;">
					FEB 27 - MAR 01
				</p>
			</div>



			<div style="position: absolute;bottom:50px;width: 100%">


				<p style="letter-spacing:1px; text-align: center;width: 100%" class="hestia-font content__subtitle">
					TKM COLLEGE OF ENGINEERING
				</p>

			</div>




		</div>
		<nav class="menu">
			<button class="btn btn--close">
				<svg class="icon icon--cross">
					<use xlink:href="#icon-cross"></use>
				</svg>
			</button>
			<ul class="menu__inner">
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>events">EVENTS</a></li>
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>sponsors">SPONSORS</a></li>
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>about">ABOUT</a></li>

				<?php if($this->session->userdata('sess_logged_in')==0){ ?>
				<li class="menu__item"><a class="menu__link" href="<?= $google_login_url ?>">LOGIN</a></li>
				<?php }else { ?>
				<li class="menu__item"><a class="menu__link" href="<?=base_url()?>myevents">MY EVENTS</a></li>
				<?php } ?>
			</ul>
		</nav>
		<div class="content">
			<canvas class="landscape"></canvas>
			<script id="custom-vertex" type="x-shader/x-vertex">


					vec3 mod289(vec3 x)
					{
						return x - floor(x * (1.0 / 289.0)) * 289.0;
					}

					vec4 mod289(vec4 x)
					{
						return x - floor(x * (1.0 / 289.0)) * 289.0;
					}

					vec4 permute(vec4 x)
					{
						return mod289(((x*34.0)+1.0)*x);
					}

					vec4 taylorInvSqrt(vec4 r)
					{
						return 1.79284291400159 - 0.85373472095314 * r;
					}

					vec3 fade(vec3 t) {
						return t*t*t*(t*(t*6.0-15.0)+10.0);
					}

					// Classic Perlin noise
					float cnoise(vec3 P)
					{
						vec3 Pi0 = floor(P); // Integer part for indexing
						vec3 Pi1 = Pi0 + vec3(1.0); // Integer part + 1
						Pi0 = mod289(Pi0);
						Pi1 = mod289(Pi1);
						vec3 Pf0 = fract(P); // Fractional part for interpolation
						vec3 Pf1 = Pf0 - vec3(1.0); // Fractional part - 1.0
						vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);
						vec4 iy = vec4(Pi0.yy, Pi1.yy);
						vec4 iz0 = Pi0.zzzz;
						vec4 iz1 = Pi1.zzzz;

						vec4 ixy = permute(permute(ix) + iy);
						vec4 ixy0 = permute(ixy + iz0);
						vec4 ixy1 = permute(ixy + iz1);

						vec4 gx0 = ixy0 * (1.0 / 7.0);
						vec4 gy0 = fract(floor(gx0) * (1.0 / 7.0)) - 0.5;
						gx0 = fract(gx0);
						vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);
						vec4 sz0 = step(gz0, vec4(0.0));
						gx0 -= sz0 * (step(0.0, gx0) - 0.5);
						gy0 -= sz0 * (step(0.0, gy0) - 0.5);

						vec4 gx1 = ixy1 * (1.0 / 7.0);
						vec4 gy1 = fract(floor(gx1) * (1.0 / 7.0)) - 0.5;
						gx1 = fract(gx1);
						vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);
						vec4 sz1 = step(gz1, vec4(0.0));
						gx1 -= sz1 * (step(0.0, gx1) - 0.5);
						gy1 -= sz1 * (step(0.0, gy1) - 0.5);

						vec3 g000 = vec3(gx0.x,gy0.x,gz0.x);
						vec3 g100 = vec3(gx0.y,gy0.y,gz0.y);
						vec3 g010 = vec3(gx0.z,gy0.z,gz0.z);
						vec3 g110 = vec3(gx0.w,gy0.w,gz0.w);
						vec3 g001 = vec3(gx1.x,gy1.x,gz1.x);
						vec3 g101 = vec3(gx1.y,gy1.y,gz1.y);
						vec3 g011 = vec3(gx1.z,gy1.z,gz1.z);
						vec3 g111 = vec3(gx1.w,gy1.w,gz1.w);

						vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));
						g000 *= norm0.x;
						g010 *= norm0.y;
						g100 *= norm0.z;
						g110 *= norm0.w;
						vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));
						g001 *= norm1.x;
						g011 *= norm1.y;
						g101 *= norm1.z;
						g111 *= norm1.w;

						float n000 = dot(g000, Pf0);
						float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));
						float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));
						float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));
						float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));
						float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));
						float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));
						float n111 = dot(g111, Pf1);

						vec3 fade_xyz = fade(Pf0);
						vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);
						vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);
						float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x);
						return 2.2 * n_xyz;
					}

					// Classic Perlin noise, periodic variant
					float pnoise(vec3 P, vec3 rep)
					{
						vec3 Pi0 = mod(floor(P), rep); // Integer part, modulo period
						vec3 Pi1 = mod(Pi0 + vec3(1.0), rep); // Integer part + 1, mod period
						Pi0 = mod289(Pi0);
						Pi1 = mod289(Pi1);
						vec3 Pf0 = fract(P); // Fractional part for interpolation
						vec3 Pf1 = Pf0 - vec3(1.0); // Fractional part - 1.0
						vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);
						vec4 iy = vec4(Pi0.yy, Pi1.yy);
						vec4 iz0 = Pi0.zzzz;
						vec4 iz1 = Pi1.zzzz;

						vec4 ixy = permute(permute(ix) + iy);
						vec4 ixy0 = permute(ixy + iz0);
						vec4 ixy1 = permute(ixy + iz1);

						vec4 gx0 = ixy0 * (1.0 / 7.0);
						vec4 gy0 = fract(floor(gx0) * (1.0 / 7.0)) - 0.5;
						gx0 = fract(gx0);
						vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);
						vec4 sz0 = step(gz0, vec4(0.0));
						gx0 -= sz0 * (step(0.0, gx0) - 0.5);
						gy0 -= sz0 * (step(0.0, gy0) - 0.5);

						vec4 gx1 = ixy1 * (1.0 / 7.0);
						vec4 gy1 = fract(floor(gx1) * (1.0 / 7.0)) - 0.5;
						gx1 = fract(gx1);
						vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);
						vec4 sz1 = step(gz1, vec4(0.0));
						gx1 -= sz1 * (step(0.0, gx1) - 0.5);
						gy1 -= sz1 * (step(0.0, gy1) - 0.5);

						vec3 g000 = vec3(gx0.x,gy0.x,gz0.x);
						vec3 g100 = vec3(gx0.y,gy0.y,gz0.y);
						vec3 g010 = vec3(gx0.z,gy0.z,gz0.z);
						vec3 g110 = vec3(gx0.w,gy0.w,gz0.w);
						vec3 g001 = vec3(gx1.x,gy1.x,gz1.x);
						vec3 g101 = vec3(gx1.y,gy1.y,gz1.y);
						vec3 g011 = vec3(gx1.z,gy1.z,gz1.z);
						vec3 g111 = vec3(gx1.w,gy1.w,gz1.w);

						vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));
						g000 *= norm0.x;
						g010 *= norm0.y;
						g100 *= norm0.z;
						g110 *= norm0.w;
						vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));
						g001 *= norm1.x;
						g011 *= norm1.y;
						g101 *= norm1.z;
						g111 *= norm1.w;

						float n000 = dot(g000, Pf0);
						float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));
						float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));
						float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));
						float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));
						float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));
						float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));
						float n111 = dot(g111, Pf1);

						vec3 fade_xyz = fade(Pf0);
						vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);
						vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);
						float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x);
						return 2.2 * n_xyz;
					}

					#define PI 3.1415926535897932384626433832795

					uniform float time;
					uniform float maxHeight;
					uniform float speed;
					uniform float distortCenter;
					uniform float roadWidth;
					varying float vDisplace;

					varying float fogDepth;

					void main(){

						float t = time * speed;
						float wRoad = distortCenter;
						float wRoad2 = wRoad * 0.5;

						float angleCenter = uv.y * PI*4.0;
						angleCenter += t * 0.9;

						float centerOff = (
							sin(angleCenter) +
							sin(angleCenter*0.5)
						) * wRoad;


						vec3 noiseIn = vec3(uv, 1.0)*10.0;
						float noise = cnoise(vec3(noiseIn.x, noiseIn.y + t, noiseIn.z));
						noise += 1.0;
						float h = noise;
						float angle = (uv.x - centerOff) * PI;
						float f = abs(cos(angle));
						h *= pow(f, 1.5 + roadWidth);


						vDisplace = h;


						h*=maxHeight;

						vec3 transformed = vec3( position.x, position.y, position.z + h );


						vec4 mvPosition = modelViewMatrix * vec4( transformed, 1.0 );
						gl_Position = projectionMatrix * mvPosition;

						fogDepth = -mvPosition.z;

					}




        </script>
			<script id="custom-fragment" type="x-shader/x-fragment">
				uniform float time;
					uniform vec3 color;
					uniform sampler2D pallete;
					varying float vDisplace;

					uniform vec3 fogColor;
					uniform float fogNear;
					uniform float fogFar;
					varying float fogDepth;

					void main(){

						vec2 stripPos = vec2( 0.0, vDisplace );
						vec4 stripColor = texture2D( pallete, stripPos );
						stripColor *= pow(1.0-vDisplace, 1.0);

						gl_FragColor = stripColor;

						#ifdef USE_FOG
							float fogFactor = smoothstep( fogNear, fogFar, fogDepth );
							gl_FragColor.rgb = mix( gl_FragColor.rgb, fogColor, fogFactor );
						#endif
					}




        </script>
			<div style="position: absolute;bottom: 50px;width:100%;text-align:center;">
				<h2 class="content__title"></h2>
				<p style="position: absolute;bottom:50px;margin-bottom:30px;margin-top:30px;letter-spacing:1px;" class="hestia-font content__subtitle">

				</p>
			</div>
		</div>
		<div class="overlay"></div>

	</main>
	<script src="<?=  base_url("assets/main/")?>js/home/vendor/three.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/vendor/Sky.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/vendor/hammer.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/vendor/charming.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/vendor/TweenMax.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/demo2.js"></script>
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
