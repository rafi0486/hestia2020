<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="//www.hestia.live/assets/front/img/hestia-icon.png">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="<?=base_url("assets/main/")?>js/admin/nicEdit-latest.js" type="text/javascript"></script>

  <title>Hestia 20</title>
</head>
<style>
    body{
        overflow: hidden;
    }
    .custom-button{
        width: 50%;
        border-radius: 0;

    }
    .eventsreg{
        height: calc(100vh - 150px);
        overflow-y: scroll;
    }
    .style-1::-webkit-scrollbar
      {
        width: 15px;
        background-color: #F5F5F5;
        border-radius: 10px;
      }
      .ev_row{
          margin-bottom: 20px;
          border: 5px solid white;
          color:white;
          padding: 15px 3px;
      }
      .style-1::-webkit-scrollbar-thumb
      {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px #9da2aa;

        background-color: #555;
      }
      .chk_acommodation{
        margin-top:5px;
    }
    .chk_ac_day{
        margin-left:15px;
    }
</style>

<body class="container-fluid">
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Payment Confirmation</h4>
                <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">


                <form id="amnt_form12" method="post" action="<?=base_url("DocAdmin/SaveEvent")?>" name="team_form1" style="">

                    <input type="hidden" id="json_data1" name="json_data1" hidden/>


                    <div id="amnt_form1">





                    </div>
                    <button type="submit" style="display: none;" id="confirm_pay"></button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modal-redirect" data-dismiss="modal" onclick="pay_submit()">Confirm Payment</button>
            </div>

        </div>
    </div>
</div>
    <div class="row">
        <div class="col-3 p-1  ">
            <h4 class="text-center my-3">Events</h4>
            <div class=" style-1 eventsreg eventsreg_div">
                <table cellpadding="3"style="width:100%;" cellspacing="2">

                <?php
                if($allevents){
                    foreach ($allevents as $sevent){
                        ?>
                    <tr class="bg bg-primary ev_row">
                        <td><?=$sevent->title?></td>
                    </tr>


                   <?php
                    }
                }

                ?>
                </table>

            </div>
        </div>
        <div class="col-9 p-1">
            <div style="float: right;">Logged in as <?=$_SESSION['loginname']?> <a href="<?=base_url("Login/logout")?>"><button class="btn btn-sm btn-danger">Logout</button></a></li>
               </div>
                        <h4 class="text-center my-3">Manage Events</h4>
                <form action="<?=base_url("DocAdmin/SaveEvent")?>" method="post" enctype="multipart/form-data">
                <div class="eventsreg style-1">

                <div class="m-3">
                        <label for="cat_id">Event Category: </label>
                        <select id="cat_id"  name="cat_id" class="form-control">
                            <option value="">Select</option>
                            <?php
                            foreach ($categories as $row){
                                if($row->cat_name!='online')
                                echo "<option value='".$row->cat_id."'>".$row->cat_name."</option>";

                            }
                            ?>
                        </select>

                </div>
                <div class="m-3">
                        <label>Event Name: </label>
                        <input type="text" id="title"  name="title" class="form-control"/>

                </div>
  <div class="m-3">
                        <label>Short Name: </label>
                        <input type="text" id="title"  name="short_title" class="form-control"/>

                </div>
                <div class="m-3">
                        <label>Short Desc.: </label>
                        <textarea type="text" id="short_desc"  rows="4" name="short_desc" class="form-control">
                        </textarea>
                </div>
                <div class="m-3">
                        <label>Details: </label>
                        <textarea type="text" id="details"  rows="6" name="details" class="form-control">
                        </textarea>
                </div>
                <div class="m-3">
                        <label>Min. Members: </label>
                        <input type="number" id="min_memb"  name="min_memb" value="1" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Max. Members: </label>
                        <input type="number" id="max_memb"  name="max_memb" value="1" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Venue: </label>
                        <input type="text" id="venue"  name="venue" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Reg. Fee: </label>
                        <input type="number" id="reg_fee"  name="reg_fee"  class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Fee Type: </label>
                        <select  id="fee_type"  name="fee_type"  class="form-control">
                            <option value="head">Per Head</option>
                        </select>
                </div>
                <div class="m-3">
                        <label>Prize: </label>
                        <input type="text" id="prize"  name="prize" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>File 1: </label>
                        <input type="text" id="file1"  name="file1" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>File 2: </label>
                        <input type="text" id="file2"  name="file2" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>File Submission Last Date: </label>
                        <input type="date" id="file_last_date"  name="file_last_date" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Coordinator 1 Name: </label>
                        <input type="text" id="co1_name"  name="co1_name" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Coordinator 1 Phone: </label>
                        <input type="phone" id="co1_no"  name="co1_no" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Coordinator 2 Name: </label>
                        <input type="text" id="co2_name"  name="co2_name" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Coordinator 2 Phone: </label>
                        <input type="phone" id="co2_no"  name="co2_no" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Seats: </label>
                        <input type="number" id="seats"  name="seats" required class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Reg. Start: </label>
                        <input type="text" id="reg_start"  name="reg_start" class="form-control"/>
                </div>
                <div class="m-3">
                        <label>Reg. End: </label>
                        <input type="text" id="reg_end"  name="reg_end" class="form-control"/>
                </div>
                    <div class="m-3">
                        <label>User Name: </label>
                        <input type="text" id="username"  name="username" required class="form-control"/>
                </div>
                </div>
                    <div class="m-3">
                        <label>Syllabus: </label>
                        <input type="text" id="syllabus_link"  name="syllabus_link" required class="form-control"/>
                </div>
                    <div class="m-3">
                        <label>Link: </label>
                        <input type="text" id="link"  name="link" required class="form-control"/>
                </div>
                    <div class="m-3">
                        <label>Image: </label>
                        <input type="file" id="photo"  name="photo" required class="form-control"/>
                </div>
                    <div class="m-3">
                        <input type="submit" id="btn_submit" name="btn_submit" value="Save" class="btn btn-primary"/>
                </div>
                </div>
                        </form>

        </div>
<!-- end of col-7 -->

    </div>

</body>

<script type="text/javascript">

             $(function () {

                 $('#reg_start').datetimepicker({
                       format: 'yyyy-mm-dd HH:MM' ,
             footer: true, modal: false
        });

        $('#reg_end').datetimepicker({
             format: 'yyyy-mm-dd HH:MM' ,
            footer: true, modal: false
        });
      bkLib.onDomLoaded(nicEditors.allTextAreas);

            });

        var maxmemb=0;
        var minmemb=0;
        var rem_members=0;
        $('.modal-close').click(function(){
            $('#myModal').hide();
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
        function LoadEventMembers(event_id){

            $.ajax({
                type:'post',
                url:"<?=base_url()?>Spot/ProcessUserRequest/"+event_id,
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
                $('#myModal').hide();


                    var array = JSON.parse(result);

                    switch(array[0]){

                        case 200:{
                            $('.chk_team').css('display','inline');
                            $('#team_form').css('display','block');

                            $('.chk_acommodation').css('display','none');
                            $('#div_acm0').css('display','none');

                            $('#div_mail0').addClass('col-md-12').removeClass('col-md-8');
                            $('#team_form_members').html("");

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
                                html+=" <div class='row' style='margin-bottom:10px;'> <div class='col-md-3 col-sm-12' id='div_mail"+(minmemb-n)+"'><input class='form-control mem_mail' onchange='loadUserInfo(this)' type='email'  id='email"+(minmemb-n)+"' placeholder='Email'></div> <div class='col-md-3 col-sm-12' id='div_name"+(minmemb-n)+"'><input class='form-control' type='text' id='name"+(minmemb-n)+"' placeholder='Name' ></div> <div class='col-md-3 col-sm-12' id='div_college"+(minmemb-n)+"'><input class='form-control' type='text' id='college"+(minmemb-n)+"' placeholder='College'></div> <div class='col-md-2 col-sm-12' id='div_phone"+(minmemb-n)+"'><input class='form-control' type='phone' id='phone"+(minmemb-n)+"' placeholder='Phone' ></div> <div class='col-md-1 col-sm-12' id='div_acm"+(minmemb-n)+"'><label class='checkbox-inline chk_acommodation'> <input type='checkbox' class='chk_acm'  id='chk_acm"+(minmemb-n)+"'> </label></div> </div> ";
                                n--;
                            }
                            $('#team_form_members').html(html);
                            $('#team_form').css('display','block');


                            if(rem_members<0){
                                $("#addmoreMembersBtn").css({
                                    "display": "none"

                                });

                            }else{
                                $("#addmoreMembersBtn").css({
                                    "display": "inline"

                                });
                            }

                            break;
                        }            $('#myModal').hide();

                        }




                }
            });




        }


        $(function() {
            $("#cat_id").change(function () {
                var cat_id = $('option:selected', this).val();
                $.ajax({
                    type: 'post',
                    url: "<?=base_url()?>Spot/get_events_list/" + cat_id,
                    data: "",
                    async: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        // launchpreloader();
                    },
                    complete: function () {
                        //  stopPreloader();
                    },
                    success: function (result) {
                        $("#selectevent").empty();
                        $("#selectevent").prepend("<option value=''>Select</option>");


                        $.each($.parseJSON(result), function(idx, obj) {

                            $("#selectevent").append("<option value='"+obj.event_id+"'>"+obj.title+"</option>");

                        });


                    }
                });
            });
        });

        $(function() {
            $("#selectevent").change(function () {

                $('#team_form_members_opt').html("");
                var id=$('option:selected', this).val();
                if(id!="") {
                    $.ajax({
                        type: 'post',
                        url: "<?=base_url()?>Spot/event_current_status_get/" + id,
                        data: "",
                        async: false,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            // launchpreloader();
                        },
                        complete: function () {
                            //  stopPreloader();
                        },
                        success: function (result) {

                           switch (result) {
                               case "1":{$("#btn_add_div").html("<button class='btn btn-outline-danger custom-button' onclick='team_form_sumbit()'><i class='fas fa-plus-square'></i>&nbsp;Add</button>");break;}
                               case "sold":{$("#btn_add_div").html("<button class='btn btn-outline-warning custom-button'><i class='fas fa-plus-square'></i>&nbsp;Sold Out</button>");break;}

                           }
                        }
                    });
                }

                LoadEventMembers($('option:selected', this).val());

            });
        });
        $("#addmoreMembersBtn").click(function() {

            $('.close-href').hide();
            var old=$('#team_form_members_opt').html();
            var cur_cnt=$("#team_form_members_opt > div").length;
            $('.close-href').css('display','none');
           // $('.close-href').show(); // Shows
             // hides
            if(cur_cnt<=rem_members){
                var html="<div class='row' style='margin-bottom:10px;' id='member_"+(minmemb+cur_cnt)+"'><div class='col-md-3 col-sm-12' id='div_mail"+(minmemb+cur_cnt)+"'><input class='form-control mem_mail' onchange='loadUserInfo(this)' type='email' id='email"+(minmemb+cur_cnt)+"' placeholder='Email'></div> <div class='col-md-3 col-sm-12' id='div_name"+(minmemb+cur_cnt)+"'><input class='form-control' type='text' id='name"+(minmemb+cur_cnt)+"' placeholder='Name' ></div> <div class='col-md-3 col-sm-12' id='div_college"+(minmemb+cur_cnt)+"'><input class='form-control' type='text' id='college"+(minmemb+cur_cnt)+"' placeholder='College'></div> <div class='col-md-2 col-sm-12' id='div_phone"+(minmemb+cur_cnt)+"'><input class='form-control' type='phone' id='phone"+(minmemb+cur_cnt)+"' placeholder='Phone' ></div> <div class='col-md-1 col-sm-12' id='div_acm"+(minmemb+cur_cnt)+"'><a id='member_"+(minmemb+cur_cnt)+"_close'  class='close-href text-white' style='border: 0;float:left;position:absolute;left:-50px;' onclick='removeElement("+(minmemb+cur_cnt)+")'><button type='button'  class='btn btn-xs btn-danger'>X</button></a><label class='checkbox-inline chk_acommodation'> <input type='checkbox' class='chk_acm'  id='chk_acm"+(minmemb+cur_cnt)+"'> </label></div> </div> ";
                $('#team_form_members_opt').append(html);


            }
            if(cur_cnt>=rem_members){
                $("#addmoreMembersBtn").prop("disabled",true);
            }


            });
        function loadUserInfo(elem){
            var id=$(elem).attr('id').replace("email","");
            var mail=$("#email0").val()
            if(id=="0"){
                $.ajax({
                    type: 'post',
                    url: "<?=base_url()?>Spot/get_reg_user_events/" + mail,
                    data: "",
                    async: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        // launchpreloader();
                    },
                    complete: function () {
                        //  stopPreloader();
                    },
                    success: function (result) {
                        $(".eventsreg_div").html();
                        if(result!="null"){
                            $.each($.parseJSON(result), function(idx, obj) {
                                if(obj.title!="accommodation"){
                                    $(".eventsreg_div").append("<div class='card mx-3 my-2'><div class='card-body'><h5 class='card-title'>"+obj.title+"</h5><p class='card-text'></p></div></div>")
                                }
                            });
                        }else{
                            $(".eventsreg_div").append("<div class='card mx-3 my-2'><div class='card-body'><h5 class='card-title'>No events registered</h5><p class='card-text'></p></div></div>")

                        }
                    }
                });
            }
            var mail=$(elem).val();
            $.ajax({
                type: 'post',
                url: "<?=base_url()?>Spot/get_reg_user_info/" + mail+"/"+$("#selectevent").val(),
                data: "",
                async: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    // launchpreloader();
                },
                complete: function () {
                    //  stopPreloader();
                },
                success: function (result) {
                    if(result!="null"){

                        if(result=="none"){
                            alert("Event already registered by the user.");
                            return;
                        }
                        var array = JSON.parse(result);
                        var nameid="#name"+ id;
                        var collegeid="#college"+ id;
                        var phoneid="#phone"+ id;
                        var checkid="#chk_acm"+ id;
                        var mailid="#email"+ id;
                        $(mailid).prop("disabled",true);
                        $(nameid).val(array.fullname);
                        $(collegeid).val(array.college);
                        $(collegeid).val(array.college);
                        $(phoneid).val(array.phone);
                        if(id=="0" && maxmemb==1 && minmemb==1) {
                            if (array.accommodation != null) {

                                $("#day_1").prop(checkid,false);
                                $("#day_2").prop(checkid,false);
                                $("#day_3").prop(checkid,false);
                                $("#day_4").prop(checkid,false);


                                $(checkid).prop("checked", true);
                                var str = array.accommodation;
                                var res = str.split("");
                                $.each( res, function( index, value ) {
                                   var idx="#day_"+value;
                                   $(idx).prop("checked",true);




                                });
                            } else {
                                $(checkid).prop("checked", false);
                            }
                        }




                        checkBoxValidate();
                    }




                }
            });

        }
        function pay_submit(){

             $('#confirm_pay').click();

        }
        function  removeElement(_id){

                $("#member_"+_id).remove();
            $("#member_"+(_id-1)+"_close").css('display','block');

            $("#addmoreMembersBtn").prop("disabled",false);
            checkBoxValidate();
        }
        function team_form_sumbit(){

            var isvalid=true;
            emails_josn = [];
            $("input[type=email]").each(function() {
                email = {};
                email["email"] = $(this).val();

                if($(this).attr('id')!="email0"){
                    var email_regex = /^[a-zA-Z0-9._-]+@gmail.com$/i;
                    var mailid=$(this).val();
                    if(!email_regex.test(mailid)){
                        isvalid=false;
                        alert("Enter valid mail id");


                    }

                }


                var chkid=$(this).attr('id');
                chkid=chkid.replace("email","chk_acm");
                var plainid=chkid.replace("chk_acm","");
                if($("#"+chkid).is(":checked")==true){
                    email["acc"] = "Y";
                }else{
                    email["acc"] = "N";
                }

                var nameid="#name"+ plainid;
                var collegeid="#college"+ plainid;
                var phoneid="#phone"+ plainid;
                email["fullname"] = $(nameid).val();
                email["college"] = $(collegeid).val();
                email["phone"] = $(phoneid).val();


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



                }
            }
            jsonObj = [];
            item = {};
            item ["event_id"] =$("#selectevent").val();

            item ["reg_email"] = $("#email0").val();
            item ["referral_code"] = "spot_<?php
                    if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                }
                ?>";
            item ["accommodation_days"] = days_cm;
            item ["emails"] = emails_josn;
            jsonObj.push(item);
            $('#json_data').val(JSON.stringify(item));
            $('#json_data1').val(JSON.stringify(item));

if(isvalid==true){
    calcualtefee();

}
           // $('#team_form_hid_btn').click();


        }
        function calcualtefee() {

            var a = new FormData(document.getElementById("team_form"));

            $.ajax({
                    type: 'post',
                    url: "<?=base_url()?>Spot/get_spot_fee_total/",
                    data: a,
                    async: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        // launchpreloader();
                    },
                    complete: function () {
                        //  stopPreloader();
                    },
                    success: function (result) {
                       // alert(result);
                        $("#amnt_form1").html(result);
                        $('#myModal').show();


                    }
                });

        }


    </script>


</html>
