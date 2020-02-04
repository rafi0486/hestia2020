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

<body class="loading">
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
					<a href="<?=base_url()?>myprofile">MY PROFILE</a>
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
                                      <div class="grid__item" style="background-image: url(data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExMWFhUXGBoYGBgYGB4dHxoYGBgYGBcYGBcaHiggHx0lGxcXITEhJSkrLi4uGB8zODMtNygtLisBCgoKDg0OGxAQGy8mICUrNS8vLTAvLS0tNS0tLS0tLS8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAJ8BPgMBIgACEQEDEQH/xAAcAAACAwEBAQEAAAAAAAAAAAAEBQMGBwIBAAj/xABLEAACAQIEAwUEBQcICgIDAAABAhEDIQAEEjEFQVEGEyJhcTKBkbEUQqHB8AcjUmJystEkM1NzgpLC4RZDVGOTorPS4vEVgzREo//EABoBAAMBAQEBAAAAAAAAAAAAAAIDBAEFAAb/xAAxEQACAgIBAwIDBgYDAAAAAAABAgARAxIhBDFBE1EicYEFFDIzQ2EjNEKR8PFEgsH/2gAMAwEAAhEDEQA/AINJ88diegwyq0VUSb+/7sQpWA2UY+kD2OBPiTx3MJydOQNWlI5xE/A74b5YqFi588JBV1WJ9MG5McrzifLjscyrBnCtQjEkYlWliFaQx2tSOeJtfaXjJz8UjzFIYDWobj4YZN4h54WgANDbeWG4xxzJ+oeiCJxUybsLyfT5YPynDJG0R164NoMkSDMYLTMAhgLc/XAPleqEdiwY72JgbcNBFiTjrJ029kARf1I6/HEv0wEb4hXU3sgk+uFjYimlBKAgrPsxmhTjct1n7sKs1UZ9ycNKfDTfVOPnyUDaRyP8cMQop/eT5FyuOeBEfdY77g4ajK+Xv6Y7GSiCW+wnDjlESOnicUcSLQwyOVEyIx8KXTHjkm+jUVvlyN8fU1U6gC2pSAZWBsDZovuMWfL5VfrCfLlgoZOkRGi3qf44nfqqIl2LoPha/I4lOCY+jlh5xLg+kF0uvMHcf5YVililMiuLE5+XC2NqaC6Dj4JgwU8dCjgi0WEgJp447vDBqOODSx4NNKGA6Me93g3useGljdp7SCrbETjBvd49WhOM2AntSeJFQGIq7kGMMGyum4xwtBdzfAbC7jdGqos0TiCvmdOxjoYJj0gjDRqYG2EXGso7CEEeZ/H2f+i1aY1PJSGzEPFM6qyxZRO/Rov4kIg+6/OcI6mepuZFQap/W+ZH2m/mTJPHEOC1STM7782PRVH4++P/AEfrKJf8yvRru39kbehiPPCXyZValXidXGEZb2h+Xr6kZdUhpIIMgPG8+cA/2cI6mZajXLoxEtqset/8WGlTh2hdUlItqY3n9HSLT+rE3Bg4U5xdVwCpA2IsRtqTy6jliXqjsP3/AGjsQneed48TEmJgOWAHKQeXoSPtwtZz1vgxHLpptbbqbAC8HpG49cBDEJ95Qom3VMnvgYZc4c0gGPlgo5ZRtfHbGbXgz4/7uH5ErqUjhjlbYJGUnEi5RhjWyBotMDqbE71yMeU46YlpUj0n0wRTyZP1YxOWAl6q7cwOoemBmQnfDSpQjpiPucEriLyY2J5glHLM1lUn0Hzw3y/CjA1tHkL/AGzjihVKiOWCBmmwvIzntKenTEotuTJaHDES8k+R/hidlWJEeox9QWdzPlivdpe1lKgrU6YD1rgIQVVNJg1Kr8kFrC52EzaRib5M6uLGCKQRsmcQuyajKkC6mJIBHi9DiHM8UoIPzlakg56nUfM4zvJcPr5le+aktbUS3eZiq6huepaCnSiRsOkYk4dw8yug5CiW+jw1OgWMZqe4MunMKTvbngBk71K26ReNjUs1XthlRUhKlKokSSpJhrg+ypHs8/XDfIVEqqHpurruChBHxGK3wrIV6qJUGeeGkrppKgsSt1BM3BtOBqmSqJUY6A7q2k1soe6qzoWoddL2anhdTEMIO+PLn5IhZOhQoKMvFSnIgD3xy9ev+eAsy4Ck9Lk8htudhbrhDw7tHUVvFWFZJGsGKVVATB1Um8LATJKGbWGLVlPpYYgogUEx4rkTYgDa3Ixhnq0LEmPRauA3tKvW7THxrST84r6RqupAJ1MNJ8oi24Plgmh2lq94pNP80RDCDq1RyP7dttr4myHAHao50/R11MVATU2ksYOppprz8ADkCLiYxPkckWr1aH8rQU4IrPTo93UmJCEUuU+UwcROMpN3OqrdOBVQnhXaBakLUAR2coFuwNgQZi0zF+mIHpiTpuJMEY6fIOlS1JapBsyjTeJ8SudO31gSJtAMSVxHNstF6lWiy6FLSArGw2AVjJ6Cd8UdJkdOGnP6/p8eUXj/AM/9ga0sC8W4imXVWqGmAzaYdwtjNwDc3jbrir8Q7W5l4plxSO2ikgq1z5QJp0/fqOBuEcJrVKveSKLSuqo576u2pQwmo9kBVlMKBvtih+o+GIw/ZuuQbGWhu02SYz9IorPLXt78djiuXKllrU3gEwrqSY5ATvhPxinUoTrzr+GhVrkfR6bnTRNMMJLL4j3gi0WN8DZjhxap3ZrZeswrNQAqZRBLpSWuxDLJjQ25iSIwC9UajX+zsJbuZbaLo6BlDjqG85IiPl6Y6CDnir0snVyjBwlGnrIUNT1Cm5uRTrK3sE/VqLsbHcYtORzdOspKBlZTDo4Eq28GPwRB54Zg6gMAJL1vRHGS6jiQmlj0UPPBfd4kRMUF5zgggwyzdcc1Mm/r6YNvM4JDSpg4WXYR6Y1PeV6pT8oxCUwyzAkk4gNPD1biTOvMXvQ5ix64VZvJEXRZb9JpPyufiq9cWM08cGng9veGpK9pk/E6VQt9ZmAjwL3jAdFVfzVMeQJIwKmQqP8A6plbkzmWPqLTO23PGl8c4vRy4h3GrcILselhtPU28jjP+K8fNbw+JF5wAf7wEJM/WABxNlKAkn+06OJ2YdpXc1QNMkEdJAOx6ekzv08sC4NzdRdUXb9K+/vuPfe/xIrr+PLHOar4lq9pv6U8TUgRgikoKqw5gH4id8SLSx0i8+ZGErI0XywZQyR3J92JMuCPqjDGi0iygYQ+QjtOhgwK34jIaWXxKaBxOFJ6DEgTE5YzoDGKi6tkiemAmy5nD/u/LEGfpoqNUYhVQFmboFEkn3YNc1cGT5elDciJhSx5VKqJYhR1YgfacJKjZjMGXd8vSO1KmYqEf72ruD+rTiP0jjrK9ncsp1CgjNzd17xj6vU1N9uMfq1XjvHYvslmFsalgyeepNZalNv2XU/I4zt+z9SpmKr11OkvVcIzSajI2lDWbaIZAq7aZ2vNxfgtBhDZekfWkv8ADEL8DVR+YZqRGyyWT0NNjb+yVOFfeQfEuxdH6fmS5KlCadxGn1EQcRUuHZekF8CLAoqpa8fRxpoXabrNj1PXEvDajHUjrpdT4gDIIPssp5qYPnIIO2Jc9THhsDIPL9Zh8ht9m8zKCWIBlWQhQCRcky9FVhVUKBsFAAFybAeZJ9+B89wdKgqRKNUFSWH6VSktHUR5Ii2EbYNoqAFjaB8h5n5n1OOc7TkbkfxtB9x/B2OqDtQnnK62e0Uce4aGy+YaoA7jv6iMRLKC9SpTAY3GkECBa0bYGyuVzdVFqHPVfEoYASI1AGLMOuLJWSUKtDWIPQjY/EYAydHu1VASQqhZO5gAXwt3a+8bjRSvaIKnDuIyYzjRJiXqTE2nxbxjkcO4l/tZ/wCJU/jj3tp2hfLhaVIgVHBYsQDpWSBANpJBuQRbbFBoZ+slQ1lquKh3fVJboG1SGHk0jGqHYXcXkzYkais0PL0eJBwrZwhYMENqMiLaXX1vPLAvaWpnBTFKrmjUp1aiU3BVBIZxIlUB2B58sF9n+NnMUg7AB1JV42JgEEDkCCLdZxBxNe8ZJPsur+ukyMDu4NXHpjRxsBC8pwmnSIFJVRfASFFyVYkgnzWBJJxNwrILSCKsmBSUkmZ7qnToqek6aa7AXnE1ehqVvFpAgmNzfaeXX3XtOO8ssabk3Fzvvzm8+seg2w8linPaJCoMh94ZmqSEHWqsNJB1KDKmNS35GBI2sJ2xGmXpMRUCITqLhtIkOU7tmNp1aPCZvAjBGd9j+0PcfFH4+F4xxklGm34ufxHLoNgvU6XcHYb61Pa+UFRNJAI1XU7MpUqVP977PQ4WcI4X3NQ1HYCnoZFd30lQrrFNybOBDFWN1EjnJ64zn62ruaBCGJeqROgGwWmpsXsTJsoixmy2lwSgT3lRO+f+krfnG+Lzp9FgDDcT6AGDlw+qCPeOKvaDJgx9My0j/f0/+7BmWzdOoJp1EqDqjK37pOFlGrSFtVMeWpR9k4mPDKFS5pU2P6QUSPMOtwfMHD/vvusgb7JXw0YxjyMD06D0iPG1SkSAQ5lkJsCHN2WYnVJEzMCMLOPdqKdBu5pqa9cmBTTkYmHYCx28Ik9YF8VpkVxYnMy9NkxNqY2NOcB183SSz1aa/tOo+ZxU+J8J4lmkJrOKSn/VrZVH64WSxjlJM7Yq+b4Mq6gE0U0iarRrduekTpRZ5Cb7k2AZbeBBTErdzNO/+Sy/+0Uf+Kn/AHYB7QcWFGg1SkVqVCQqKCGl2stgb35YyStoHssSIJP27n3bdOm2I1oFpgADYarbxA87HbfC/Ve+BHfdRYNy45vsfVX85XY1areJhcAsdwzDxMOQVdItz2xWeL8PYNDEWtoUBQDFhyAN9jDdRzxxQz1akYGYqBRIim5HIiIkAiQJt13wLTzYgBoa+xiLm/x8+X2Y+VSupHMeqOpu7gXcsdvsM9dzty32xwsbNPW0fYen+WGVWpTJE+I76pJjfmfdy5Yky1GgSTUDXEjSGk3uSZA8rfDE3pi6BjtzXImxdjuJGqgpswaoBeOfOx5wpXbaYNxiyGjG4xn35P37qooNNncAgFHmBE+yYFxykjbbGrrTDAFhBjbp5YfkbU9pCvThroxaqYKoUDv9+CRlhgDiXF6OXKrUqaC/szsTMRPqcK2LcCMXFpy0mzmaWkrNBd1XV3aXdugC7nAD9pYP8xUAJ9p4RQvUm95tBH+ajiPFEqVEmrpqadLU08SsjFgZcCbgE+EzAkYRZcNSLgim9TX41lgyr7SGmQAdJG8C+mN9mLiBHM8cxviafks7Tqgmm6uBY6SDB88Rcb0/R6pYwoRmJPIKNUnythDwbitEVAytFN4ANzqc3hhEq0yTMTIxYuLUg1Gqp2KNPwOEMurSlH2Ezum+Zr3U/RqR2JUNVYciQ3hpz0MnrG2CqfZ6kf5x61U9Xqv+6pVfsxW+JduLkZZAw/pHmD5oguR5k4UVO02bbeuV8kCr8hOJ3Vr71OoMqgTQx2ay3KmV81qVAfiGx0/Da1MTQzDfsV/zi/3rOP7xxnNPjmaBkZir72kfA2w3yPbDNLGvRVHPUNJjyZbT6g4Cj7wg4PiXXI5rWxDp3dVQAyzIgmVZW5qSDHS4ODatINE8gRaOZJ5jzwkyXFqeYh0lWWVZW3WYN+oMWIw4pvhRyFXjDjDLc7ragp0Rqjw6pImLaouR1vOE+ZoZ1omrSWzHwUZ5RpmpV3PK0WvbdzOK5me3GWRijCorC0Oun94392CDkGxMKCqMLq5LNMGDZlri4WlSWdXtCZMQMcng9Ym+are1uDTXwxvApG82j3zgRe2VM7UyeniG3wx4/a/pR+NT/wAcbZM9+GR57sgKrBqj1XIVhJqIY0mUUfmRYyxJ+qes4FPYRIJioTpUgd6ntEnUs9zYKIOrnOwwUe2J/oB/xP8Axx4e2bf0A/4h/wC3BBn7CLIQnmSZXsp3WpaVWsil/wBKmdQ0jxkd3YzK6Z5Tj1+AVf6apsxulI3UjSNxdt/dfHA7adaH/wDT/wAMdL21XnRYejg/MDGEt5hK4AoQh+HZoAgV5nT/AKhOZ8qojTuT5Wk47yeRzQKzVpaVYAzRKkhTciKkXGxj3YEPbmgN0cf3f44l4f2xo13CUqdVjNzpXSPMtq+UnGF2qpoAu/MsVQKRDAEb/CfuJHoSOeI+8RR0/HniCtUwl4hmPPCy5qoxcQJuQ8Zzj1KxTLkKIGuqROk/oouxaADJsARYzaKj2doveqGrNzNVi3/L7I9ABiv5jjT09VOko1lpZ2EhZAAhfrMQPQW3nCbNV6lT+cq1H8ixA/urC/Zh6AlRzUXkdUaquaVQ4BlhYZekP/rX+GJx2ey+4pBD1SUP/IRjJBll6DBuVz1an/N1ai+QYx8DbBen7GL9f9ppHF6tajTFNXNQVSKalvbTVuSyjxKBJ5GwvEkd9kOzAoFqzAamGlB+jTkkknm7nxMfQdZrvBu25BVc2gddu8AgrNiWXaI5jlONVNPFeBiqEe85XX/EwI9oC1PFd7YZVvo7d0gZosoUGbcp/gfTFtKYqf5Sc2lLJPqgs50opuGMH2l2YAS0G0gTO2Hq8hVKImM1swtP2aa96SQecX8jAO+0HbCl6zvuf/WCaVNiZ6K7k+inT8WjHH0Zh4QCSCFAG5ZjAA95j+0MKdmb5S9aEGo0WdlRRLMwUDqxMAYnzFJdRCxpW0/pED2/Qm4HTSLXOGYyhoKXDAuwenT66R4K1ZT0Ld5TU76UczYT5X4cyIGrDQvkRrdpBchSb6ZMkwAbTYjGDESKni4BiugNIY3EAEarC5HIgzO8D7sTfR3FjKkwxvYyCV32ME8/cOZWZOtywolhaSQQIY+AFV9mR1aTNjiTtJlUp12Wm6BbHSitCnmPFLT1m8+l9bGFBIng9mjLv+S2hW79fCSiliSAIBZRsxvHgEieS2NzjYSuME7IcVbLnWHK6gRCgm4ELMG12OL7wj8oQIipTdyAPZAMkxbzvOwjfa0jWwWjzJ9wrEES/il54qfGs/QzDGl3jKaVQBhpYEwSPCwvpJnaxKwd8QZLtHqqVapeVAQBFADeL9IN0Npkc43wbnBRqlvo9RUrl9Mkarz4vDImzCZMXXeAMMVShsxbMMgoSu8cDitTolnWhVp6aRUfWRS8kR4DYkgzIVheQo54jRyhqLSFWoTURUbuGUkmRFQ6vqyjyygzeZ5WnL5DL0tau9P6RUXUXYEjSGBABtdTGxB5wMVTglLV3lZa/ekVyapZVJ7umS1ErVEhToYOVAEao0qcGHue11FyzUOAGh3Qo0i2lfGS4QmDKToEnxTYmIsZw94un8mekzEmojU5gSdY0zAgW1YK+kKlPXMg7by1rADqcZr277WMpajTeauzMu1JY9lees7k8reQExe/xSlMddpn2ey7Uqj0206kOk6TIkR7J6cvKCDcEYXZjN6efux5nM4FsN8R1OHtKs0yyFvsm2E9zK/lPMvn6pNhInofmMGUOOR7Sn3X+cYecL7K1oD914dYYeK4UMdwDM+UY9q8DZUIdGX27vy8KxGsA7z9uBJUmoYGReaMsvZSgYFYggVFAUHeASZPxt7+uLYlQAXMYW5Gl+aoRt3SfuLhlVpAosgGZkEcrCPPniNF3edHI4x4wRCkOE/aPgdOup1KD54bUUACgbQI+A8z9/qcc59JEHb/AC/9/PlqUvT2OsH1dRtMkznZp6DhkJ0gyR5YLpNbF+4pkAQw38J381n78ZzSyDRzxuItyG8RecrwVHcQsuMR95c4Hq5QjrPTEJyNTf7ATP8AnhwElLQ4tiGsLH0t8MQplydift+3E+RyxNRQZ3x5hNU8wLhfAGqEGoSfXGicFyC0lAURiPh3D1KtI9kC3v5i8+kHfY7YYZZAoAG33esm3vPqd8ICkruZeXUN6aiSZ2qFEnCDOVQRI+BsRyII9Z+GLHUWxPS89Op8vWR64VcSoSi2vLf4B0G1x9liCin6Y02grmIyhJn3Giyh6i9bg+QFx57D3Da815s3Wb9WTHT54vfEuHFqVRQJJmB8MKqXZx5BOkQ0+u2xv0weJ1C8mJ6rE5f4BKl31SZDEwJ3/hhlw/OhrHfocWfI9jySYqSwQwGG9xbVNvhgSl2Y1CuGUqy1aMciNbBT9l8E2Va4iV6fJsAZLwfLUXqouYbTSPtH/Cx+qp2LcvLcbvTYNtHu9OXlj87oz0G7msIbkeo6jF37Fdqe7dKNZ4pAwrn6m3hY/wBHb0W02urcb8QOowhu3jvNSKYxzt7UfO5yuiXTLAUFHWrUjvSPONS//V642lha2/KcV/I9laVJAo8R1mozNu1RjqLt5yWPv6YoRh5nNYEdhMmr9nCkqLz3NNfSnrzDE+ugL7xgvgXZN20m4ltWrYhiCCfVU1QeR0+uNUqcDUm4Gm9o5nSB9gI9+DEyyqIAA/z3w8ZQBQEUfUMpnDux9NWeuVBcroph5KoihQq6eg0jbz6ziq9sOLpl37qokulRXEFVIX82+kaSKhTUtpIPhieeL52x7SUsnT8Xjqv/ADdNdzykxcL589hN4xDi2Vdj376dbVDKKtgZ9kx4Rtseh3xgZiCVmonxDaRVZcFkUANcqg5ztpFpgg6V5k+uAK9XQAiiOZM3PrB+zBNemyalZQpm8RbSfrCZ3AiYnfzwugG8x6z92J8jWZWgEe5VSrQbr6xMgH2h9u3P1wfW1pDGky6b+NZvBOzT9WDM/WwLw1TOqNQgzJAExYXsTJm3PoMGcR7W1mU0ZhCR4YGw2UEfVkCwtbrOEKBqSYlti1AQSjnnQFVd1sJ0mCYGxvqPvnbyxcOzb0K2kuy9/IQAWL6TqVxUMaIhRz9gnnigU1DzvYyesbDf1nr9zLLFqYMGCbypMxPInnI5e/C0zNja4T4ge00DP/R0otVaq1ZlV2pA93E0wZtTAUtb6wNjcHFq7KdmaGXy4J7x/AJ7x9QFr6FnSAdrbiMY/lMrqQnUFanJ7t23BUBtPVotoAltrYsvEu0bUaFCjRquXUBi1u7E3I0Ne2yiBpjyxWc2yXAVKao87ddqu6mlSc94RtJIpKZ8Rkn84REDlvz8WU1q5dtCSWY3Pqbkneb49r5hqr6FlmYyxNzJNyT1w07G8KPe1GYTFp6ENG/Wx+GEO3EuxJyBAV7PtNMAFmbvP+VlAk8t98XFMnTp92WXVUVdKKtySAurSDAAmPEYAm5E3Y0qLCEpgSWeWOygOeXMkmwsNzyAYkUYKA+IxEnqIuYEfLCgdgJWwVCanvZ6vmqrVqaigBSKeE6794uv+c8v2OeHGrMKJfKk/wBVVRvsfuzgXsVP0nO2v+YNv6vFtI5YxkW+0wZnHmINQZUcbMoYejAEfYcTVfZX1b/D+PuO2BuG3oUP6qn+4uCqw8Kz1b5Kf4/DY8gwinjOpP8ADEkQ7eg+XqfmfU749zIn8fjp9nlI5U7eg+Xv+Z9Tj2r+Px+PduNX8yY/5X0nNdZPuH7owsfhKgWFzt/HDep7Q9F/dXB60BItyHzGPBbY/OKyNSr8pk/arjNPLM1GmA1X6xOyn9bq3lsMUuhxastQ1NRJO4Ox8oxFnKviao5uzFj1JJk/PAS5gzMW6Ycq1Jy1zQ+DZ2nmgYGiqokr5dQeY+WGlDIwymIvijdj2/llAqd6gU+jWIPxxrVbLQJ8x92CriErcifcPXwVPQfvY9Q/j3nH2T9mp6D94fj7xuOVP49/qfxyGwR+l9Zb+uflDHFiekH0uLzyjeZEdRuBGp+ECObfJBGw2iNrRELGhDHNmPQT8CLzIjrMrG+pfaECr4RaLnlGwUbQOkbCIiEju6fv0TA7dQIkz1MqCVieU7TMXjHo4LUPtVyP6umo/f14J4oIB9Pvx7mu0OVpsVbMU9Q+qp1n+6kn7MBhW17RvU5GBABi/L5B1z9KkleqNVGo0s2oFlI3SApF7iAehBvhzn1bQy1FAdWomVMqymsNJWbi6tY7dTuUCceofT6FeandpSrIzdzVszaNIgpJ2NwCMM+J9pso5aK6Ce4jWCns1mZvbA2BBw/JjtO0nwu3qUe0SflF4ItTRVEgrpFuhe/vvi28F7I5Raah6eo/WZna/nZgMAcT4rTZlpRTqU3AOrWI9qLQRJ2iDO+8YtPeqiMzGFUFmPQASTA8sYDwBUNl5ZveOcrRSmFooICqNKyTCiwAJvHLEiMGEggjyxR6fbvh8mK+kG0904AJmI1DfntyxYOB8eylUhKVemxPsrMExJsrQdumHiQtioRuVxWO23amnkaXJqzD82n+Juij7dh5GdsO09LI0tbQ1RpFOnN2I5noo5n0G5xiJNbO12q1SXZ5G3NgyoFHIKdh+rhigsZM3HEL7OUa+czf0p21Mrq+uoSF1K9MgEjYAHYRAEc8ccTzDr31NxBNXUiAAGmZNQksDAGmoxHtG4PprfA+yq0MslNnZfCS0aYDOdTwSJ3Me60YR8X4SncgZemnflye9LMSigamqKXPeNIEAA3J3iDh6MOwiTYPPaYnnGMadyedzqA+tJ3m5nzJxHUyRAtJNpEddjODMnlmLaiCphSthtPLURa0TPPfFx4Jwnu0BroASo8La0knxy0WLAOo8MgA3uYALh2PMe2XQcSmVapGwieY5+/nviJp33636G9/h8cHZvKMiamU6ZjVe5ibfaeuIHtIAJJK6RvYBgfPmPjiEgoaMJSD2gigjn+B15YYcNrXUO0AzcXjkTAIm3mOWBpneCIgWj19OX24+128uXwjbn7+uBbmaY+GbU02pqSz+EqxCnT+kATdRbcHp64FzBeoWabsTzm4mZJvysOkYgSqdJZTJiI6EAGV5EG/mPPfHdJ9CiDtBmb+cgcgScKdyfpMQBY+7NcAKVXYgwPDJ5nwmR9uLdk8tpBhAtOWG12afE3pIPmT0gTXuy3GXq1O7qTIXwnba51DqRzm2nzOLgD4B+0f3mw4fFyfaXo/A194jyVLMVjrNXuFOqEpqCwDNqhqjyJsNl64b0ezdIwXevUP61Z/kpUfZhFw2vmqgHdilSTkagZ3I66AVVfQk4eUOG12u+dq+iU6SfDwMftwFkGgalOoPNQ6l2dyy3FMgncipUB+Iacd/wDxIX+br5hPSszD+7U1DEA4Kf8Aa83/AMUD5LGPn4ZWHsZyt/bWk498oD9uDBPvM1HtOuH0qtOKTOHpqoCNGlgFgBWAMNb6wjYz1wdW2X1b5Kf8M/2fLUida2YV9Nbu2HKpTlZ/VamxMG8yGIsdsMEqThHqaPGvh3xwtWmBzsPuwnq9p8rAZapYE2IpVSDysRTuZgWOGVJvEv7Q+eMQyWZqoFakzKwBKlRfxBJvHPu0+GH9OnqW0mz2oCD2mut2ryxOod8QFU2oVPZgqGuosTTe/kcManbSgpP5qu2iA2lUMEgkAnXvCm3L3jGUDOnxBa1cbqp0kgp3ZVdYFAGDLSBMGCJPiE9HibzqqVazezbRFjpLqQECxqQctpi5MvGNQbkrMxAvxBK3AKFUGsKuZ7uSoPcU4lENRwAcxJIUFiByGPa/ZOnT0BnzI7x1RPzFLxOzFFAP0mPaUj8DDNeJUlYQK+jS7aQI/PNpUto1aRKd4tpEMAQROPqfHBqqMRmQC8ooqEkCJBGolQ+sK0kGIEbDG6iDU87O9n0p16dZGzL92RUK/R6YkKUJv9IMDxpePreuLpV49SZGPd1wNQWSie1rNIKPztzrRlgTtim//LURsc4AFCJpYghAdn8ZDTpWeoAkk47HGqIqaozGnXcidfdhSyDUTv3rOzXvJN5M+qeo95Yv9JMvSL03NZWIIANIbrUKnZz9ZSLdPfiQcfyutUNSoGap3YBpNOrWUgwTHiEchYxAxQczn2MQ1WVXwl0QsGBDAawuorM+FjEifLA/Dcw5zOXaoxMVaV2iwWopkmPUk8+cxjBiQrUZ6j7beZsOYbTqAuRa3kQZFx06g9GU+IQJV8MREE9NoUDaP0egtFlEIvOZzAkkXEm/vwoz2cMY55yGis6a9OGYOZBxrKrWqjWS6BQBTnw6pMllFmO28xFtzglKtKiILU6QHKVT7LYrSZU1mbVUcJMaFYqCYuWK3NotMWw7yHBqCXWhTB66BPvMThmM/DCdSDxCh2gyw/8A2qH/ABk/7sTpxSi9lrUn8hUU/ZOPBQT9Bf7oxBmOGUXHio029aan5jB8RfP7Ts8Holu8RBTqbh0Gmf2gLMDznFrq0w9N0Ozqy+5gR9+KNS4QqGcuWovyCHwE8g1Iyke4HF4pPA92DPIiiKMR5XshlyGDUgRa37M7fHA2a7IZXLj6S1R6VOkNbaTEmfDfc8gFHM23vasvmU1Ea1npqE4zP8sVc1K9Gkv+rpljF71GA/w29G6YFVUHiLyu5HM7yuTzHGszUzUaaaOKag8gq6wPXxoT+02NN4D2SoZZUhQXQAT58yPfJ9+KHwD8n7BaZGYqUnJBYibc/CJAmNIkyOeNbpIQoBYsQACxiTAiTFpO9sUBzrQkD4QGucVUBBDCQd5xQu2PCKffKwZm0pakIVV06dDPUtpRQrC5klh0xauOVqi6Sr934goJvqJ2VUG5O19t4scZh2i4jVqZxQ2bqU+4VSSG0hmqToTuz4GNiD4TYmbWV2EG7EnzEH4SJT+zOUNXNrTqrYhiwMeJAGWEcyGGoWIsYscbeMlUIp06ZFMhTpkTCppBBUWklgSeWkdTijdgeD1QXK1KjXMaGSogBuVfUoZX1lvO1xbFv45xP6LRo165lpNORCTrCtMaz/R9fcMHk4NCCOSbma9suCuHClgWEsajEjSdPiUtOmSaZIkmxWYJnEnYLhXeGoNX5ygCLSFl2BRg6w0wjCPLzkL+LcAq3bMlkqmpoVWIJaKQdfFfl1PQb4L4dwuvkc1SK1k1OCqmDoaq2mMvX/R1AEBrnUFMWOOflfdjctwJoBxEtPgaJoeuHZHVWmnJHjQOoBhtww+GF/EBTsac23GkgAwsQpJOwmfPlGL3mc5l37ygi1Nbuj08uImnVhxUQm6oisuo3jcjpil5vhVamzBwAEBlwRHhiQOpvsL7kTgAeYeVaX4RF30s2G3PlY9RGC8rFTSqysRJJ8hsNh6Cd9sRZWm1RtIkkzMQTIkkQeXmZ2wW69yzKGbSSbspUk6YYEE2uZuDaDjSB9YjxLX2dzlCijBqvi1RBQwIUQZAMcxBPzxZKdaRZgRuIj8dcZWvhAPQ6p2B5RBsedo54lbj5V1qU/aAgswBJtHw8picat+I7FkA/vLKO1GhmFOnqhmGp20gwSDCgEx6xjr/AE1zA2FFf7LH/HilV+JvUYsZZ2Nydydhtb5DEJSo7BCYJ6mBtqv7sNCD2ht1DnzLwe3eYn+dojy0D/unBdLtxmP9w39lh9ofGetldLMFOoAAyDpkSdi3pgl+HEk+FrMB7IO+qef6uNIqCMzTSch2gbMNpaloIGqVbUp2EGQCDfzm/TD2i2Kn2XoaMvTA/SqfEOw+7FmWgzLIYqJiRvMSPu9cc9l3yUJ19xjwhmhbXty/HXFT7RdlUcl6RKMbnTYH3CMWWjqAGsjV1AgHoY/Hwx7WQtYGPP8Ah58v84xmrBtR3mFk12PaZHmMnmKTQWYgESZPM7X9D8DghM7y5+uLzxLhEnxGTpieoIBmOv8ADlMYplLKnFWFibB8SHqgFor2M4bMnz+zEX0ozF/s88FfRuew6n8beeAlzVIvp2HJuU35/fh1SPYyYV/XHhqzyxMaBG9x1x99HuPUY8RNDGLMnw+pUIkn3nFy4BwhKJDAeLrzxLw/heoMAdMKSY6SBE8t9/LluDqaFbEzHPETbMu3idjGER9PNQ6s+FWce2DqlLXaSBI2MT5dfcN46ThfnMqtNRpNiTaZiApt0Hi+ERIhmz0jpvDGcDL6cq/Es7Upk6XKJadIE6jO5uQIjbzwnq58N7TO/wC05P7zYc8RpSreq/vYrtOiDpiPaIshP6PXFWE/DIOtsZPnOjmqf6Hvt/HEtLNL9UsvoxHyOIcvl5IDCJD+0oXbRyHrjkZMHVp5advMnr6YfZqRiyalk4LxautRAK9pE988qBN5drj3HGtlwynYgg73BBHPqMYHV10ovI6HF84Dw2vToGtTzJSzE0wsrIJmxMAn9IAG+AbkSnCTdTR8tw6iA0UENtgi3+MDFYzvCKCZqpXemyUy6BNKEqe7RQQQotLs/KPB1xaOEs41a3Vjb2V0jnNizfPEuday+796334R4uOPL0Yl7Q9padOg7U6rB7aRTgP66XGwkTY44T8qdEJTApu9QiWBiw2DMVESbGAIE+7C78qNUjIkki1ZI+DRjJ6eZLQrMd5a83m08id/jhoBEh6gm6XtNV43+UbLO+oJUZtDKumqUFORLOpUSHlYkwYkDdgaTxPtCCdYpEVagBrMyIJSB7BUCJMktvJN+WE2dzWpybnpEiGsbCTYkdem2AVIkC8j60393pfDVYiTVfefo/shkaaCo9BiKVQg921PSUfSJMdCNJgeGIIsbycT4X35SmSQQHPeKFBEMo0AGYUzP9gYo3Cfyl08tlqdAqWqIESWO8KdbEgmYYbSPaA5ThD2g7eVKu7mnBsyMdRB1EDQsKFubmTtfBjk3c9fFCC8d4rVzr9+KoLd4pSl3Y1CBAbTqI0gWJMzfcWwmz/EK9QKjlY3lI06QZVoElSCpMiDe42who1R10mDJmJ3N/l7hgjLV4BEnVpaCu8FYYNceGAbXnUcTaynYyw0u1T9/Ur6EFWolNC0EnwqQ7CDYsdMn9WBGBa1eroqOQ+giSWX67MDZiCb7z9uAVrhQGKy4JJ38LapuDYgjpy5zgbO512szs0wYLWHQxtgdbM9txRnDZh1hTaNuVp3HWffj2pWAN79dvn+BiCorbmbdZ+eCaPDX8DFSVY+lr9d+tuhwzURes97zXaSQI0zeOW1oFumIXoQx6enQScMMnlAGBnyjqQTg+pSQMbX5n3ef3YzsYxcZ7xVTybfV3Bt8MGJk2JVp8UzO/l18sE8SptSTWDuyiPW3WcGHLzTBkiLSLT4ntb0+zA7niPVE5v2jDgnZ6nURnaSxYqZCkEQp2dTeSb4Zf6N0jMiZIJkASRMHwaep+OF/ZTh1Ns2yOoYdzPi8VxUifFN4xcxwKhypgelvlhbhr/FGrkx1WgiyhkhSpqgJMMxk/rMWP2thzkv5v8AtH90YT5VYpwJhatZRJmwrVABJ6AR7sNcm8UjP6Y5x9UnqNgpPlEyoBdF4fzZR1PPT8TyruPf8z+PxOO6Zk/jofI/jr7LQVjce/7CRHuiIgRGy+yO6Rv+On8J/wDU4L9b6wf+N9J7nh4h6L8sIV4Paw3v+Psw94h7Y9F+eDspQlKZ6qPuw3EPjb5ybqD/AAk+UxTtHxItUZAfArFQP0iDBc+p2HIRhLqMzODOLADMVQeTn5ziCAbi+HSO457M586xSa6sYAP1WPsx5E2jzGLVVyUAGNiMUns5TnN0R/vE/fXGrZ3LQh933YJRcwmjIuEm9T9g/Y6H8beo3EeYPi/H3gfL3A2HvBj4n/YP2Mp6jp1HqNxFmbNtHuja3QbRERaIhY0LEPyPrOwP5r/rDKJ39PvHqPiD6HbAnFF8Cer/AOA8yfPmbyZYku8tFwNRJgBSSTyAgkmSAABJJJAABJKiWHHEB4FH6zfEaQdwDYqRtIKkEKQUQ1/IMW382P8APeVytTXS2uAvOTAte5xCe6PMH3av44Ozi+Bvd8xhu1MCPX7jheIbCO6nJowFA8SrVmoCFiCbgd2wsNzdcRd1T0OyEE+EGGnY2tNtzhlxhR9Ko/1dX/BgfOLd/wBmn+++Ha0vElx5d8lECdcV4N3oGkgECL7b+QOLRkIWkwJhfFPpJJwlzuYposl2VyCE0k3McwfDYxvgbKcfqo5Lml3Z9kKbrJsSTM73tggrERpbGrGaDk+PZfxRUnY2RyN+ZC4KfiVKqv5tw0aZ3BFzEqYI94wj4T2rpXlTfmCCBE7kX+zDfjSioqlXYAlWDI0ahf6w3Fz8MJZWUcz3DNxKx+U+upyq0zMtVB/uq/8AEfHGaVKYdNK7DYzt5H8T64sXb6sC6UyzsomCzEw0gN9kXxWcvUYEgKGA9TY+mGWSLE5vUCnoSWllWEFSIFz4gYm0kTzxAyuCw9W93WOXzxOhUgsxKeQG3K8i+/uEe/x0EWa53BmY9eePBj5k9nzA3Yk2t0v9+JjVLaTUJNrWmLkxHISSffgSpVFo5fxx3ZrmTfbfph18RlcSTJZQ1CQJIVSx90feQMeVF7owUOrcTIkGIsw2t753w/4TTomsFUnxTO4kRqj0lQfUYcdpOBUqqtmWqOrBCeo8AJsI8tpGF7RypYsGUvPVlaDph/rRsR5c7c5JnAmpg87GfTb02wyP1abmFUmWi+kkajF7xeL4slWvklJrLBIHJW3FhYjcmL+/GF9TVQkxbi7iOtl6lSqlJwmtnMzaSJJm1tW214HXD1VIoKpmdcNA07EgAaY8O29+vQe8EBeoM058VQkAfojnHrt6epx1xA+D0qN/1SMGJ7WhcSUANc+vzwRmH8X4/HLECC9+p+7Elbf3fxwPmF/TDe0F6I2HjS/ywUg/M+8fvVMC8eTVRAA+sh+GD6Q/Nweo+b/j3YX/AEj5xi9z8of2SH8tb+oP/UGL2MULsrbPD9ai4+DBsX0Y1ouV2ifC39dX/wCtUwxyR8DftJ1/WjbzA98RDaThdR9lv66v/wBerghKwC6S0SQZidgwj3hiPfeRKujGQMtmX5VLYKE6zDXWNo+y8eURG1oiIEYlyl9R6QR661H3+oMEAkAEWpUnT15+viJ3v53k9STfHdCsFBBnxWMCbSDzI6e/a243Yetfi57Rvu2vmpLxBrj9kdOW21tuQxYMqvgp+g+7FXzNXX8hO/vxaMqfBT9B92H4SC7ESTqlK40Bn547SrGarD9f7hiDKjwn1+4YM7XLGcrft/cMC5P2Pf8AcMUDvIj2jDs0P5ZQ/rE/6iY2DPr+af0+7GSdmqf8ron/AHifvrjX8+PzVT0+7BrwIJ5MQcCbxt+w3zXHOeYa7eXyt9ke6ItGIuG5gU2JIJBUraOcdbY8zVYM0iY8+u55nmT67mSSx5uw9LXzc73pn7wH8VC8vBPwj11LpiLzMRphpjSQ0HH2fUCmoAgSYiNgqgWFhbSABYACIGkCKk8T5iP4/HaDIvcMJU+5mpqAHQk7zv5m/n6kkySWJLkUYivmLfCx6kPXH+4pzh8De75jDd129f44U55PA3454bvuPX+OPYPwmB1v4x8oi4wP5VRH6lX/AAYD4lTbUYBuqxpP6LM0wPP5eeDOL/8A5VH9ip/gwDxxyoBBIMEeX43xWORIVNNzAslxGoi1kqBmAW+rkCCBY+Z3g4Az796QUUIQCToGmZa0xgPMZss8n2p6TM2vJ/EYL4JSL1Gvst+lyN+e/TywSiyAIhshAMtf5N+B061SsMyvegIpUMzWMmdj6fDF6zWVp0KarSTSshiBLXJgm8nYDFEyXGRlA13BdIDIF3WInVtv0PO2BOIcfqZhQ5qyyADQJA0yfEwiGJYdPs2T1AIOso6fJShp92pqjNCk1LeXlTuAuq52vCzHnimrUCnqecEiDJ6b4P8ApgZTLP4nLM0gSduQnYnrvt1F74BGp6ROqSxAJtYLPLncY1TxRimIaePnjuN7zN/T3xz8sWBuzrLRptImoygHeNU+0CNhE7cz0ugRg4VAFsPO5G8mL4cZzilY0lQVASIMARoIuLxfc8zthq47B/aD8I4MRV4a8wen49ceSNgI8+uJkoktLCfgMFVqKm4UobTpIgwALCLTud98eCE9oJIE/9k=)">
						<div class="name-overlay">ONLINE</div>
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
                                    <div class="grid__item" style="background-image: url(data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExMWFhUXGBoYGBgYGB4dHxoYGBgYGBcYGBcaHiggHx0lGxcXITEhJSkrLi4uGB8zODMtNygtLisBCgoKDg0OGxAQGy8mICUrNS8vLTAvLS0tNS0tLS0tLS8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAJ8BPgMBIgACEQEDEQH/xAAcAAACAwEBAQEAAAAAAAAAAAAEBQMGBwIBAAj/xABLEAACAQIEAwUEBQcICgIDAAABAhEDIQAEEjEFQVEGEyJhcTKBkbEUQqHB8AcjUmJystEkM1NzgpLC4RZDVGOTorPS4vEVgzREo//EABoBAAMBAQEBAAAAAAAAAAAAAAIDBAEFAAb/xAAxEQACAgIBAwIDBgYDAAAAAAABAgARAxIhBDFBE1EicYEFFDIzQ2EjNEKR8PFEgsH/2gAMAwEAAhEDEQA/AINJ88diegwyq0VUSb+/7sQpWA2UY+kD2OBPiTx3MJydOQNWlI5xE/A74b5YqFi588JBV1WJ9MG5McrzifLjscyrBnCtQjEkYlWliFaQx2tSOeJtfaXjJz8UjzFIYDWobj4YZN4h54WgANDbeWG4xxzJ+oeiCJxUybsLyfT5YPynDJG0R164NoMkSDMYLTMAhgLc/XAPleqEdiwY72JgbcNBFiTjrJ029kARf1I6/HEv0wEb4hXU3sgk+uFjYimlBKAgrPsxmhTjct1n7sKs1UZ9ycNKfDTfVOPnyUDaRyP8cMQop/eT5FyuOeBEfdY77g4ajK+Xv6Y7GSiCW+wnDjlESOnicUcSLQwyOVEyIx8KXTHjkm+jUVvlyN8fU1U6gC2pSAZWBsDZovuMWfL5VfrCfLlgoZOkRGi3qf44nfqqIl2LoPha/I4lOCY+jlh5xLg+kF0uvMHcf5YVililMiuLE5+XC2NqaC6Dj4JgwU8dCjgi0WEgJp447vDBqOODSx4NNKGA6Me93g3useGljdp7SCrbETjBvd49WhOM2AntSeJFQGIq7kGMMGyum4xwtBdzfAbC7jdGqos0TiCvmdOxjoYJj0gjDRqYG2EXGso7CEEeZ/H2f+i1aY1PJSGzEPFM6qyxZRO/Rov4kIg+6/OcI6mepuZFQap/W+ZH2m/mTJPHEOC1STM7782PRVH4++P/AEfrKJf8yvRru39kbehiPPCXyZValXidXGEZb2h+Xr6kZdUhpIIMgPG8+cA/2cI6mZajXLoxEtqset/8WGlTh2hdUlItqY3n9HSLT+rE3Bg4U5xdVwCpA2IsRtqTy6jliXqjsP3/AGjsQneed48TEmJgOWAHKQeXoSPtwtZz1vgxHLpptbbqbAC8HpG49cBDEJ95Qom3VMnvgYZc4c0gGPlgo5ZRtfHbGbXgz4/7uH5ErqUjhjlbYJGUnEi5RhjWyBotMDqbE71yMeU46YlpUj0n0wRTyZP1YxOWAl6q7cwOoemBmQnfDSpQjpiPucEriLyY2J5glHLM1lUn0Hzw3y/CjA1tHkL/AGzjihVKiOWCBmmwvIzntKenTEotuTJaHDES8k+R/hidlWJEeox9QWdzPlivdpe1lKgrU6YD1rgIQVVNJg1Kr8kFrC52EzaRib5M6uLGCKQRsmcQuyajKkC6mJIBHi9DiHM8UoIPzlakg56nUfM4zvJcPr5le+aktbUS3eZiq6huepaCnSiRsOkYk4dw8yug5CiW+jw1OgWMZqe4MunMKTvbngBk71K26ReNjUs1XthlRUhKlKokSSpJhrg+ypHs8/XDfIVEqqHpurruChBHxGK3wrIV6qJUGeeGkrppKgsSt1BM3BtOBqmSqJUY6A7q2k1soe6qzoWoddL2anhdTEMIO+PLn5IhZOhQoKMvFSnIgD3xy9ev+eAsy4Ck9Lk8htudhbrhDw7tHUVvFWFZJGsGKVVATB1Um8LATJKGbWGLVlPpYYgogUEx4rkTYgDa3Ixhnq0LEmPRauA3tKvW7THxrST84r6RqupAJ1MNJ8oi24Plgmh2lq94pNP80RDCDq1RyP7dttr4myHAHao50/R11MVATU2ksYOppprz8ADkCLiYxPkckWr1aH8rQU4IrPTo93UmJCEUuU+UwcROMpN3OqrdOBVQnhXaBakLUAR2coFuwNgQZi0zF+mIHpiTpuJMEY6fIOlS1JapBsyjTeJ8SudO31gSJtAMSVxHNstF6lWiy6FLSArGw2AVjJ6Cd8UdJkdOGnP6/p8eUXj/AM/9ga0sC8W4imXVWqGmAzaYdwtjNwDc3jbrir8Q7W5l4plxSO2ikgq1z5QJp0/fqOBuEcJrVKveSKLSuqo576u2pQwmo9kBVlMKBvtih+o+GIw/ZuuQbGWhu02SYz9IorPLXt78djiuXKllrU3gEwrqSY5ATvhPxinUoTrzr+GhVrkfR6bnTRNMMJLL4j3gi0WN8DZjhxap3ZrZeswrNQAqZRBLpSWuxDLJjQ25iSIwC9UajX+zsJbuZbaLo6BlDjqG85IiPl6Y6CDnir0snVyjBwlGnrIUNT1Cm5uRTrK3sE/VqLsbHcYtORzdOspKBlZTDo4Eq28GPwRB54Zg6gMAJL1vRHGS6jiQmlj0UPPBfd4kRMUF5zgggwyzdcc1Mm/r6YNvM4JDSpg4WXYR6Y1PeV6pT8oxCUwyzAkk4gNPD1biTOvMXvQ5ix64VZvJEXRZb9JpPyufiq9cWM08cGng9veGpK9pk/E6VQt9ZmAjwL3jAdFVfzVMeQJIwKmQqP8A6plbkzmWPqLTO23PGl8c4vRy4h3GrcILselhtPU28jjP+K8fNbw+JF5wAf7wEJM/WABxNlKAkn+06OJ2YdpXc1QNMkEdJAOx6ekzv08sC4NzdRdUXb9K+/vuPfe/xIrr+PLHOar4lq9pv6U8TUgRgikoKqw5gH4id8SLSx0i8+ZGErI0XywZQyR3J92JMuCPqjDGi0iygYQ+QjtOhgwK34jIaWXxKaBxOFJ6DEgTE5YzoDGKi6tkiemAmy5nD/u/LEGfpoqNUYhVQFmboFEkn3YNc1cGT5elDciJhSx5VKqJYhR1YgfacJKjZjMGXd8vSO1KmYqEf72ruD+rTiP0jjrK9ncsp1CgjNzd17xj6vU1N9uMfq1XjvHYvslmFsalgyeepNZalNv2XU/I4zt+z9SpmKr11OkvVcIzSajI2lDWbaIZAq7aZ2vNxfgtBhDZekfWkv8ADEL8DVR+YZqRGyyWT0NNjb+yVOFfeQfEuxdH6fmS5KlCadxGn1EQcRUuHZekF8CLAoqpa8fRxpoXabrNj1PXEvDajHUjrpdT4gDIIPssp5qYPnIIO2Jc9THhsDIPL9Zh8ht9m8zKCWIBlWQhQCRcky9FVhVUKBsFAAFybAeZJ9+B89wdKgqRKNUFSWH6VSktHUR5Ii2EbYNoqAFjaB8h5n5n1OOc7TkbkfxtB9x/B2OqDtQnnK62e0Uce4aGy+YaoA7jv6iMRLKC9SpTAY3GkECBa0bYGyuVzdVFqHPVfEoYASI1AGLMOuLJWSUKtDWIPQjY/EYAydHu1VASQqhZO5gAXwt3a+8bjRSvaIKnDuIyYzjRJiXqTE2nxbxjkcO4l/tZ/wCJU/jj3tp2hfLhaVIgVHBYsQDpWSBANpJBuQRbbFBoZ+slQ1lquKh3fVJboG1SGHk0jGqHYXcXkzYkais0PL0eJBwrZwhYMENqMiLaXX1vPLAvaWpnBTFKrmjUp1aiU3BVBIZxIlUB2B58sF9n+NnMUg7AB1JV42JgEEDkCCLdZxBxNe8ZJPsur+ukyMDu4NXHpjRxsBC8pwmnSIFJVRfASFFyVYkgnzWBJJxNwrILSCKsmBSUkmZ7qnToqek6aa7AXnE1ehqVvFpAgmNzfaeXX3XtOO8ssabk3Fzvvzm8+seg2w8linPaJCoMh94ZmqSEHWqsNJB1KDKmNS35GBI2sJ2xGmXpMRUCITqLhtIkOU7tmNp1aPCZvAjBGd9j+0PcfFH4+F4xxklGm34ufxHLoNgvU6XcHYb61Pa+UFRNJAI1XU7MpUqVP977PQ4WcI4X3NQ1HYCnoZFd30lQrrFNybOBDFWN1EjnJ64zn62ruaBCGJeqROgGwWmpsXsTJsoixmy2lwSgT3lRO+f+krfnG+Lzp9FgDDcT6AGDlw+qCPeOKvaDJgx9My0j/f0/+7BmWzdOoJp1EqDqjK37pOFlGrSFtVMeWpR9k4mPDKFS5pU2P6QUSPMOtwfMHD/vvusgb7JXw0YxjyMD06D0iPG1SkSAQ5lkJsCHN2WYnVJEzMCMLOPdqKdBu5pqa9cmBTTkYmHYCx28Ik9YF8VpkVxYnMy9NkxNqY2NOcB183SSz1aa/tOo+ZxU+J8J4lmkJrOKSn/VrZVH64WSxjlJM7Yq+b4Mq6gE0U0iarRrduekTpRZ5Cb7k2AZbeBBTErdzNO/+Sy/+0Uf+Kn/AHYB7QcWFGg1SkVqVCQqKCGl2stgb35YyStoHssSIJP27n3bdOm2I1oFpgADYarbxA87HbfC/Ve+BHfdRYNy45vsfVX85XY1areJhcAsdwzDxMOQVdItz2xWeL8PYNDEWtoUBQDFhyAN9jDdRzxxQz1akYGYqBRIim5HIiIkAiQJt13wLTzYgBoa+xiLm/x8+X2Y+VSupHMeqOpu7gXcsdvsM9dzty32xwsbNPW0fYen+WGVWpTJE+I76pJjfmfdy5Yky1GgSTUDXEjSGk3uSZA8rfDE3pi6BjtzXImxdjuJGqgpswaoBeOfOx5wpXbaYNxiyGjG4xn35P37qooNNncAgFHmBE+yYFxykjbbGrrTDAFhBjbp5YfkbU9pCvThroxaqYKoUDv9+CRlhgDiXF6OXKrUqaC/szsTMRPqcK2LcCMXFpy0mzmaWkrNBd1XV3aXdugC7nAD9pYP8xUAJ9p4RQvUm95tBH+ajiPFEqVEmrpqadLU08SsjFgZcCbgE+EzAkYRZcNSLgim9TX41lgyr7SGmQAdJG8C+mN9mLiBHM8cxviafks7Tqgmm6uBY6SDB88Rcb0/R6pYwoRmJPIKNUnythDwbitEVAytFN4ANzqc3hhEq0yTMTIxYuLUg1Gqp2KNPwOEMurSlH2Ezum+Zr3U/RqR2JUNVYciQ3hpz0MnrG2CqfZ6kf5x61U9Xqv+6pVfsxW+JduLkZZAw/pHmD5oguR5k4UVO02bbeuV8kCr8hOJ3Vr71OoMqgTQx2ay3KmV81qVAfiGx0/Da1MTQzDfsV/zi/3rOP7xxnNPjmaBkZir72kfA2w3yPbDNLGvRVHPUNJjyZbT6g4Cj7wg4PiXXI5rWxDp3dVQAyzIgmVZW5qSDHS4ODatINE8gRaOZJ5jzwkyXFqeYh0lWWVZW3WYN+oMWIw4pvhRyFXjDjDLc7ragp0Rqjw6pImLaouR1vOE+ZoZ1omrSWzHwUZ5RpmpV3PK0WvbdzOK5me3GWRijCorC0Oun94392CDkGxMKCqMLq5LNMGDZlri4WlSWdXtCZMQMcng9Ym+are1uDTXwxvApG82j3zgRe2VM7UyeniG3wx4/a/pR+NT/wAcbZM9+GR57sgKrBqj1XIVhJqIY0mUUfmRYyxJ+qes4FPYRIJioTpUgd6ntEnUs9zYKIOrnOwwUe2J/oB/xP8Axx4e2bf0A/4h/wC3BBn7CLIQnmSZXsp3WpaVWsil/wBKmdQ0jxkd3YzK6Z5Tj1+AVf6apsxulI3UjSNxdt/dfHA7adaH/wDT/wAMdL21XnRYejg/MDGEt5hK4AoQh+HZoAgV5nT/AKhOZ8qojTuT5Wk47yeRzQKzVpaVYAzRKkhTciKkXGxj3YEPbmgN0cf3f44l4f2xo13CUqdVjNzpXSPMtq+UnGF2qpoAu/MsVQKRDAEb/CfuJHoSOeI+8RR0/HniCtUwl4hmPPCy5qoxcQJuQ8Zzj1KxTLkKIGuqROk/oouxaADJsARYzaKj2doveqGrNzNVi3/L7I9ABiv5jjT09VOko1lpZ2EhZAAhfrMQPQW3nCbNV6lT+cq1H8ixA/urC/Zh6AlRzUXkdUaquaVQ4BlhYZekP/rX+GJx2ey+4pBD1SUP/IRjJBll6DBuVz1an/N1ai+QYx8DbBen7GL9f9ppHF6tajTFNXNQVSKalvbTVuSyjxKBJ5GwvEkd9kOzAoFqzAamGlB+jTkkknm7nxMfQdZrvBu25BVc2gddu8AgrNiWXaI5jlONVNPFeBiqEe85XX/EwI9oC1PFd7YZVvo7d0gZosoUGbcp/gfTFtKYqf5Sc2lLJPqgs50opuGMH2l2YAS0G0gTO2Hq8hVKImM1swtP2aa96SQecX8jAO+0HbCl6zvuf/WCaVNiZ6K7k+inT8WjHH0Zh4QCSCFAG5ZjAA95j+0MKdmb5S9aEGo0WdlRRLMwUDqxMAYnzFJdRCxpW0/pED2/Qm4HTSLXOGYyhoKXDAuwenT66R4K1ZT0Ld5TU76UczYT5X4cyIGrDQvkRrdpBchSb6ZMkwAbTYjGDESKni4BiugNIY3EAEarC5HIgzO8D7sTfR3FjKkwxvYyCV32ME8/cOZWZOtywolhaSQQIY+AFV9mR1aTNjiTtJlUp12Wm6BbHSitCnmPFLT1m8+l9bGFBIng9mjLv+S2hW79fCSiliSAIBZRsxvHgEieS2NzjYSuME7IcVbLnWHK6gRCgm4ELMG12OL7wj8oQIipTdyAPZAMkxbzvOwjfa0jWwWjzJ9wrEES/il54qfGs/QzDGl3jKaVQBhpYEwSPCwvpJnaxKwd8QZLtHqqVapeVAQBFADeL9IN0Npkc43wbnBRqlvo9RUrl9Mkarz4vDImzCZMXXeAMMVShsxbMMgoSu8cDitTolnWhVp6aRUfWRS8kR4DYkgzIVheQo54jRyhqLSFWoTURUbuGUkmRFQ6vqyjyygzeZ5WnL5DL0tau9P6RUXUXYEjSGBABtdTGxB5wMVTglLV3lZa/ekVyapZVJ7umS1ErVEhToYOVAEao0qcGHue11FyzUOAGh3Qo0i2lfGS4QmDKToEnxTYmIsZw94un8mekzEmojU5gSdY0zAgW1YK+kKlPXMg7by1rADqcZr277WMpajTeauzMu1JY9lees7k8reQExe/xSlMddpn2ey7Uqj0206kOk6TIkR7J6cvKCDcEYXZjN6efux5nM4FsN8R1OHtKs0yyFvsm2E9zK/lPMvn6pNhInofmMGUOOR7Sn3X+cYecL7K1oD914dYYeK4UMdwDM+UY9q8DZUIdGX27vy8KxGsA7z9uBJUmoYGReaMsvZSgYFYggVFAUHeASZPxt7+uLYlQAXMYW5Gl+aoRt3SfuLhlVpAosgGZkEcrCPPniNF3edHI4x4wRCkOE/aPgdOup1KD54bUUACgbQI+A8z9/qcc59JEHb/AC/9/PlqUvT2OsH1dRtMkznZp6DhkJ0gyR5YLpNbF+4pkAQw38J381n78ZzSyDRzxuItyG8RecrwVHcQsuMR95c4Hq5QjrPTEJyNTf7ATP8AnhwElLQ4tiGsLH0t8MQplydift+3E+RyxNRQZ3x5hNU8wLhfAGqEGoSfXGicFyC0lAURiPh3D1KtI9kC3v5i8+kHfY7YYZZAoAG33esm3vPqd8ICkruZeXUN6aiSZ2qFEnCDOVQRI+BsRyII9Z+GLHUWxPS89Op8vWR64VcSoSi2vLf4B0G1x9liCin6Y02grmIyhJn3Giyh6i9bg+QFx57D3Da815s3Wb9WTHT54vfEuHFqVRQJJmB8MKqXZx5BOkQ0+u2xv0weJ1C8mJ6rE5f4BKl31SZDEwJ3/hhlw/OhrHfocWfI9jySYqSwQwGG9xbVNvhgSl2Y1CuGUqy1aMciNbBT9l8E2Va4iV6fJsAZLwfLUXqouYbTSPtH/Cx+qp2LcvLcbvTYNtHu9OXlj87oz0G7msIbkeo6jF37Fdqe7dKNZ4pAwrn6m3hY/wBHb0W02urcb8QOowhu3jvNSKYxzt7UfO5yuiXTLAUFHWrUjvSPONS//V642lha2/KcV/I9laVJAo8R1mozNu1RjqLt5yWPv6YoRh5nNYEdhMmr9nCkqLz3NNfSnrzDE+ugL7xgvgXZN20m4ltWrYhiCCfVU1QeR0+uNUqcDUm4Gm9o5nSB9gI9+DEyyqIAA/z3w8ZQBQEUfUMpnDux9NWeuVBcroph5KoihQq6eg0jbz6ziq9sOLpl37qokulRXEFVIX82+kaSKhTUtpIPhieeL52x7SUsnT8Xjqv/ADdNdzykxcL589hN4xDi2Vdj376dbVDKKtgZ9kx4Rtseh3xgZiCVmonxDaRVZcFkUANcqg5ztpFpgg6V5k+uAK9XQAiiOZM3PrB+zBNemyalZQpm8RbSfrCZ3AiYnfzwugG8x6z92J8jWZWgEe5VSrQbr6xMgH2h9u3P1wfW1pDGky6b+NZvBOzT9WDM/WwLw1TOqNQgzJAExYXsTJm3PoMGcR7W1mU0ZhCR4YGw2UEfVkCwtbrOEKBqSYlti1AQSjnnQFVd1sJ0mCYGxvqPvnbyxcOzb0K2kuy9/IQAWL6TqVxUMaIhRz9gnnigU1DzvYyesbDf1nr9zLLFqYMGCbypMxPInnI5e/C0zNja4T4ge00DP/R0otVaq1ZlV2pA93E0wZtTAUtb6wNjcHFq7KdmaGXy4J7x/AJ7x9QFr6FnSAdrbiMY/lMrqQnUFanJ7t23BUBtPVotoAltrYsvEu0bUaFCjRquXUBi1u7E3I0Ne2yiBpjyxWc2yXAVKao87ddqu6mlSc94RtJIpKZ8Rkn84REDlvz8WU1q5dtCSWY3Pqbkneb49r5hqr6FlmYyxNzJNyT1w07G8KPe1GYTFp6ENG/Wx+GEO3EuxJyBAV7PtNMAFmbvP+VlAk8t98XFMnTp92WXVUVdKKtySAurSDAAmPEYAm5E3Y0qLCEpgSWeWOygOeXMkmwsNzyAYkUYKA+IxEnqIuYEfLCgdgJWwVCanvZ6vmqrVqaigBSKeE6794uv+c8v2OeHGrMKJfKk/wBVVRvsfuzgXsVP0nO2v+YNv6vFtI5YxkW+0wZnHmINQZUcbMoYejAEfYcTVfZX1b/D+PuO2BuG3oUP6qn+4uCqw8Kz1b5Kf4/DY8gwinjOpP8ADEkQ7eg+XqfmfU749zIn8fjp9nlI5U7eg+Xv+Z9Tj2r+Px+PduNX8yY/5X0nNdZPuH7owsfhKgWFzt/HDep7Q9F/dXB60BItyHzGPBbY/OKyNSr8pk/arjNPLM1GmA1X6xOyn9bq3lsMUuhxastQ1NRJO4Ox8oxFnKviao5uzFj1JJk/PAS5gzMW6Ycq1Jy1zQ+DZ2nmgYGiqokr5dQeY+WGlDIwymIvijdj2/llAqd6gU+jWIPxxrVbLQJ8x92CriErcifcPXwVPQfvY9Q/j3nH2T9mp6D94fj7xuOVP49/qfxyGwR+l9Zb+uflDHFiekH0uLzyjeZEdRuBGp+ECObfJBGw2iNrRELGhDHNmPQT8CLzIjrMrG+pfaECr4RaLnlGwUbQOkbCIiEju6fv0TA7dQIkz1MqCVieU7TMXjHo4LUPtVyP6umo/f14J4oIB9Pvx7mu0OVpsVbMU9Q+qp1n+6kn7MBhW17RvU5GBABi/L5B1z9KkleqNVGo0s2oFlI3SApF7iAehBvhzn1bQy1FAdWomVMqymsNJWbi6tY7dTuUCceofT6FeandpSrIzdzVszaNIgpJ2NwCMM+J9pso5aK6Ce4jWCns1mZvbA2BBw/JjtO0nwu3qUe0SflF4ItTRVEgrpFuhe/vvi28F7I5Raah6eo/WZna/nZgMAcT4rTZlpRTqU3AOrWI9qLQRJ2iDO+8YtPeqiMzGFUFmPQASTA8sYDwBUNl5ZveOcrRSmFooICqNKyTCiwAJvHLEiMGEggjyxR6fbvh8mK+kG0904AJmI1DfntyxYOB8eylUhKVemxPsrMExJsrQdumHiQtioRuVxWO23amnkaXJqzD82n+Juij7dh5GdsO09LI0tbQ1RpFOnN2I5noo5n0G5xiJNbO12q1SXZ5G3NgyoFHIKdh+rhigsZM3HEL7OUa+czf0p21Mrq+uoSF1K9MgEjYAHYRAEc8ccTzDr31NxBNXUiAAGmZNQksDAGmoxHtG4PprfA+yq0MslNnZfCS0aYDOdTwSJ3Me60YR8X4SncgZemnflye9LMSigamqKXPeNIEAA3J3iDh6MOwiTYPPaYnnGMadyedzqA+tJ3m5nzJxHUyRAtJNpEddjODMnlmLaiCphSthtPLURa0TPPfFx4Jwnu0BroASo8La0knxy0WLAOo8MgA3uYALh2PMe2XQcSmVapGwieY5+/nviJp33636G9/h8cHZvKMiamU6ZjVe5ibfaeuIHtIAJJK6RvYBgfPmPjiEgoaMJSD2gigjn+B15YYcNrXUO0AzcXjkTAIm3mOWBpneCIgWj19OX24+128uXwjbn7+uBbmaY+GbU02pqSz+EqxCnT+kATdRbcHp64FzBeoWabsTzm4mZJvysOkYgSqdJZTJiI6EAGV5EG/mPPfHdJ9CiDtBmb+cgcgScKdyfpMQBY+7NcAKVXYgwPDJ5nwmR9uLdk8tpBhAtOWG12afE3pIPmT0gTXuy3GXq1O7qTIXwnba51DqRzm2nzOLgD4B+0f3mw4fFyfaXo/A194jyVLMVjrNXuFOqEpqCwDNqhqjyJsNl64b0ezdIwXevUP61Z/kpUfZhFw2vmqgHdilSTkagZ3I66AVVfQk4eUOG12u+dq+iU6SfDwMftwFkGgalOoPNQ6l2dyy3FMgncipUB+Iacd/wDxIX+br5hPSszD+7U1DEA4Kf8Aa83/AMUD5LGPn4ZWHsZyt/bWk498oD9uDBPvM1HtOuH0qtOKTOHpqoCNGlgFgBWAMNb6wjYz1wdW2X1b5Kf8M/2fLUida2YV9Nbu2HKpTlZ/VamxMG8yGIsdsMEqThHqaPGvh3xwtWmBzsPuwnq9p8rAZapYE2IpVSDysRTuZgWOGVJvEv7Q+eMQyWZqoFakzKwBKlRfxBJvHPu0+GH9OnqW0mz2oCD2mut2ryxOod8QFU2oVPZgqGuosTTe/kcManbSgpP5qu2iA2lUMEgkAnXvCm3L3jGUDOnxBa1cbqp0kgp3ZVdYFAGDLSBMGCJPiE9HibzqqVazezbRFjpLqQECxqQctpi5MvGNQbkrMxAvxBK3AKFUGsKuZ7uSoPcU4lENRwAcxJIUFiByGPa/ZOnT0BnzI7x1RPzFLxOzFFAP0mPaUj8DDNeJUlYQK+jS7aQI/PNpUto1aRKd4tpEMAQROPqfHBqqMRmQC8ooqEkCJBGolQ+sK0kGIEbDG6iDU87O9n0p16dZGzL92RUK/R6YkKUJv9IMDxpePreuLpV49SZGPd1wNQWSie1rNIKPztzrRlgTtim//LURsc4AFCJpYghAdn8ZDTpWeoAkk47HGqIqaozGnXcidfdhSyDUTv3rOzXvJN5M+qeo95Yv9JMvSL03NZWIIANIbrUKnZz9ZSLdPfiQcfyutUNSoGap3YBpNOrWUgwTHiEchYxAxQczn2MQ1WVXwl0QsGBDAawuorM+FjEifLA/Dcw5zOXaoxMVaV2iwWopkmPUk8+cxjBiQrUZ6j7beZsOYbTqAuRa3kQZFx06g9GU+IQJV8MREE9NoUDaP0egtFlEIvOZzAkkXEm/vwoz2cMY55yGis6a9OGYOZBxrKrWqjWS6BQBTnw6pMllFmO28xFtzglKtKiILU6QHKVT7LYrSZU1mbVUcJMaFYqCYuWK3NotMWw7yHBqCXWhTB66BPvMThmM/DCdSDxCh2gyw/8A2qH/ABk/7sTpxSi9lrUn8hUU/ZOPBQT9Bf7oxBmOGUXHio029aan5jB8RfP7Ts8Holu8RBTqbh0Gmf2gLMDznFrq0w9N0Ozqy+5gR9+KNS4QqGcuWovyCHwE8g1Iyke4HF4pPA92DPIiiKMR5XshlyGDUgRa37M7fHA2a7IZXLj6S1R6VOkNbaTEmfDfc8gFHM23vasvmU1Ea1npqE4zP8sVc1K9Gkv+rpljF71GA/w29G6YFVUHiLyu5HM7yuTzHGszUzUaaaOKag8gq6wPXxoT+02NN4D2SoZZUhQXQAT58yPfJ9+KHwD8n7BaZGYqUnJBYibc/CJAmNIkyOeNbpIQoBYsQACxiTAiTFpO9sUBzrQkD4QGucVUBBDCQd5xQu2PCKffKwZm0pakIVV06dDPUtpRQrC5klh0xauOVqi6Sr934goJvqJ2VUG5O19t4scZh2i4jVqZxQ2bqU+4VSSG0hmqToTuz4GNiD4TYmbWV2EG7EnzEH4SJT+zOUNXNrTqrYhiwMeJAGWEcyGGoWIsYscbeMlUIp06ZFMhTpkTCppBBUWklgSeWkdTijdgeD1QXK1KjXMaGSogBuVfUoZX1lvO1xbFv45xP6LRo165lpNORCTrCtMaz/R9fcMHk4NCCOSbma9suCuHClgWEsajEjSdPiUtOmSaZIkmxWYJnEnYLhXeGoNX5ygCLSFl2BRg6w0wjCPLzkL+LcAq3bMlkqmpoVWIJaKQdfFfl1PQb4L4dwuvkc1SK1k1OCqmDoaq2mMvX/R1AEBrnUFMWOOflfdjctwJoBxEtPgaJoeuHZHVWmnJHjQOoBhtww+GF/EBTsac23GkgAwsQpJOwmfPlGL3mc5l37ygi1Nbuj08uImnVhxUQm6oisuo3jcjpil5vhVamzBwAEBlwRHhiQOpvsL7kTgAeYeVaX4RF30s2G3PlY9RGC8rFTSqysRJJ8hsNh6Cd9sRZWm1RtIkkzMQTIkkQeXmZ2wW69yzKGbSSbspUk6YYEE2uZuDaDjSB9YjxLX2dzlCijBqvi1RBQwIUQZAMcxBPzxZKdaRZgRuIj8dcZWvhAPQ6p2B5RBsedo54lbj5V1qU/aAgswBJtHw8picat+I7FkA/vLKO1GhmFOnqhmGp20gwSDCgEx6xjr/AE1zA2FFf7LH/HilV+JvUYsZZ2Nydydhtb5DEJSo7BCYJ6mBtqv7sNCD2ht1DnzLwe3eYn+dojy0D/unBdLtxmP9w39lh9ofGetldLMFOoAAyDpkSdi3pgl+HEk+FrMB7IO+qef6uNIqCMzTSch2gbMNpaloIGqVbUp2EGQCDfzm/TD2i2Kn2XoaMvTA/SqfEOw+7FmWgzLIYqJiRvMSPu9cc9l3yUJ19xjwhmhbXty/HXFT7RdlUcl6RKMbnTYH3CMWWjqAGsjV1AgHoY/Hwx7WQtYGPP8Ah58v84xmrBtR3mFk12PaZHmMnmKTQWYgESZPM7X9D8DghM7y5+uLzxLhEnxGTpieoIBmOv8ADlMYplLKnFWFibB8SHqgFor2M4bMnz+zEX0ozF/s88FfRuew6n8beeAlzVIvp2HJuU35/fh1SPYyYV/XHhqzyxMaBG9x1x99HuPUY8RNDGLMnw+pUIkn3nFy4BwhKJDAeLrzxLw/heoMAdMKSY6SBE8t9/LluDqaFbEzHPETbMu3idjGER9PNQ6s+FWce2DqlLXaSBI2MT5dfcN46ThfnMqtNRpNiTaZiApt0Hi+ERIhmz0jpvDGcDL6cq/Es7Upk6XKJadIE6jO5uQIjbzwnq58N7TO/wC05P7zYc8RpSreq/vYrtOiDpiPaIshP6PXFWE/DIOtsZPnOjmqf6Hvt/HEtLNL9UsvoxHyOIcvl5IDCJD+0oXbRyHrjkZMHVp5advMnr6YfZqRiyalk4LxautRAK9pE988qBN5drj3HGtlwynYgg73BBHPqMYHV10ovI6HF84Dw2vToGtTzJSzE0wsrIJmxMAn9IAG+AbkSnCTdTR8tw6iA0UENtgi3+MDFYzvCKCZqpXemyUy6BNKEqe7RQQQotLs/KPB1xaOEs41a3Vjb2V0jnNizfPEuday+796334R4uOPL0Yl7Q9padOg7U6rB7aRTgP66XGwkTY44T8qdEJTApu9QiWBiw2DMVESbGAIE+7C78qNUjIkki1ZI+DRjJ6eZLQrMd5a83m08id/jhoBEh6gm6XtNV43+UbLO+oJUZtDKumqUFORLOpUSHlYkwYkDdgaTxPtCCdYpEVagBrMyIJSB7BUCJMktvJN+WE2dzWpybnpEiGsbCTYkdem2AVIkC8j60393pfDVYiTVfefo/shkaaCo9BiKVQg921PSUfSJMdCNJgeGIIsbycT4X35SmSQQHPeKFBEMo0AGYUzP9gYo3Cfyl08tlqdAqWqIESWO8KdbEgmYYbSPaA5ThD2g7eVKu7mnBsyMdRB1EDQsKFubmTtfBjk3c9fFCC8d4rVzr9+KoLd4pSl3Y1CBAbTqI0gWJMzfcWwmz/EK9QKjlY3lI06QZVoElSCpMiDe42who1R10mDJmJ3N/l7hgjLV4BEnVpaCu8FYYNceGAbXnUcTaynYyw0u1T9/Ur6EFWolNC0EnwqQ7CDYsdMn9WBGBa1eroqOQ+giSWX67MDZiCb7z9uAVrhQGKy4JJ38LapuDYgjpy5zgbO512szs0wYLWHQxtgdbM9txRnDZh1hTaNuVp3HWffj2pWAN79dvn+BiCorbmbdZ+eCaPDX8DFSVY+lr9d+tuhwzURes97zXaSQI0zeOW1oFumIXoQx6enQScMMnlAGBnyjqQTg+pSQMbX5n3ef3YzsYxcZ7xVTybfV3Bt8MGJk2JVp8UzO/l18sE8SptSTWDuyiPW3WcGHLzTBkiLSLT4ntb0+zA7niPVE5v2jDgnZ6nURnaSxYqZCkEQp2dTeSb4Zf6N0jMiZIJkASRMHwaep+OF/ZTh1Ns2yOoYdzPi8VxUifFN4xcxwKhypgelvlhbhr/FGrkx1WgiyhkhSpqgJMMxk/rMWP2thzkv5v8AtH90YT5VYpwJhatZRJmwrVABJ6AR7sNcm8UjP6Y5x9UnqNgpPlEyoBdF4fzZR1PPT8TyruPf8z+PxOO6Zk/jofI/jr7LQVjce/7CRHuiIgRGy+yO6Rv+On8J/wDU4L9b6wf+N9J7nh4h6L8sIV4Paw3v+Psw94h7Y9F+eDspQlKZ6qPuw3EPjb5ybqD/AAk+UxTtHxItUZAfArFQP0iDBc+p2HIRhLqMzODOLADMVQeTn5ziCAbi+HSO457M586xSa6sYAP1WPsx5E2jzGLVVyUAGNiMUns5TnN0R/vE/fXGrZ3LQh933YJRcwmjIuEm9T9g/Y6H8beo3EeYPi/H3gfL3A2HvBj4n/YP2Mp6jp1HqNxFmbNtHuja3QbRERaIhY0LEPyPrOwP5r/rDKJ39PvHqPiD6HbAnFF8Cer/AOA8yfPmbyZYku8tFwNRJgBSSTyAgkmSAABJJJAABJKiWHHEB4FH6zfEaQdwDYqRtIKkEKQUQ1/IMW382P8APeVytTXS2uAvOTAte5xCe6PMH3av44Ozi+Bvd8xhu1MCPX7jheIbCO6nJowFA8SrVmoCFiCbgd2wsNzdcRd1T0OyEE+EGGnY2tNtzhlxhR9Ko/1dX/BgfOLd/wBmn+++Ha0vElx5d8lECdcV4N3oGkgECL7b+QOLRkIWkwJhfFPpJJwlzuYposl2VyCE0k3McwfDYxvgbKcfqo5Lml3Z9kKbrJsSTM73tggrERpbGrGaDk+PZfxRUnY2RyN+ZC4KfiVKqv5tw0aZ3BFzEqYI94wj4T2rpXlTfmCCBE7kX+zDfjSioqlXYAlWDI0ahf6w3Fz8MJZWUcz3DNxKx+U+upyq0zMtVB/uq/8AEfHGaVKYdNK7DYzt5H8T64sXb6sC6UyzsomCzEw0gN9kXxWcvUYEgKGA9TY+mGWSLE5vUCnoSWllWEFSIFz4gYm0kTzxAyuCw9W93WOXzxOhUgsxKeQG3K8i+/uEe/x0EWa53BmY9eePBj5k9nzA3Yk2t0v9+JjVLaTUJNrWmLkxHISSffgSpVFo5fxx3ZrmTfbfph18RlcSTJZQ1CQJIVSx90feQMeVF7owUOrcTIkGIsw2t753w/4TTomsFUnxTO4kRqj0lQfUYcdpOBUqqtmWqOrBCeo8AJsI8tpGF7RypYsGUvPVlaDph/rRsR5c7c5JnAmpg87GfTb02wyP1abmFUmWi+kkajF7xeL4slWvklJrLBIHJW3FhYjcmL+/GF9TVQkxbi7iOtl6lSqlJwmtnMzaSJJm1tW214HXD1VIoKpmdcNA07EgAaY8O29+vQe8EBeoM058VQkAfojnHrt6epx1xA+D0qN/1SMGJ7WhcSUANc+vzwRmH8X4/HLECC9+p+7Elbf3fxwPmF/TDe0F6I2HjS/ywUg/M+8fvVMC8eTVRAA+sh+GD6Q/Nweo+b/j3YX/AEj5xi9z8of2SH8tb+oP/UGL2MULsrbPD9ai4+DBsX0Y1ouV2ifC39dX/wCtUwxyR8DftJ1/WjbzA98RDaThdR9lv66v/wBerghKwC6S0SQZidgwj3hiPfeRKujGQMtmX5VLYKE6zDXWNo+y8eURG1oiIEYlyl9R6QR661H3+oMEAkAEWpUnT15+viJ3v53k9STfHdCsFBBnxWMCbSDzI6e/a243Yetfi57Rvu2vmpLxBrj9kdOW21tuQxYMqvgp+g+7FXzNXX8hO/vxaMqfBT9B92H4SC7ESTqlK40Bn547SrGarD9f7hiDKjwn1+4YM7XLGcrft/cMC5P2Pf8AcMUDvIj2jDs0P5ZQ/rE/6iY2DPr+af0+7GSdmqf8ron/AHifvrjX8+PzVT0+7BrwIJ5MQcCbxt+w3zXHOeYa7eXyt9ke6ItGIuG5gU2JIJBUraOcdbY8zVYM0iY8+u55nmT67mSSx5uw9LXzc73pn7wH8VC8vBPwj11LpiLzMRphpjSQ0HH2fUCmoAgSYiNgqgWFhbSABYACIGkCKk8T5iP4/HaDIvcMJU+5mpqAHQk7zv5m/n6kkySWJLkUYivmLfCx6kPXH+4pzh8De75jDd129f44U55PA3454bvuPX+OPYPwmB1v4x8oi4wP5VRH6lX/AAYD4lTbUYBuqxpP6LM0wPP5eeDOL/8A5VH9ip/gwDxxyoBBIMEeX43xWORIVNNzAslxGoi1kqBmAW+rkCCBY+Z3g4Az796QUUIQCToGmZa0xgPMZss8n2p6TM2vJ/EYL4JSL1Gvst+lyN+e/TywSiyAIhshAMtf5N+B061SsMyvegIpUMzWMmdj6fDF6zWVp0KarSTSshiBLXJgm8nYDFEyXGRlA13BdIDIF3WInVtv0PO2BOIcfqZhQ5qyyADQJA0yfEwiGJYdPs2T1AIOso6fJShp92pqjNCk1LeXlTuAuq52vCzHnimrUCnqecEiDJ6b4P8ApgZTLP4nLM0gSduQnYnrvt1F74BGp6ROqSxAJtYLPLncY1TxRimIaePnjuN7zN/T3xz8sWBuzrLRptImoygHeNU+0CNhE7cz0ugRg4VAFsPO5G8mL4cZzilY0lQVASIMARoIuLxfc8zthq47B/aD8I4MRV4a8wen49ceSNgI8+uJkoktLCfgMFVqKm4UobTpIgwALCLTud98eCE9oJIE/9k=)">
						<div class="name-overlay">GENERAL</div>
					</div>
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
				<li class="Mobilemenu__item"><a class="Mobilemenu__link"  href="#">SPONSORS</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="#">ABOUT</a></li>
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
