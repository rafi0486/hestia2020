<html>
<head>
  <link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title>Complete Your Profile</title>
<meta
  name="description"
  content="<?=APP_META_CONTENT?>"
/>
</head>
<body style="background-color:#101010;">
<div class="container">

                <div class="row" style="padding:10px;">

                    <div class="col-md-5 col-sm-12"></div>
                    <div class="col-md-3 col-sm-12" style="background: #fff;width:90%;border: grey; border-radius:5px; padding: 20px; position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
<h3 style="margin-bottom:30px">Complete your Profile</h3>
                    <?php if($this->session->flashdata('error')): ?>
                    <h6 style="color:#FF0000;" class="mb-5"><?php echo $this->session->flashdata('error'); ?></h6>
                    <?php endif; ?>
                    <form id="team_form" method="post">
                     <input class="form-control" type="text" id="" placeholder="College Name" name="college"><br/>
                     <input class="form-control" type="phone"  onkeypress="return isNumber(event)"  id="" placeholder="Phone Number" name="phone" maxlength="10" minlength="10"><br/>
                     <button type="submit" class="btn btn-warning my-2 " name="save" id="">Save</button><br>
                    </form>
                    </div>

                   <div class="col-md-6 col-sm-12"> </div>
                </div>
</div>
</body>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
</html>
