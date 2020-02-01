<html>

<head>
    <title><?=$event->title?> - <?=APP_TITLE?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" <?=APP_META_CONTENT?>>
<meta name="keywords" content="<?=APP_META_KEYWORDS?>">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135958084-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-135958084-1');
</script>
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/front//img/hestia-icon.png">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script>
    $( document ).ready(function() {
        
        var name = "book" + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      if(c.substring(name.length, c.length)=="Clicked")
      {
          
        document.cookie = "book=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        if(! $( ".btn-custom" ).hasClass( "disabled" ))
          {$( ".btn-custom" ).trigger( "click" );}
      }
    }
  }
});

    </script>

<!---->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

</head>
<!-- <script type="text/javascript">
  function initmask() {
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if(w < 960){

      var x = document.getElementById("event-img");
     x.setAttribute("src", "<?=base_url();?>assets/front//img/WEB_DENOVO_H.jpg");
    //  var y = document.getElementById("event-mask");
    // y.setAttribute("src", "<?=base_url();?>assets/front//img/mobile_phone_front_end.png");
    }
    
}
   </script> -->
<style>
    @media screen and (max-width: 767px){
        #event-mask{
            -webkit-transform: rotateZ(90deg);
            -moz-transform: rotateZ(90deg);
            -ms-transform: rotateZ(90deg);
            -o-transform: rotateZ(90deg);
            transform: rotateZ(90deg);
        }
        .event_block{
            padding-top: 70%;
        }

    }

    *{
        font-family: 'Pathway Gothic One', sans-serif;
    }
    .btn-custom{
        color: white;
        margin-left: 40%;
        margin-bottom: 10px;
    }
    .btn-result{
        color: white;
        margin-left: 40%;
        margin-bottom: 10px;
    }
    .btn-custom:hover{
        color: grey;
    }
    body{
        overflow-x: hidden;
    }
    @media screen and (min-width: 1366px) {
        /* #img-event{
                overflow: hidden;
             padding: 0px;
             height: 100%;
             width: 100%;
           }
           #event-mask{
             width: 100%;
             height: 100%;
           } */

        #event-img{
            /* padding-right: 50px; */
            /* padding-top: 120px; */
            height: 100%;
            margin-left: -160px;
            margin-top: 35px;
        }
        #img-cont{
            height : 540px;
            overflow-y: scroll

        }
        body{
            overflow: hidden;
        }
        .space{
            margin-right: 30px;
        }
        /* #event-mask{
           height:100vh;
          }
          #event-mask-img{
           height:90vh;
          } */

    }

    @media screen and (min-width: 320px) and (max-width: 767px) {
        /* #img-event{
                min-height:400px;
              overflow: hidden;
              height: 100vh;
      
           } */
        body{
            /* overflow-x: hidden; */
            width: 100vw;
        }
        #event-mask{
            margin-top: -12px;
            max-width: 100vw;
        }
        #event-img{
            max-width: 100vw;
        }
        /* #event-mask-img{
         height:100%;
         max-height: 200px;
         background-position: center;
        } */
        #img-cont{
            min-height : 400px;

        }


    }
    @media screen and (min-width: 768px) and (max-width: 1365px){
        #event-img{
            /* padding-right: 50px; */
            /* padding-top: 120px; */
            height: 100%;
            margin-left: -110px;
            margin-top: 20px;
        }
        #event-mask{
            height: 100vh;
        }
        #img-cont{
            height : 540px;
            overflow-y: scroll

        }
        body{
            overflow: hidden;
        }
        .space{
            margin-right: 30px;
        }

    }
    @media screen and (width: 1280px){
        #event-mask{
            height: 100%;
        }
        #event-img{

            margin-top: 0px;
        }
    }
    @media screen and (height: 1366px){
        #event-mask{
            height: 45vh;
        }
        #event-img{

            margin-top: 0px;
        }
    }
    @media screen and (height: 1024px){
        #event-mask{
            height: 55vh;
        }
        #event-img{

            margin-top: 0px;
        }
    }
    @media screen and (height: 1280px){
        #event-mask{
            height: 50vh;
        }
        #event-img{

            margin-top: 0px;
        }
    }

    .back_btn{

        left:10px;
    }
    .chk_acommodation{
        margin-top:5px;
    }
    .chk_ac_day{
        margin-left:15px;
    }
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #929292; 
        border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #929292; 
        }

    @media screen and (min-width: 767px) {

        .back_btn{
            left:40px;
        }
    }
</style>
<body style="margin-top:-20px;">
<div class="modal" id="myModal">
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

                        <div class="row ">
                            <div class="col-xs-6 ml-3 mt-3">
                                
                            
                                <div class="center"> 
                                <label class="form-check-label">
                                        Accommodation for
                                    </label>
                                    <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_1" value="1" >&nbsp;&nbsp;March 28
                                    </label>
                                    <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_2" value="2" >&nbsp;&nbsp;March 29
                                    </label>
                                    <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_3" value="3" >&nbsp;&nbsp;March 30
                                    </label>
                                    <label class="checkbox-inline chk_ac_day">
                                    <input type="checkbox" id="day_4" value="4" >&nbsp;&nbsp;March 31
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
<section>
    <h1><a  class="back_btn" style="position:absolute;top:30px;text-decoration:none;color:black;z-index:99;" href="#" onclick="javascript:history.back(-1);"><i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a></h1>

    <div class="container-fluid p-0 m-0 py-lg-3 py-md-0 ">
        <!-- <div class="card"> -->
        <div class="row ">
            <!-- <div class="col-md-5 col-sm-12" style="position: fixed;" id="img-event">
              <div id="event-mask-img" style="background-image: url('<?=base_url();?>assets/front//img/WEB_DENOVO_H.jpg'); background-size: cover; background-position: right; background-repeat: no-repeat;  width:100%;  position: absolute;z-index:0;"></div>
              <div id="event-mask" src="" style=" background-image: url('<?=base_url();?>assets/front//img/mask technical events short  crcted.png'); background-size: cover; background-position: right; background-repeat: no-repeat;   "></div>
              </div>
            </div> -->
            <div class="col-md-5 col-sm-12">

                <img src="<?=base_url();?>assets/uploads/event_images/<?=$event->event_id?>.jpg" id="event-img" style="position: absolute; width:100%; z-index:0;" alt="">
                <img src="<?=base_url();?>assets/front//img/event_mask.png" id="event-mask" style="position: absolute; width:100%; z-index:1; " alt="">
                <!-- <div style="background-image: url('<?=base_url();?>assets/front//img/WEB_DENOVO_H.jpg'); background-size: cover; background-position: right; background-repeat: no-repeat;  width:100%;  position: absolute;z-index:0;"></div> -->
                <!-- <div style="background-image: url('<?=base_url();?>assets/front//img/event-mask1.png'); background-size: cover; background-position: right; background-repeat: no-repeat;  width:100%;  position: absolute;z-index:1;"></div> -->
            </div>
            <div class="col-md-7 px-3 col-sm-12 event_block"  style="z-index: 1; display: block;  " >

                <div class="card-block px-3" style="margin-top: 5%; " id="img-cont">
                    <h2 class="card-title" style="font-weight: 900; letter-spacing: 3px;max-height: 100vh;"><?=$event->title?></h2>
                    <p class="card-text text-justify text-muted space" style="font-size: 1.2em;" ><?=$event->details?>
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
                        if ($event->reg_fee !== NULL && $reg_end !== '') {
                            ?>
                            <h5>Online Registration closes on: <?=$reg_end?></h5>
                    
                            <?php
                        }
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
                    <br>
                        <h3>Coordinators</h3>
                    <div style="padding-left: 15px;">
                        <a style="text-decoration: none;" href="tel:+91<?=$event->co1_no?>"><h5><?=$event->co1_name?> : <?=$event->co1_no?></h5></a>
                        <a style="text-decoration: none;" href="tel:+91<?=$event->co2_no?>"><h5><?=$event->co2_name?> : <?=$event->co2_no?></h5></a>
                    </div>

                    </p>
<?=$btn?>

                </div>
            </div>

        </div>
        <!-- </div> -->
    </div>

</section>
</body>

<script type="text/javascript">


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
    $('.btn-custom').click(function(){

        $.ajax({
            type:'post',
            url:"<?=base_url("process/".$event->event_id)?>",
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




    });
    $('.btn-result').click(function(){

        $('.modal-title').text("Winners");
        $('.modal-body').html("<?php
            echo $result;
            ?>");


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
        item ["event_id"] =<?=$event->event_id?>;
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


</html>
