<!DOCTYPE html>
<html>
	    <?php include 'header.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>sign in</title>
  </head>  
<body>



<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in</h1>
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


        <form id="loginform" class="form-horizontal" method="post" enctype="multipart/form-data" action="login/login" >
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Email" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
            </div>
            <a href="/signup" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
   
</body>
</html>


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