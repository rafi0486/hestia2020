<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="//www.hestia.live/assets/front/img/hestia-icon.png">
  <title> Hestia 19 - National Level Techno-Cultural Fest of TKM</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">
  <style>
    .vertical {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
    }
  </style>
</head>

<body>
  <div class="vertical modal-dialog" role="document">
    <div class="modal-content">
        <form method="post" action="<?=base_url("Login/process")?>">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">SIGN IN</h4>

      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="defaultForm-email" name="username" class="form-control validate">

        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password" class="form-control validate">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit">Login</button>
      </div>
        </form>
    </div>
  </div>

</body>

</html>