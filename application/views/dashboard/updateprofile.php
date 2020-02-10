<html>
<head>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title><?=$title?></title>
</head>
<body style="background: url('IMAGE-URL')  lightgrey no-repeat center center fixed ; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;height: 100%;min-height:100vh;">
<div class="container">
    
                <div class="row" style="padding:10px;">

                    <div class="col-md-5 col-sm-12"></div>
                    <div class="col-md-3 col-sm-12" style="background: #fff;width:90%;border: grey; border-radius:5px; padding: 20px; position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
<h3 style="margin-bottom:30px">Update Profile</h3>
                    <form id="team_form" method="post" action="<?=base_url("Profile/updateprofile")?>">
                        <div class="form-group" hidden>
                            <img  src="https://www.qrcoder.co.uk/api/v1/?text=<?php
                            echo $userinfo['hashcode'];
                            ?>">

                        </div>
                        <div class="form-group">
                            <label class="text-danger">No further changes can be made after submission.</label>

                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" id="" value="<?=$userinfo['fullname']?>" placeholder="Name" name="fullname">

                        </div>
                        <div class="form-group">
                            <label>College Name</label>
                            <input class="form-control" type="text" id=""  value="<?=$userinfo['college']?>" placeholder="College Name" name="college">

                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input class="form-control" type="phone"   value="<?=$userinfo['phone']?>" onkeypress="return isNumber(event)"  id="" placeholder="Phone Number" name="phone" maxlength="10" minlength="10">

                        </div>
                        <?php
                        $acc=$userinfo['accommodation'];
if($acc!=0){
    $acc_ar=str_split($acc,1);
    $acc_cnt=strlen($acc);
}else{
    $acc_cnt=0;
    $acc_ar=array();
}

                        ?>
                        <?php
                        if($acc_cnt>0){
                        ?>
                        <div class="form-group" >
                            <div class="center">
                                <label class="form-check-label">
                                    Accommodation for
                                </label><br>
                                <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_1" name="acc[]" value="1" <?php if (in_array("1", $acc_ar)) {echo "checked";} ?> disabled>&nbsp;&nbsp;March 28
                                </label>
                                <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_2"  name="acc[]"  value="2"  <?php if (in_array("2", $acc_ar)) {echo "checked";} ?>  disabled>&nbsp;&nbsp;March 29
                                </label>
                                <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_3"  name="acc[]"  value="3"  <?php if (in_array("3", $acc_ar)) {echo "checked";} ?>  disabled>&nbsp;&nbsp;March 30
                                </label>
                                <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_4"  name="acc[]"  value="4"  <?php if (in_array("4", $acc_ar)) {echo "checked";} ?>  disabled>&nbsp;&nbsp;March 31
                                </label>
                                <br>
                                <label class="text-warning">Accommodation for <?=$acc_cnt?> days. </label>
                            </div>
                        </div>

                            <?php
                        }
                        ?>






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
    document.querySelector("#team_form").addEventListener("submit", function(e){
        var max=0;
        max=<?=$acc_cnt;?>;

            var selected=document.querySelectorAll('input[type="checkbox"]:checked').length;
            if(max!=selected){
                alert("You can select accommodation only for "+max +" days");
                e.preventDefault();
            }

    });


</script>
</html>
