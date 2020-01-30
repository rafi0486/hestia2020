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
    <link
      href="https://fonts.googleapis.com/css?family=Anton|Niramit:400,600,700"
      rel="stylesheet"
    />
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
    <style>
        .box__img{
            max-width: 150px !important;
        }
    </style>
    <link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/main-event.css" />
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/linkStyles.css" />
    <link rel="stylesheet" type="text/css" href="<?=  base_url("assets/main/")?>css/common.css" />
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
    </style>
  </head>

  <body class="loading">
    <svg class="hidden">
      <symbol id="icon-arrow" viewBox="0 0 24 24">
        <title>arrow</title>
        <polygon
          points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "
        />
      </symbol>
    </svg>
    <main>
      <div style="z-index:1000;width:100%;">
        <section>
          <a
            ><img
              style="max-height: 75px;position:relative;top:25px;left: 40px"
              src="<?= base_url("assets/main/") ?>img/logo.png"
          /></a>
        </section>
      </div>
      <nav class="menu">
        <div class="menu__item">
          <span class="menu__item-number">01</span>
          <span class="menu__item-textwrap"
            ><span class="menu__item-text">Technical</span></span
          >
          <a class="menu__item-link">Explore</a>
        </div>
        <div class="menu__item">
          <span class="menu__item-number">02</span>
          <span class="menu__item-textwrap"
            ><span class="menu__item-text">Cultural</span></span
          >
          <a class="menu__item-link">Explore</a>
        </div>
        <div class="menu__item">
          <span class="menu__item-number">03</span>
          <span class="menu__item-textwrap" onclick="window.location='<?=  base_url()?>'"
            ><span class="menu__item-text">Workshops</span></span
          >
      
          <a class="menu__item-link hidden">Explore</a>
        </div>
        <div class="menu__item">
          <span class="menu__item-number">04</span>
         <span class="menu__item-textwrap"  onclick="window.location='<?=  base_url()?>'"
            ><span class="menu__item-text">Online</span></span
          >
          <a class="menu__item-link hidden">Explore</a>
        </div>
        <div class="menu__item">
          <span class="menu__item-number">05</span>
         <span class="menu__item-textwrap"  onclick="window.location='<?=  base_url()?>'"
            ><span class="menu__item-text">General</span></span
              >
          <a class="menu__item-link hidden">Explore</a>
        </div>
      </nav>
      <div class="page page--preview">
        <div class="gridwrap">
          <div class="grid grid--layout-1">
              <?php
              foreach ($technical as $catrow){
                  ?>
                        <a class="grid__item" href="<?= base_url("events/").$catrow->cat_name ?>">
                    <div class="box">
                      <div class="box__shadow"></div>
                      <img
                        class="box__img"
                        src="<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>"
                        alt="<?=$catrow->cat_text?>"
                      />
                      <h3 class="hestia-font box__title">
                        <span class="box__title-inner" data-hover="<?=$catrow->cat_text?>"
                          ><?=$catrow->cat_text?></span
                        >
                      </h3>
                    </div>
                  </a>
              <?php
              }
              ?>
            
            
          </div>
          <div class="grid grid--layout-2">
            
             <?php
              foreach ($cultural as $catrow){
                  ?>
                        <a class="grid__item" href="<?= base_url("events/").$catrow->cat_name ?>">
                    <div class="box">
                      <div class="box__shadow"></div>
                      <img
                        class="box__img"
                        src="<?= base_url("assets/uploads/event_images/").$catrow->cat_img ?>"
                        alt="<?=$catrow->cat_text?>"
                      />
                      <h3 class="hestia-font box__title">
                        <span class="box__title-inner" data-hover="<?=$catrow->cat_text?>"
                          ><?=$catrow->cat_text?></span
                        >
                      </h3>
                    </div>
                  </a>
              <?php
              }
              ?>
              
          </div>
          <div class="grid grid--layout-3">
            
            
          </div>
          <div class="grid grid--layout-4">
            
           
          </div>
          <div class="grid grid--layout-5">
            
            
          </div>
          <button class="gridback">
            <svg class="icon icon--arrow">
              <use xlink:href="#icon-arrow"></use>
            </svg>
          </button>
        </div>
        <!-- /gridwrap -->
        <div class="content">
          <div class="content__item"></div>
          <div class="content__item"></div>
          <div class="content__item"></div>
          <div class="content__item"></div>
          <div class="content__item"></div>
        </div>
      </div>
      <!-- /page -->
    </main>
    <script src="<?=  base_url("assets/main/")?>js/main-event/imagesloaded.pkgd.min.js"></script>
    <script src="<?=  base_url("assets/main/")?>js/main-event/TweenMax.min.js"></script>
    <script src="<?=  base_url("assets/main/")?>js/main-event/main.js"></script>
  </body>
</html>
