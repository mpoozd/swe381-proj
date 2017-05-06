<!DOCTYPE html>
<html>
	    <?php include 'header.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>    

    <meta charset="UTF-8">
    <title>Signup</title>

<body>

	<div class="container">
	<div class="row">
		

        <form id="signupform" class="form-horizontal" method="post" enctype="multipart/form-data" action="signup/register" >
<fieldset>

<!-- Form Name -->
<legend>Register Here</legend>
 <?php if($this->session->flashdata('success_message') != ""){ ?>
<div class="update-nag">
            <div class="update-split update-success"><i class="glyphicon glyphicon-leaf"></i></div>
            <div class="update-text"> <strong></strong> <?php echo $this->session->flashdata('success_message');?> </div>
          </div>
<?php	$this->session->flashdata("success_message " , ""); } ?>
 
 <?php if($this->session->flashdata('error_message') != ""){ ?>
<div class="update-nag">
            <div class="update-split update-danger"><i class="glyphicon glyphicon-warning-sign"></i></div>
            <div class="update-text"> <strong>Warning</strong> <?php echo $this->session->flashdata('error_message');?> </div>
          </div>
<?php	$this->session->flashdata("error_message " , ""); } ?>

          
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">User name</label>
  <div class="col-md-4">
  <input id="username" name="username" placeholder="Insert your user name" class="form-control input-md" required="" type="text">
  <span class="help-block"> </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Gender</label>
  <div class="col-md-4">
  <label class="radio-inline"><input type="radio" value="male" name="gender">male</label>
  <label class="radio-inline"><input type="radio" value="female" name="gender">female</label>
  <span class="help-block"> </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-4">
  <input id="email" name="email" placeholder="Insert your Email" class="form-control input-md" required="" type="email">
  <span class="help-block"> </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
  <input id="password" type="password" name="password" placeholder="Insert your Password" class="form-control input-md" required="" type="password">
  <span class="help-block"> </span>
  </div>
</div>

<div class="form-group">
           <label class="col-md-4 control-label" for="textinput">Birth date</label>
           <div class="col-md-4">
               <input type="date" name="birth_date" id="birth_date" required="" class="form-control">
           </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Workplace</label>
  <div class="col-md-4">
  <input id="workplace" name="workplace" placeholder="Enter your workplace" class="form-control input-md" required="" type="text">
  <span class="help-block"> </span>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"> </label>
  <div class="col-md-4">
    <input id="submit" type ="submit" onclick="" name="submit" value="submit" class="btn btn-primary"> submit </input>
  </div>
</div>

</fieldset>
</form>

	</div>
</div>   
</body>




<script>

function signup(obj){
	
	
	
	var is_error = false;
	if($("input[name=email]").val() ){
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
			url:'<?php echo base_url()?>/Signup/register',
			type:'POST',
			data:$("#signupform").serialize(),
			success:function(result){
				 $this.button('reset');	
				 if(result.indexOf("registered") !== -1 ){					 
           // suc
           toastr.success('Success', 'you have registered successfully', {timeOut: 0});

					 //window.location.href= "<?php echo base_url() ?>/login" ;
				 }else{
					$("#login_error").html(result);
          toastr.error('Error', 'error', {timeOut: 0});

					return false;
				}				
			}

	});	
		
	}	
}
  
  
  // function valdite email
  
  function isEmail(val){
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    return String(e).search (filter) != -1;
  }
</script>