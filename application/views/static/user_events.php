<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link rel="icon" type="image/png" href="<?=base_url();?>assets/front/img/hestia-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="theme-color" content="#1a3840">
  <meta name="description" content="Hestia 19 - National level Techno Cultural fest organized by TKM College of Engineering. March 28-31">
<meta name="keywords" content="hestia,hestia19,tkmce,hestiatkm,hestiatkmce,conjura,fest,event,technical,cultural,technocultural">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135958084-1"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135958084-1');
</script>


  <title>
  Hestia 19 - National Level Techno-Cultural Fest of TKM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="<?=base_url();?>assets/front/fonts/Hestia.css?family=Hestia-Regular" rel="stylesheet">
  <link href="<?=base_url();?>assets/front/fonts/Galgo.css?family=Galgo" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url();?>assets/front/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=base_url();?>assets/front/css/material-kit.css?v=2.0.5" rel="stylesheet" />

  <link rel="stylesheet" href="<?=base_url();?>assets/front/carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/front/carousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/front/css/custom.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/front/css/main_style.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/front/loader/loader.css">
  <script src="<?=base_url();?>assets/front/js/core/jquery.min.js" type="text/javascript"></script>
  <style>
  .navbar .navbar-nav .nav-item .nav-link{
    font-size: 1.5rem;
  }

  *{
    font-family: 'Hestia-Regular', sans-serif;
  }
  .listing1{
      /*word-wrap:break-word;*/
      /*word-break: break-all;*/
      background-size: cover;
      border-bottom: 0.5px solid gray;
      padding-top:25px;
      margin-bottom: 5vh;
      font-family: 'Hestia-Regular', sans-serif;
  }


  .listing1 .event-name-text{

      font-size: 2rem;
      line-height:2rem;
      font-family: 'Hestia-Regular', sans-serif !important;
      color:white;

  }
  .event-desc{
      font-size: 1rem;
      color: white;
      margin-top: 3vh;
      margin-bottom: 4vh;


  }
  .details{

      color: black;
      background-color: azure;
      text-decoration: none;
      padding-left: 20px;
      padding-right: 20px;
      padding-top: 10px;
      padding-bottom: 10px;
      border-radius: 2px;
      margin-bottom: 4vh;

  }
  .details:hover{
      color:gray;;
  }
  .event_listing_div{
margin-left:5vh;
margin-right:5vh;
margin-top:20px;
}
  @media (min-width: 786px) {
.event_listing_div{
  padding-left:10vh;
padding-right:10vh;
  margin-top:100px;

}
  }
</style>
</head>

<body class="profile-page sidebar-collapse page-header" data-parallax="true" style="background: url('<?=base_url();?>assets/front/img/event_list_bg.jpg') no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;height: 100%;min-height:100vh;overflow: scroll; background-color:#152428;">
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Winners</h4>
                <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">


                <form id="amnt_form12" method="post" action="<?=base_url("Spot/insert_spot_reg")?>" name="team_form1" style="">



                    <div id="winner_form">





                    </div>

                </form>
            </div>

            <!-- Modal footer -->


        </div>
    </div>
</div>
  <div style="z-index:3;">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
      <div class="container-fluid">
        <div class="navbar-translate">
<a href="../">
            <img style="max-height:40px;" class="mobile-show" src="<?=base_url();?>assets/front/img/logo-inline-with-text.png">
</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only" style="color: black;">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">

          <ul class="navbar-nav mx-auto">
            <li class="nav-item fade-in">
              <a href="#" class="nav-link event-click " id="events">
                EVENTS
              </a>
            </li>
            <li class="nav-item fade-in">
              <a href="<?=base_url()?>sponsors" class="nav-link">
                SPONSORS
              </a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="navbar-brand my-auto" href="../">
                <img class="fade-in-top" style="max-height: 75px;margin-top: -20px;" src="<?=base_url();?>assets/front/img/logo.png" /></a>
            </li>
            <li class="nav-item fade-in">
              <a href="<?=base_url()?>about" class="nav-link">
                ABOUT
              </a>
            </li>
            <li class="nav-item fade-in">
              <a href="<?=base_url()?>contact" class="nav-link">
                CONTACT
              </a>
            </li>
          </ul>


        </div>
      </div>
    </nav>

      <div class="container" style="z-index:10;position:absolute;top:0px;">
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
               </div>


      <?php


      }

      ?>





</div>
</div>


  </div>


  <div class="container hider" style="padding-top: 115px;" id="overlay">
    <div class="overlay" id="darkbg"></div>
    <div class="owl-carousel owl-theme slide-in-bottom" id="carousel">
      <a href="<?=base_url("technical")?>">
      <div class="item auto-height" style="max-height:50vh;background-image: url('<?=base_url();?>assets/front/img/technical_bg.jpg'); background-size: cover; background-position: top;box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);"
        data-hash="">
        <div class="container" style="padding: 10px;position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
        <h1 class="title  event-name" style="">Technical</h1>
        </div>
      </div>
      </a>
      <a href="<?=base_url("cultural")?>">
      <div class="item auto-height" style="max-height:50vh;background-image: url('<?=base_url();?>assets/front/img/cultural_bg.jpg'); background-size: cover; background-position: top;box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);"
        data-hash="">
        <div class="container" style="padding: 10px;position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
          <h1 class="title  event-name" style="">Cultural</h1>
        </div>
      </div>
      </a>
        <!-- <a href="<?=base_url("events/workshops")?>">
            <div class="item auto-height" style="max-height:50vh;background-image: url('<?=base_url();?>assets/front/img/workshop_bg.jpg'); background-size: cover; background-position: top;box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);"
                 data-hash="">
                <div class="container" style="padding: 10px;position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
                    <h1 class="title  event-name " style="">Workshops</h1>
                </div>
            </div>
        </a> -->
        <a href="<?=base_url("events/online")?>">
            <div class="item auto-height" style="max-height:50vh;background-image: url('<?=base_url();?>assets/front/img/online_bg.jpg'); background-size: cover; background-position: top;box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);"
                 data-hash="">
                <div class="container" style="padding: 10px;position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
                    <h1 class="title  event-name" style="">Online</h1>
                </div>
            </div>
        </a>
        <a href="<?=base_url("events/general")?>">
            <div class="item auto-height" style="max-height:50vh;background-image: url('<?=base_url();?>assets/front/img/general_bg.jpg'); background-size: cover; background-position: top;box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);"
                 data-hash="">
                <div class="container" style="padding: 10px;position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
                    <h1 class="title  event-name" style="">General</h1>
                </div>
            </div>
        </a>


    </div>
  </div>



  <!--   Core JS Files   -->

  <script src="<?=base_url();?>assets/front/carousel/owl.carousel.min.js"></script>
  <script src="<?=base_url();?>assets/front/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?=base_url();?>assets/front/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?=base_url();?>assets/front/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?=base_url();?>assets/front/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?=base_url();?>assets/front/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url();?>assets/front/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
  <script type="text/javascript">
    if($(window).width() < 960){
      $(".pcmask").attr("src", "<?=base_url();?>assets/front/img/mobile_phone_front_end.png");
    }
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
    $('.owl-carousel').owlCarousel({
      centre: true,
      items: 1,
      stagePadding: 150,
      loop: true,
      margin: 0,
      URLhashListener:true,
      autoplayHoverPause:true,
      startPosition: 'events',
      nav: true,
      navText : ['<span class="carousel-control-prev-icon" aria-hidden="true"></span>', '<span class="carousel-control-next-icon" aria-hidden="true"></span>'],
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          stagePadding: 25,
        },
        600:{
          items:1,
          stagePadding: 100,
        },
        1000:{
          items:1,
          loop:true
        }
      }
    })
  </script>

  <script>
    $(document).ready(
      function(){
        $("#events").click("slow", function () {
          $("#overlay").fadeToggle(function(){
            $("#carousel").slideDown();
            $('.navbar-toggler').click();

          });
      });
    });

    $(document).ready(
      function(){
        $("#darkbg").click("slow", function () {
          $("#overlay").fadeToggle(function(){
            $("#carousel").toggle();
          });
      });
    });
  </script>



</body>

</html>
