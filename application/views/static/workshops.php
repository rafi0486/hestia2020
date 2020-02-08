<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157830270-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157830270-1');
</script>

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
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/menuMain.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/dmhendricks/bootstrap-grid-css@4.1.3/dist/css/bootstrap-grid.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/bs-modal.css">
        <style rel="stylesheet" type="text/css">
            .small-text{
                font-size:2.5rem;
            }
            .box__text {
                cursor: pointer !important;
                pointer-events:auto;

            }
            .box__text-inner{
                   cursor: pointer !important;
                    pointer-events:auto;
            }
            .overlay--open {
                     overflow-y: scroll;
                     background-color: #ececec;

            }


        .modal {
                position: fixed;
                max-width: 700px;
                width: 90%;
                z-index: 1001;
                font-size: 1.1em;
                pointer-events: none;
                top: 50%;
                left: 50%;
                transform: translate3d(-50%,-50%,0);
        }

        .modal--open {
                pointer-events: visible;
        }

        .modal__inner {
                padding: 2.5em;
                color: #fff;
                background: #aaa;
        }

        .modal__title {
                font-size: 1.5em;
                margin: 0 0 1em 0;
        }
        .overlay__content{
            font-size : 1.25rem;
        }

        .overlay__content * {
           font-family: 'Montserrat', sans-serif;
        }
        .box__text-inner.text-warning{
                font-size: 1.2rem;

        }
        </style>
            <style>
      .overlay__item {
        height: auto;
        align-items: flex-start;
      }
      .overlay__content {
        margin-top: 0px !important;
      }
      .box {
        margin-top: 10vh !important;
      }
      .box__text {
        top: auto;
        bottom: -6rem;
      }

      @media screen and (max-width: 900px) {
        .overlay__content {
          margin-top: 17vh !important;
        }
        .box {
          margin-top: 5vh !important;
        }
      }
			.show-button{
					 display: block !important;
			 }
			 .box__text-inner{
					 display: none;
			 }
    </style>
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

<body style="font-family: 'Montserrat', sans-serif;">
	<!-- <div id="preloader">
		<div id="status">&nbsp;</div>
	</div> -->
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
        <div class="modal modal-lg  bootstrap-wrapper" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Error</h4>
                        <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">


                        <form id="team_form" method="post" action="<?=  base_url("payment/prepay.php")?>" name="team_form" style="display: none;">

                        <input type="hidden" id="json_data" name="json_data" hidden/>
                        <input type="hidden" id="evdd"  hidden/>
                            <div class="row" style='margin-bottom:10px;'>
                                <div class="col-md-8 col-sm-12" id="div_mail0"><input class="form-control" type="email" id="email0" placeholder="Email" value="<?php if(isset($_SESSION['email']))echo $_SESSION['email'];?>"; readonly></div>
                                <div class="col-md-4 col-sm-12" id="div_acm0"><label class="checkbox-inline chk_acommodation">
                                            <input type="checkbox" class="chk_acm"  id="chk_acm0">&nbsp;&nbsp;Accommodation
                                            </label></div>
                            </div>
                            <div id="team_form_members">

                            </div>
                            <div id="team_form_members_opt">
                            </div>

                            <div>
                            <div class="col-md-12 col-sm-12 mt-3" id="email_note"><p><span class="text-danger">Only gmail addresses are allowed</span></p></div>

                                <button type="button" class="btn btn-warning my-2 " name="addMoreMembers" id="addmoreMembersBtn">Add Member&nbsp;<i class="fas fa-plus-square"></i></button><br>
        <input type="submit" id="team_form_hid_btn" hidden/>


                          <div class="row container" style="margin: 10px 0px 15px 0px;">
                            <div class="col-xs-6 ml-3 mt-3">
                              <div class="center">
                                <p class="form-check-label">
                                  Accommodation for:
                                </p>
                                <label class="checkbox-inline chk_ac_day">
                                  <input
                                    type="checkbox"
                                    id="day_1"
                                    value="1"
                                    disabled=""
                                  />&nbsp;&nbsp;Feb 27
                                </label>&nbsp;&nbsp;
                                <label class="checkbox-inline chk_ac_day">
                                  <input
                                    type="checkbox"
                                    id="day_2"
                                    value="2"
                                    disabled=""
                                  />&nbsp;&nbsp;Feb 28
                                </label>&nbsp;&nbsp;
                                <label class="checkbox-inline chk_ac_day">
                                  <input
                                    type="checkbox"
                                    id="day_3"
                                    value="3"
                                    disabled=""
                                  />&nbsp;&nbsp;Feb 29
                                </label>&nbsp;&nbsp;
                                <label class="checkbox-inline chk_ac_day">
                                  <input
                                    type="checkbox"
                                    id="day_4"
                                    value="4"
                                    disabled=""
                                  />&nbsp;&nbsp;March 1
                                </label>
                              </div>
                            </div>
                          </div>

                                <div class="row" style='margin-bottom:10px;'>
                                <div class="col-md-12 col-sm-12"><input class="form-control" type="text" id="referralcode" placeholder="Referral Code" value=""; ></div>
                                <div class="col-md-12 col-sm-12 mt-3"><p><span class="text-danger">Note:</span> Schedule may change and accommodation dates can be changed accordingly </p></div>
                            </div>




                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary modal-redirect" data-dismiss="modal">OK</button>
                    </div>

                </div>
            </div>
        </div>

		<div style="width:100%;">
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
					<a href="<?=base_url()?>" style="margin-right: 20px;">
						<img style="max-height: 65px;" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>

					<i class="material-icons btn--menu" style="cursor:pointer;color:white;font-size: 40px;float:right;margin:15px">
						menu
					</i>
				</div>
			</section>
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

		<div class="">
			<div class="grid" style="margin-top: 140px;padding-bottom: 100px">

                            <?php
            $cntr=-1;
          foreach($events as $row){

              $cntr++;
          ?>

                            <a style="z-index:99;" class="grid__item" href="#preview-<?=$cntr?>">
					<div class="box">
						<div class="box__shadow"></div>
						<img class="box__img" src="<?= base_url("assets/uploads/event_images/").$row->image_name ?>" alt="<?=$row->title?>" />
						 <?php
              $extra_btitle="";
              if($cntr%4==0){

              }elseif($cntr%4==1){


              }
              elseif($cntr%4==2){
                  $extra_btitle="box__title--bottom";

              }
              elseif($cntr%4==3){
                  $extra_btitle="box__title--straight box__title--left";
              }
              if(strlen($row->short_title)>12){
                  $extra_box__title="small-text";
              }else{
                  $extra_box__title="";
              }

              ?>
                                                <h3 class="hestia-font box__title <?=$extra_btitle?>">
							<span class="box__title-inner <?=$extra_box__title?>" ><?=$row->short_title?></span>
						</h3>


					</div>
				</a>





      <?php

      }

      ?>
			</div>
		</div>
		<div class="overlay">
			<div class="overlay__reveal"></div>
			  <?php
                        $cntr=-1;
          foreach($events as $event){

              $cntr++;
              ?>


              <div class="overlay__item" id="preview-<?=$cntr?>">
          <div class="box">
            <div class="box__shadow"></div>
            <img
              class="box__img box__img--original"
              src="<?= base_url("assets/uploads/event_images/").$event->image_name ?>"
              alt="<?=$event->title?>"
            />
            <h3 class="box__title">
              <span class="box__title-inner"><?=$event->title?></span>
            </h3>
            <?=$event->btn?>



          </div>
                  <div class="overlay__content" style="margin-top:40vw;font-family: 'Montserrat', sans-serif;">

              <div>

                      <?=$event->details?>
              </div>
              <?php
                        if($event->prize!=NULL && $event->prize!="0"){

                        ?> <h3>Prizes Worth : <?=$event->prize?></h3>
                    <?php
                    }
              ?>
            <?php
            if($event->reg_fee){
                ?>
                <h4>Registration Fee: ₹<?=$event->reg_fee?> per <?=$event->fee_type?></h4>

                <?php
            }else if($event->reg_fee == 0){
                ?>
                <h4>Registration Fee: Free</h4>
                <?php
            }
            if($event->syllabus_link){
              ?>
              <h4><a href="<?=$event->syllabus_link?>" target="_blank">Syllabus</a><h4>
                <?php
            }

            if ($event->reg_fee !== NULL && $event->reg_end !== '') {
                ?>
                <h5>Online Registration closes on: <?=$event->reg_end?></h5>

                <?php
            }
            ?>
             <?php

                            $schedule=$event->schedule;
                            if (count($schedule)>0) {
                                ?>
                                <br>
                                    <h3>Schedule</h3>
                                <?php
                                    foreach($schedule as $timerow){
                                        $timerow = (array) $timerow; ?>
                                        <div style="padding-left: 15px;">
                                        <h5>
                                            <?php
                                            if ($timerow['label'] != NULL) echo $timerow['label'].": ";
                                            $start_time=date('d-M h:i A', strtotime($timerow['start_time']));
                                            if ($timerow['end_time'] == NULL) {
                                                echo 'Starts on '.$start_time;
                                            } else {
                                                $end_time=date('d-M h:i A', strtotime($timerow['end_time']));
                                                $dt_start=substr($start_time, 0, 5);
                                                $dt_end=substr($end_time, 0, 5);
                                                if ($dt_start == $dt_end) {
                                                    $end_time=date('h:i A', strtotime($timerow['end_time']));
                                                }
                                                echo $start_time.' to '.$end_time;
                                            }
                                            ?>
                                            </h5>
                                        </div>

                                    <?php
                                    }
                            }
                            ?>
            <h3>Coordinators</h3>
             <div style="padding-left: 15px;">
                 <a style="text-decoration: none;color:black;" href="tel:+91<?=$event->co1_no?>"><h5><?=$event->co1_name?> : <?=$event->co1_no?></h5></a>
                 <a style="text-decoration: none;;color:black;" href="tel:+91<?=$event->co2_no?>"><h5><?=$event->co2_name?> : <?=$event->co2_no?></h5></a>
             </div>

            <br/>

            <br/>
          </div>
        </div>



              <?php
          }

        ?>

			<button class="overlay__close" style="z-index:99">
				<svg style="color:black;"class="icon icon--cross">
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
        <script type="text/javascript">
            $('.overlay__close').click(function(){
                $('#myModal').hide();
            });

          var maxmemb=0;
          var minmemb=0;
          var rem_members=0;
          $('.modal-close').click(function(){
              $('#myModal').hide();
          });

          $('.modal-redirect').click(function(){
              window.location.href="<?=base_url();?>";
          });

              jQuery('.modal-body').on('change','.chk_acm',
          function(){



              checkBoxValidate();

          });

      function checkBoxValidate(){

          var flg=false;
              $('.chk_acm').each(function(i, obj) {

                  if($(obj).prop('checked')){
                      flg=true;

                  }

                  });
                  if(flg==true){
                      $("#day_1").prop('disabled',false);
                    $("#day_2").prop('disabled',false);
                    $("#day_3").prop('disabled',false);
                    $("#day_4").prop('disabled',false);
                  }else{
                      $("#day_1").prop('disabled',true);
                    $("#day_2").prop('disabled',true);
                    $("#day_3").prop('disabled',true);
                    $("#day_4").prop('disabled',true);
                    $("#day_1").prop('checked',false);
                    $("#day_2").prop('checked',false);
                    $("#day_3").prop('checked',false);
                    $("#day_4").prop('checked',false);
                  }
      }
          function vm(oid){
                $("#team_form").trigger("reset");
              var eid=oid;
             $url="<?=base_url("process/")?>"+eid;
              $.ajax({
                  type:'post',
                  url:$url,
                  data:"",
                  async: false,
                  processData: false,
                  contentType: false,
                  beforeSend:function(){
                      // launchpreloader();
                  },
                  complete:function(){
                      //  stopPreloader();
                  },
                  success:function(result){

                      $("#evdd").val(eid);
                      var array = JSON.parse(result);

                      switch(array[0]){
                          case 505:{
                              if (typeof(Storage) !== "undefined") {
                                  localStorage.setItem("pre_login_url", window.location.href);

                                  document.cookie = "book=Clicked";

                              }
                            window.location="<?=$google_login_url?>";

                              break;
                          }
                          case 200:{
                              $('.chk_team').css('display','inline');
                              $('#team_form').css('display','block');
                              $('#chk_acm0').prop('checked','true');
                              $('.chk_acommodation').css('display','none');
                              $('#div_acm0').css('display','none');

                              $('#div_mail0').addClass('col-md-12').removeClass('col-md-8');

                                $("#day_1").prop('disabled',false);
                                $("#day_2").prop('disabled',false);
                                $("#day_3").prop('disabled',false);
                                $("#day_4").prop('disabled',false);
                              $('.modal-title').text("Details");
                              $('#myModal').show();
                                  $("#addmoreMembersBtn").css({
                                      "display": "none"
                                  });
                                  var acc=array[2];
                                  for(var i=1;i<=4;i++){
                                          if(acc.includes(i+"")){

                                              $("#day_"+i).prop('disabled','true');
                                              $("#day_"+i).prop('checked','true');
                                              $("#day_"+i).removeClass("chk_acm");
                                          }else{


                                          }
                                  }
                              $('.modal-footer').html("<button type='button' class='btn btn-success' name='team_form_submit' class='team_form_submit' onclick='team_form_sumbit()' >Submit&nbsp;<i class='fas fa-check-circle'></i></button>");
                              break;
                          }
                          case 201:{
                              maxmemb=array[2];
                              minmemb=array[1];
                              $('.chk_team').css('display','inline');
                              rem_members=maxmemb-minmemb-1;
                              $("#day_1").prop('disabled',true);
                              $("#day_2").prop('disabled',true);
                              $("#day_3").prop('disabled',true);
                              $("#day_4").prop('disabled',true);
                              var n=minmemb-1;
                              var html="";
                              while(n>0){
                                  html+=" <div class='row' style='margin-bottom:10px;'><div class='col-md-8 col-sm-12'><input class='form-control' type='email' id='email"+(minmemb-n)+"' placeholder='Email' required></div><div class='col-md-4 col-sm-12'><label class='checkbox-inline chk_acommodation'><input type='checkbox'  class='chk_acm'  id='chk_acm"+(minmemb-n)+"'>&nbsp;&nbsp;Accommodation</label></div></div>";
                                  n--;
                              }
                              $('#team_form_members').html(html);
                              $('#team_form').css('display','block');

                              $('.modal-title').text("Add Members");

                              $('#myModal').show();
                              if(rem_members<0){
                                  $("#addmoreMembersBtn").css({
                                      "display": "none"

                                  });

                              }
                              $('.modal-footer').html("<button type='button' class='btn btn-success' name='team_form_submit' class='team_form_submit' onclick='team_form_sumbit()' >Submit&nbsp;<i class='fas fa-check-circle'></i></button>");


                              break;
                          }
                          }




                  }
              });




          }
          $('.btn-result').click(function(){

              $('.modal-title').text("Winners");
              $('.modal-body').html("");


              $('.modal-redirect').remove();
              $('#myModal').show();



          });
          $("#addmoreMembersBtn").click(function() {
              $('.close-href').hide();
              var old=$('#team_form_members_opt').html();
              var cur_cnt=$("#team_form_members_opt > div").length;
              $('.close-href').css('display','none');
             // $('.close-href').show(); // Shows
               // hides
              if(cur_cnt<=rem_members){
                  var html=" <div class='row' style='margin-bottom:10px;' id='member_"+(minmemb+cur_cnt)+"'><div class='col-md-8 col-sm-12'><input class='form-control' type='email' id='email"+(minmemb+cur_cnt)+"' placeholder='Email' required> </div><div class='col-md-4 col-sm-12'><a id='member_"+(minmemb+cur_cnt)+"_close' class='close-href text-white' style='border: 0;float:left;position:absolute;left:-50px;' onclick='removeElement("+(minmemb+cur_cnt)+")'><button  class='btn btn-xs btn-danger'>X</button></a><label class='checkbox-inline chk_acommodation'><input type='checkbox'   class='chk_acm' id='chk_acm"+(minmemb+cur_cnt)+"'>&nbsp;&nbsp;Accommodation</label></div></div>";
                  $('#team_form_members_opt').html(old+html);

              }
              if(cur_cnt>=rem_members){
                  $("#addmoreMembersBtn").prop("disabled",true);
              }


              });
          function  removeElement(_id){
                  $("#member_"+_id).remove();
              $("#member_"+(_id-1)+"_close").css('display','block');

              $("#addmoreMembersBtn").prop("disabled",false);
              checkBoxValidate();
          }
          function team_form_sumbit(){


              emails_josn = [];
              $("input[type=email]").each(function() {
                  email = {};
                  email["email"] = $(this).val();

                  if($(this).attr('id')!="email0"){
                      var email_regex = /^[a-zA-Z0-9._-]+@gmail.com$/i;
                      var mailid=$(this).val();
                      if(!email_regex.test(mailid)){

                          e.preventDefault();
                          return false;

                      }

                  }


                  var chkid=$(this).attr('id');
                  chkid=chkid.replace("email","chk_acm");
                  if($("#"+chkid).is(":checked")==true){
                      email["acc"] = "Y";
                  }else{
                      email["acc"] = "N";
                  }

                  emails_josn.push(email);
              });
              var days_cm="";
              for(var i=1;i<=4;i++){

                  if($("#day_"+i).is(":checked")==true && $("#day_"+i).is(':enabled')){
                      if(days_cm==""){
                          days_cm=$("#day_"+i).val();
                      }else{
                          days_cm=days_cm+""+$("#day_"+i).val();
                      }
                      email["acc"] = "Y";
                  }
              }
              jsonObj = [];
              item = {};
              item ["event_id"] =$('#evdd').val();
              item ["referral_code"] = $('#referralcode').val();
              item ["reg_email"] = "<?php
              if(isset($_SESSION['email'])){
                  echo $_SESSION['email'];
              }
              ?>";
              item ["accommodation_days"] = days_cm;
              item ["emails"] = emails_josn;
              jsonObj.push(item);
              $('#json_data').val(JSON.stringify(item));



              $('#team_form_hid_btn').click();


          }


          </script>


</body>

</html>
