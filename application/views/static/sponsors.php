<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?=base_url();?>assets/front/img/hestia-icon.png">



  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="Hestia 19 - National level Techno Cultural fest organized by TKM College of Engineering. March 28-31">
<meta name="keywords" content="hestia,hestia19,tkmce,hestiatkm,hestiatkmce,conjura,fest,event,technical,cultural,technocultural">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="<?=base_url();?>assets/uploads/sponsors/https://www.googletagmanager.com/gtag/js?id=UA-135958084-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135958084-1');
</script>
  <title>
  Sponsors - Hestia 19 - National Level Techno-Cultural Fest of TKM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="<?=base_url();?>assets/front/fonts/Hestia.css?family=Hestia-Regular" rel="stylesheet">
  <link href="<?=base_url();?>assets/front/fonts/Galgo.css?family=Galgo" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=base_url();?>assets/front/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url();?>assets/front/demo/demo.css" rel="stylesheet" />

  <!-- <link rel="stylesheet" href="assets/css/main_style.css"> -->
  <style>
  .listing2 {
    font-size: 2rem;
    font-family: 'Hestia-Regular', sans-serif !important;
    color: white;
  }

  .listing3 {
    font-family: 'Hestia-Regular', sans-serif !important;
    color: white;
  }

  body {
    background: url('<?=base_url();?>assets/front/img/about_us_bg.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .back_btn {
    left: 10px;
  }

  @media screen and (min-width: 767px) {
    .hid-block {
      overflow: hidden;
    }

    .back_btn {
      left: 40px;
    }
  }

  .hid-block {
    overflow: none;
  }

  .row-fluid {
    /* display: block; */
  }

  .text-al {
    text-align: center;
    padding: 20px;
    /* margin-bottom: 100px; */
  }

  .c1 {
    display: block;
    text-align: center;
  }

  .inline {
    display: inline-block;
  }
  </style>
</head>

<body>

    <div class="container font-weight-bold ">
      <div class="row c1 ">
        <h2 class="listing2 pt-4"><a class="back_btn" style="position:absolute;text-decoration:none;color:white;" href="#" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i>
          </a> SPONSORS</h2>
      </div>

      <div class="row pt-5 c1">
        <h2 class="text-white listing3 mb-2">Choreonite partner</h2>
        <?php
          foreach($sponsors2 as $row){
         ?>
        <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="50px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
        <?php } ?>
      </div>

      <div class="row pt-5 c1">
        <h2 class="text-white listing3 mb-2">Pronite partner</h2>
        <?php
          foreach($sponsors3 as $row){
         ?>
        <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
        <?php } ?>
      </div>

      <div class="row pt-5 c1">
        <h2 class="text-white listing3 mb-2">Hospitality partner</h2>
        <?php
          foreach($sponsors7 as $row){
         ?>
        <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
        <?php } ?>
      </div>

      <div class="row pt-5 c1">
        <h2 class="text-white listing3 mb-2">Audio partner</h2>
        <?php
          foreach($sponsors4 as $row){
         ?>
        <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
        <?php } ?>
      </div>

      <div class="row pt-5 c1 ">
        <h2 class="text-white listing3 mb-1 ">Beverage partner</h2><br><br>
        <?php
          foreach($sponsors5 as $row){
         ?>
        <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
        <?php } ?>
      </div>

      <div class="row pt-5 c1 ">
        <h2 class="text-white listing3 mb-4">Event partner</h2>
        <?php
          foreach($sponsors6 as $row){
         ?>
          <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
          <?php } ?>
      </div>

      <div class="row pt-5 c1 ">
        <h2 class="text-white listing3 mb-4">Other partner</h2>
         <?php
          foreach($sponsors1 as $row){
         ?>
          <div class="inline  col-sm-3 mb-3 ">
            <a href="<?=$row['s_link']?>" target="_blank"><img src="<?=base_url();?>assets/uploads/sponsors/<?=$row['s_logo']?>" height="100px"  alt=""></a>
            <h3 class="text-white listing3"><?=$row['s_name']?></h3>
          </div>
          <?php } ?>

      </div>

      </div>

    </div>
    </div>
</body>

</html>
