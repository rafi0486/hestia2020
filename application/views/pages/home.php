<section>
<h3>Login to view events</h3>
<?php 
    if($this->session->userdata('sess_logged_in')==0){?>
	    <a href="<?=$google_login_url?>">login</a>
    <?php }
    else{?>
        <a href="<?=base_url();?>auth/logout" > logout</a>
    <?php }
?>
</section>
<section>
<?php if(isset($_SESSION['name'])){?>
    <img class="activator" src="<?=$_SESSION['profile_pic']?>"><br />
    <?= $_SESSION['profile_pic'] ?>
    <p><?=$_SESSION['name']?></p><br />
    <p><?=$_SESSION['email']?></p>
<?php }?>
</section>