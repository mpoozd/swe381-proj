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
<div class="alert alert-success">
             <strong></strong> <?php echo $this->session->flashdata('success_message');?>
          </div>
<?php	$this->session->flashdata("success_message " , ""); } ?>
 
 <?php if($this->session->flashdata('error_message') != ""){ ?>
<div class="alert alert-danger">
            <strong>Warning</strong> <?php echo $this->session->flashdata('error_message');?>
          </div>
<?php	$this->session->flashdata("error_message " , ""); } ?>


                <div class="form">
<div class="header"><h2>Sign In</h2></div>
<div class="login">
<form id="loginform" method="post" enctype="multipart/form-data" action="login/login">
<ul>
<li>
<span class="un"><i class="fa fa-user"></i></span><input type="email" required="" name="email" class="text" placeholder="User Name Or Email"></li>
<li>
<span class="un"><i class="fa fa-lock"></i></span><input type="password" required="" name="password" class="text" placeholder="User Password"></li>
<li>
<input type="submit" value="LOGIN" class="btn">
</li>
<li><div class="span"><span class="ch"><input type="checkbox" id="r"> <label for="r">Remember Me</label> </span> <span class="ch"><a href="#">Forgot Password?</a></span></div></li>
</ul>
</form>
</div><br>
<div class="sign">
<div class="need">Need new account ?</div>
<div class="up"><a href="">Sign Up</a></div>
</div>
</div>
        </div>
    </div>
</div>
   
</body>
</html>

<style>
.loginform {
	    margin-top: 137px;
}
</style>
<script>
  
  
	
function login(obj){
	
	
	
	var is_error = false;
	if($("input[name=email]").val() == ""){
		$("input[name=email]").addClass('error');	
		is_error = true;
	}
	if($("input[name=passsword]").val() == ""){
		$("input[name=passsword]").addClass('error');	
		is_error = true;
	}
	
	if(is_error == false){
		
		 var $this = $(obj);
  		$this.button('....');
		
		$.ajax({
			url:'<?php echo base_url()?>/Login/login',
			type:'POST',
			data:{"email": document.getElementById('email'),
				"password": document.getElementById('password') },
			success:function(result){
				 $this.button('reset');	
				 if(result.indexOf("success") !== -1){					 
                     alert('logined');
					 //window.location.href= "<?php echo base_url() ?>/login" ;
				 }else{
          toastr.error('Error', 'error', {timeOut: 0});
					
					return false;
				}				
			}

	});	
		
	}	
}
  
</script>