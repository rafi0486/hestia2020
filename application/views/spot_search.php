<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?=  base_url("assets/main/")?>img/hestia-icon.png" />
    <script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else document.getElementById('ifYes').style.display = 'none';

}
</script>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
    input{
      width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
    }
</style>

<body class="container-fluid">
    <div class="row">
          <div style="margin:auto; margin-top:10px;"><a href="<?=base_url("Spot/home")?>"><button class="btn btn-sm btn-primary">Home</button></a>  Logged in as <?=$_SESSION['loginname']?> <a href="<?=base_url("Login/logout")?>"><button class="btn btn-sm btn-danger">Logout</button></a>
          </div>
    </div>
    <div style="margin-top:10px;">
        <form action="<?=base_url("Spot/searchResult")?>" method="post">
              <input type="text" name="search"  placeholder="spot_youremail@gmail.com" required>
              <button type="submit" name="submit" class="btn btn-sm btn-primary" >Search</button>
        </form>
    </div>
</body>


</html>
