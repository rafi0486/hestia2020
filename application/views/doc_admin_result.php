<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />


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
        /* overflow-x:hidden; */
    }

    .custom-button{
        width: 50%;
        border-radius: 0;

    }
    .table{
      /* overflow-x: scroll; */
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
    <div class="row">
        <div class="col-3 p-1  ">
            <h4 class="text-center my-3">Events</h4>
            <div class=" style-1 eventsreg eventsreg_div">
              <table cellpadding="3"style="width:100%;" cellspacing="2">

              <?php
              if($allevents){
                  foreach ($allevents as $sevent){
                      ?>
                  <tr class="bg bg-default ev_row">
                      <td><a href="<?=  base_url("DocAdmin/result/".$sevent->event_id)?>"><?=$sevent->title?></a></td>
                  </tr>


                 <?php
                  }
              }

              ?>
              </table>

            </div>
        </div>
        <div class="col-9 p-1">
            <div style="float: right;"> <a href="<?=base_url("DocAdmin/home")?>"><button class="btn btn-sm btn-primary">Home</button></a> Logged in as <?=$_SESSION['loginname']?> <a href="<?=base_url("Login/logout")?>"><button class="btn btn-sm btn-danger">Logout</button></a></li>
            </div>
            <h4 class="text-center my-3">Result </h4>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Event</th>
                  <th>Regstred Email</th>
                    <th>Email</th>
                  <th>Full Name</th>
                  <th>Phone</th>
                  <th>College</th>
                  <th>Position</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($winners)>0){ ?>
                  <?php foreach ($winners as $row) { ?>
                <tr>
                  <td><?=$row['title']?></td>
                  <td><?=$row['reg_email']?></td>
                  <td><?=$row['member_email']?></td>
                        <td><?=$row['fullname']?></td>
                        <td><?=$row['phone']?></td>
                        <td><?=$row['college']?></td>
                        <?php if($row['participated']==101){?>
                          <td>First</td>
                        <?php }elseif ($row['participated']==102) { ?>
                          <td>Second</td>
                        <?php } elseif ($row['participated']==103) {?>
                          <td>Third</td>
                        <?php } ?>
                </tr>
              <?php } ?>
            <?php } ?>
              </tbody>
            </table>
            <?php if(count($winners)>0){ ?>
              <?php if($row['cat_id']!=1 || $row['cat_id']!=33 || $row['is_certificate_pub']!=1) {?>
                <p><b><span class="text-danger">NOTE: UNLESS RESULT IS PUBLISHED (IF THE EVENT HAVE WINNERS), PLEASE DON'T PUBLISH CERTIFICATE </span></b></p>
              <form method="post" action="<?=base_url("DocAdmin/Publish_Certificate/".$row['event_id'])?>">
                <button class="btn btn-sm btn-danger">Publish Certificate</button>
              </form>
              <?php }else { ?>
              <button class="btn btn-sm btn-primary disabled">Certificate published</button>
              <?php } ?>
            <?php } ?>
        </div>
<!-- end of col-7 -->

    </div>

</body>

</html>
