<!DOCTYPE html>
<html>
	   <!-- ?php include 'header.php'; ?--> 
  <head>
    <meta charset="utf-8">
    <title>sign in</title>
    <link href="<?base_url()?>/assets/css/sign.css"  rel="stylesheet">
  </head>  




<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 loginform">
            <div class="account-wall">
 <?php if($this->session->flashdata('success_message') != ""){ ?>
<div class="update-nag">
            <div class="update-split update-success"><i class="glyphicon glyphicon-warning-sign"></i></div>
            <div class="update-text"> <strong></strong> <?php echo $this->session->flashdata('success_message');?> </div>
          </div>
<?php	$this->session->flashdata("success_message " , ""); } ?>
 
 <?php if($this->session->flashdata('error_message') != ""){ ?>
<div class="update-nag">
            <div class="update-split update-danger"><i class="glyphicon glyphicon-warning-sign"></i></div>
            <div class="update-text"> <strong>Warning</strong> <?php echo $this->session->flashdata('error_message');?> </div>
          </div>
<?php	$this->session->flashdata("error_message " , ""); } ?>


                <div class="form">
<div class="header"><h2>Sign In</h2></div>
<div class="login">
        <form id="signupform" class="form-horizontal" method="post" enctype="multipart/form-data" action="signup/register" >
<ul>
<li>
<span class="un"><i class="fa fa-user"></i></span><input type="text" required="" name="username" class="text" placeholder="User Name"></li>

<li>
<span class="un"><i class="fa fa-mars"></i></span>
<label class="radio"><input type="radio" value="male" name="gender">male</label>
  <label class="radio"><input type="radio" value="female" name="gender">female</label>
</li>
<li>
<span class="un"><i class="fa fa-envelope"></i></span><input type="email" required="" name="email" class="text" placeholder=" Email"></li>

<li>
<span class="un"><i class="fa fa-lock"></i></span><input type="password" required="" name="password" class="text" placeholder="User Password"></li>

<li>
<span class="un"><i class="fa fa-birthday-cake"></i></span><input type="date" name="birth_date" class="text" id="birth_date" required="" class="form-control"></li>
<li>
<span class="un"><i class="fa fa-building"></i></span><input type="text" required="" name="workplace" class="text" placeholder="User Name Or Email"></li>

<li>
<span class="un"><i class="fa fa-picture-o"></i></span><input type="file" name="image" class="text" placeholder="User Name Or Email"></li>

<input type="submit" value="signup" class="btn">


</ul>
</form>
</div><br>
<div class="sign">
<div class="need">Want to login ?</div>
<div class="up"><a href="/login">Login</a></div>
</div>
</div>
        </div>
    </div>
</div>
   
</body>
</html>
