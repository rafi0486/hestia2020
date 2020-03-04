<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157830270-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157830270-1');
</script>

	<title>My Events | <?=APP_TITLE?></title>
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
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>fonts/font-awesome-4.3.0/css/font-awesome.min.css" />

	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/about/demo2.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/normalize.css" />

	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/sponsor/style6.css" />
	<link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/menuMain.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/dmhendricks/bootstrap-grid-css@4.1.3/dist/css/bootstrap-grid.min.css"/>

	<script src="<?=  base_url("assets/main/")?>js/sponsor/modernizr-custom.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style type="text/css">

            a.btn-custom{
                         padding:7px 8px;
                           border:1px solid transparent;
                           transition: all 0.5s

            }

            a.btn-custom:hover{

                border:1px solid white;




            }


        </style>
</head>

<body class="demo-6" style="min-height: 100vh;overflow-y: auto;">
	<div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
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
	<div class="container">

		<div style="position:absolute;top:35px;z-index:100;width:100%;">
			<section>
				<nav class="links hestia-font desktoponly" style="background-color:transparent !important;">
					<a href="<?=base_url()?>events">EVENTS</a>
					<a href="<?=base_url()?>sponsors">SPONSORS</a>
					<a href="<?=base_url()?>"><img style="max-height: 75px;position:relative;top:25px" src="<?=  base_url("assets/main/")?>img/logo.png" /></a>
					<a href="<?=base_url()?>about">ABOUT</a>
					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
					<a href="<?= $google_login_url ?>">LOGIN</a>
					<?php } else{ ?>
					<a href="<?=base_url()?>Auth/logout">LOGOUT</a>
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
		</div>
		<nav class="Mobilemenu">
			<button class="btn btn--close">
				<svg class="icon icon--cross">
					<use xlink:href="#icon-cross"></use>
				</svg>
			</button>
			<ul class="Mobilemenu__inner">
				<li class="Mobilemenu__item"><a class="Mobilemenu__link  " href="<?=base_url()?>events">EVENTS</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link"  href="<?=base_url()?>sponsors">SPONSORS</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>about">ABOUT</a></li>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>contact">CONTACT</a></li>

					<?php if($this->session->userdata('sess_logged_in')==0){ ?>
				<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?= $google_login_url ?>">LOGIN</a></li>
				<?php }else { ?>
					<li class="Mobilemenu__item"><a class="Mobilemenu__link" href="<?=base_url()?>Auth/logout">LOGOUT</a></li>
				<?php } ?>
			</ul>
		</nav>
		<div class="content bootstrap-wrapper" style="margin-top: 150px; margin-bottom:100px;">
			<div class="sponsor-heading">
				MY EVENTS
			</div>

			<p align="justify">
 <?php
           //print_r($_SESSION['myev']);
           //print_r($myevents[0]);
           //print_r('hii222');
           //print_r($myevents[0]['link']);

           if (empty($myevents)) {

                echo '<div class="col-12 listing1" style="padding-bottom: 20px;">';
                echo '<p class="event-name-text text-light" >It looks empty here..</p>';
                echo '<p class="text-danger text-light" >You havent registered for any event. Checkout the events catalogue and register soon..</p>';							


     // list is empty.
            }
          foreach($myevents as $row){
          ?>



               <div class="row listing1" style="padding-bottom: 20px;position:relative;">
                   <div class="col-md-8">
                       <h3 class="event-name-text text-light" onclick=<?php echo "'location.href =\"".base_url().'events/'.$row['link']."\"'"; ?> style="letter-spacing: 3px;color:white;text-align: left; cursor:pointer;"><?=$row['title']?></h3>
                       <p class="event-desc"><?php
                   if(strlen($row['venue'])!=0)
                   {echo 'Venue: '.$row['venue'].'<br/>';}
                   else
                   {
                    echo 'Check back later for more event details..';
                   }

                   ?></p>

                        <?php //schedule

                   if (count($row['time'])>0) {
                    ?>
                    <p class="event-desc">Schedule:</p>
                    <?php
                        foreach($row['time'] as $timerow){
                            $timerow = (array) $timerow; ?>
                            <div style="padding-left: 15px;">
                            <p class="event-desc">

                                <?php if ($timerow['label'] != NULL) echo $timerow['label'].": ";
                                $start_time=date('d-M h:i A', strtotime($timerow['start_time']));
                                $end_time=date('d-M h:i A', strtotime($timerow['end_time']));
                                $dt_start=substr($start_time, 0, 5);
                                $dt_end=substr($end_time, 0, 5);
                                if ($dt_start == $dt_end) {
                                    $end_time=date('h:i A', strtotime($timerow['end_time']));
                                }
                                ?>
                                <?php
                                 if ($timerow['end_time'] == NULL) {
                                                echo 'Starts on '.$start_time;
                                 }
                                else
                                    echo $start_time.' to '.$end_time;

                                 ?>
                                </p>
                            </div>

                        <?php
                        }
                }


                   ?>
                   <?php
                      $date_not_over=$this->report_model->check_files_lastdate($this->report_model->get_eid_by_link($row['link']));
                   if ($row['file1'] != NULL && $row['u_file1'] == NULL && $date_not_over){
                     echo "<form  class='form-inline row'  action='".base_url("pages/url_submitted")."' method='post'>";
                     echo "<input style='min-width:250px;' type='hidden' name='link' value=".$row['link'].'  />';

                     echo "<div style='margin-right:auto' class='form-group col-md-4 col-sm-12'><input  class='form-control'  style='padding:.2em;min-width:250px;'  type='text' name='f1' placeholder='". $row['file1']."' required /></div>";

                     if ($row['file2'] != NULL && $row['u_file2'] == NULL ){
                      echo "<div style='min-width:250px;'  class='form-group col-md-4 col-sm-12 file2'><input  class='form-control'  style='padding:.2em;min-width:250px;' style='' type='text' name='f2' placeholder='". $row['file2']."' required /></div>";
                     }

                     echo "<div class='form-group col-md-4 col-sm-12'><button type='submit' style='margin-top:20px;border: 2px solid #fff;padding: .2em;' class='btn btn-default' >Submit</button></div>";
                    echo "</form>";

                    echo "<p class=\"text-danger\">"?>
                    <?php
                    if($row['file_last_date']){
                      echo "Last Date for submission is ".date('d-M', strtotime($row['file_last_date']))."<br>";
                    }

                    ?>
                    <?php echo "Fill in the links to all required files and click submit. File links cannot be edited after submission</p>";
                   }
                   else
                   {
                     if(! $date_not_over)
                     {
                      echo "<p class=\"text-danger\">Last date to submit links over</p>";

                     }
                     if($row['u_file1']!=NULL)
                     {
                    echo "<form  class='form-inline'>";
                    echo " <div class='form-group col-md-6 col-sm-12' style='min-width:250px;'>    <label>". $row['file1']."</label>                    <input type='text' style='min-width:250px;padding: 1px;'   class='form-control'  value='". $row['u_file1']."' disabled/></div>";
                    if($row['u_file2']!=NULL)
                     {
                    echo " <div style='min-width:250px;'  class='form-group file2 col-md-6 col-sm-12'><label>". $row['file2']."</label><input type='text' style='min-width:250px;padding: 1px;'  class='form-control'  value='". $row['u_file2']."' disabled/></div>";
                     }
                    echo "</form>";
                     }
                   }


                    ?>
                   </div>
                   <div class="col-md-4" style="padding-top:10px;">
                       <?php

                   if($row['result']){
                       echo "<a href='#'  class='btn btn-success btn-result' onclick='viewresult(".$row['event_id'].")'>Result &nbsp;<i class='fas fa-trophy'></i></a><br/><br/>";
                       echo "<div hidden><div id='".$row['event_id']."'>".$row['resulthtml']."</div></div>";
                   }

                   if($row['certificate']==1){
                       echo "<a href='#'  class='btn btn-success btn-result btn-custom' onclick='viewcertificate(".$row['event_id'].",0)'>Download Certificate &nbsp;<i class='material-icons' style='position:relative;top:4px;font-size: 18px;' >arrow_downward</i></a><br/><br/>";


                   }else if($row['certificate']==0){
                                              echo "<a href='".base_url("myprofile")."'  class='btn btn-warning btn-result'>Verify Profile To Download Certificate &nbsp;<i class='fas fa-check'></i></a>";

                   }else if(in_array($row['certificate'], [101,102,103])){
                                              echo "<a href='#'  class='btn btn-success btn-result btn-custom' onclick='viewcertificate(".$row['event_id'].",1)'>Download Certificate &nbsp;<i class='material-icons' style='position:relative;top:4px;font-size: 18px;' >arrow_downward</i></a><br/><br/>";

                   }else{
                       
                   }

                   ?>


                   </div>





               </div>
                          <hr/>



      <?php


      }

      ?>



			</p>


			<!-- /preview -->
		</div>
		<!-- /content -->
	</div>
	<!-- /container -->
	<script src="<?=  base_url("assets/main/")?>js/home/anime.min.js"></script>
	<script src="<?=  base_url("assets/main/")?>js/home/main.js"></script>
	<script>
             function viewcertificate(elem,ctype){

          var url="<?=base_url()?>";
          if(ctype==0){
                        url=url+"Certificate/Get/"+elem;

    }else if(ctype==1){
        
                  url=url+"Certificate/Appreciation/"+elem;

    }
          window.location=url;
      }
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
