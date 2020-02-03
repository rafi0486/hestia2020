<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
      My Profile | <?=APP_TITLE?>
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
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/event-listing.css" />
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/linkStyles.css" />
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
    <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/demo.css" />
    <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/normalize.css" />
    <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/pater.css" />
    <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/revealer.css" />
    <link rel="stylesheet" href="<?=  base_url("assets/main/")?>css/bs-modal.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style rel="stylesheet" type="text/css">
        .small-text{
            font-size:2.5rem;
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

  <body class="loading">
    <svg class="hidden">
      <symbol id="icon-arrow" viewBox="0 0 24 24">
        <title>arrow</title>
        <polygon
          points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "
        />
      </symbol>
      <symbol id="icon-drop" viewBox="0 0 24 24">
        <title>drop</title>
        <path
          d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"
        />
        <path
          d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"
        />
      </symbol>
      <symbol id="icon-cross" viewBox="0 0 24 23">
        <title>cross</title>
        <path
          d="M23.865 3.677c.197-.383.164-.818-.008-1.18.048-.41-.06-.827-.448-1.147L22.323.457c-.636-.524-1.632-.689-2.25 0a155.348 155.348 0 0 1-8.797 9.001C9.011 7.342 6.72 5.255 4.443 3.165c-.8-.734-1.956-.503-2.458.37C1.253 3.9.659 4.374.168 5.182c-.233.386-.215.872 0 1.258 1.47 2.635 4.31 4.951 6.646 7.083-.313.28-.623.562-.942.836-3.146 2.702-5.268 4.416-1.331 7.187.053.037.107.029.161.05.076.036.148.06.232.074.026 0 .05.005.075.003.082.007.16.027.243.011 2.117-.415 4.085-2.074 5.872-3.9 1.74 1.715 3.592 3.353 5.63 4.325.485.232 1.063.097 1.436-.227.626.047 1.197-.342 1.484-.901.042-.026.07-.041.116-.07.91-.569.993-1.701.32-2.482-1.522-1.762-3.138-3.438-4.787-5.084 2.968-2.9 6.674-6.027 8.542-9.667z"
        />
      </symbol>
      <symbol id="icon-menu" viewBox="0 0 17.6 9.9">
        <title>menu</title>
        <path
          d="M17.6,1H0V0h17.6V1z M17.6,4.3h-12v1h12V4.3z M17.6,8.9h-6.9v1h6.9V8.9z"
        />
      </symbol>
      <symbol id="icon-cross" viewBox="0 0 10.2 10.2">
        <title>cross</title>
        <path
          d="M5.8,5.1l4.4,4.4l-0.7,0.7L5.1,5.8l-4.4,4.4L0,9.5l4.4-4.4L0,0.7L0.7,0l4.4,4.4L9.5,0l0.7,0.7L5.8,5.1z"
        />
      </symbol>
    </svg>
    <main>

      <header class="custom-header">
        <img
          class="custom-logo"
          src="<?=base_url()?>/assets/front/img/logo.png"
        />
        <button class="btn btn--menu">
          <svg class="icon icon--menu"><use xlink:href="#icon-menu"></use></svg>
        </button>
      </header>
      <div style="position:absolute;top:35px;z-index:100;width:100%;">
        <section class="custom-nav">
          <nav
            class="links hestia-font cl-effect-1	"
            style="background-color:transparent !important"
          >
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
          <li class="menu__item"><a class="menu__link" href="<?=base_url()?>sponsors">SPONSORS</a></li>
          <li class="menu__item"><a class="menu__link" href="<?=base_url()?>about">ABOUT</a></li>

          <?php if($this->session->userdata('sess_logged_in')==0){ ?>
          <li class="menu__item"><a class="menu__link" href="<?= $google_login_url ?>">LOGIN</a></li>
          <?php }else { ?>
          <li class="menu__item"><a class="menu__link" href="<?=base_url()?>myevents">MY EVENTS</a></li>
          <?php } ?>
        </ul>
      </nav>
        <div class="content" style="background-color: #d0cfc5;" >
        <div class="grid" style="margin-top: 160px;grid-template-columns: repeat(1, 100%);">

            <div class="row event_listing_div"  style="text-align:left;padding-top: 5vh;">
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

               <div class="col-12 listing1" style="padding-bottom: 20px;">
                   <p class="event-name-text text-light" onclick=<?php echo "'location.href =\"".base_url().'event/'.$row['link']."\"'"; ?> style="letter-spacing: 3px;color:white;text-align: left; cursor:pointer;"><?=$row['title']?></p>
                   <?php

                   if($row['result']){
                       echo "<a href='#'  class='btn btn-success btn-result' onclick='viewresult(".$row['event_id'].")'>Result &nbsp;<i class='fas fa-trophy'></i></a>";
                       echo "<div hidden><div id='".$row['event_id']."'>".$row['resulthtml']."</div></div>";
                   }

                   if($row['certificate']==1){
                       echo "<a href='#'  class='btn btn-success btn-result' onclick='viewcertificate(".$row['event_id'].")'>Certificate &nbsp;<i class='fas fa-download'></i></a>";

                   }else if($row['certificate']==0)
                       echo "<a href='".base_url("myprofile")."'  class='btn btn-warning btn-result'>Verify Profile To Download Certificate &nbsp;<i class='fas fa-check'></i></a>";

                   ?>
                   <p class="event-desc"><?php
                   if(strlen($row['venue'])!=0)
                   {echo 'Venue: '.$row['venue'];}
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
                     echo "<form  class='form-inline row'  action='pages/url_submitted' method='post'>";
                     echo "<input style='min-width:250px;' type='hidden' name='link' value=".$row['link'].'  />';

                     echo "<div  class='form-group col-md-4 col-sm-12'><input  class='form-control'  style='min-width:250px;'  type='text' name='f1' placeholder='". $row['file1']."' required /></div>";

                     if ($row['file2'] != NULL && $row['u_file2'] == NULL ){
                      echo "<div style='min-width:250px;'  class='form-group col-md-4 col-sm-12 file2'><input  class='form-control'  style='min-width:250px;' style='' type='text' name='f2' placeholder='". $row['file2']."' required /></div>";
                     }

                     echo "<div class='form-group col-md-4 col-sm-12'><button type='submit' style='margin-top:20px;' class='btn btn-default' >Submit</button></div>";
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
                    <hr/>
               </div>



      <?php


      }

      ?>





</div>

        </div>
      </div>

    </main>
    <script src="<?=  base_url("assets/main/")?>js/event-listing/imagesloaded.pkgd.min.js"></script>
    <script src="<?=  base_url("assets/main/")?>js/event-listing/TweenMax.min.js"></script>
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
        $("body").removeClass("loading");
      })();
    </script>
    <script>
          function viewcertificate(elem){

          var url="<?=base_url()?>";
          url=url+"Certificate/Get/"+elem;
          window.location=url;
      }
      function viewresult(elem){
       $("#winner_form").html($("#"+elem).html());
       $("#myModal").show();
      }
      $('.modal-close').click(function(){
          $('#myModal').hide();
      });
    </script>


  </body>
</html>
