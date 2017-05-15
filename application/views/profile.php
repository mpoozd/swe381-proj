<!DOCTYPE html>
<html>
	    <?php include 'header.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>



<!-- nav bar -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
  <div class="col-sm-3">
        
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a href="/posts">
                    <i class="fa fa-inbox"></i> Posts  <span class="label pull-right"> <?echo $posts->num_rows() ?> </span>
                </a>
            </li>
            <li>
                <a href="/requests"><i class="fa fa-envelope-o"></i>Friend requests</a>
            </li>
            <li>
                <a href="javascript:void(0)" onclick="show()" ><i class="fa fa-inbox"></i>new Post</a>
            </li>

            
        </ul> 

       
    </div> <!-- /.nav -->
    <div class="col-sm-9">
        
        <!-- resumt -->
        <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <?php if($this->session->userdata('avatar') != ""){ ?>
                         <img class="img-circle img-responsive" alt="" src="<? echo base_url() ?>/uploads/<?echo $this->session->userdata('avatar');?>">
                                <? } else { ?> 
                              <img class="img-circle img-responsive" alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg">
                           <? } ?>
                           </figure>
                           <div class="row">
                              <div class="col-xs-12 social-btns">
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-google">
                                    <i class="fa fa-google"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-twitter">
                                    <i class="fa fa-twitter"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-linkedin">
                                    <i class="fa fa-linkedin"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-github">
                                    <i class="fa fa-github"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                    <i class="fa fa-stack-overflow"></i> </a>
                                 </div>
                              </div>
                              
                              
                           </div>
                           
                        </div>
                        <div class="col-xs-12 col-sm-8">
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

                           <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-user"></i> <? echo $this->session->userdata('user_name'); ?> </li>
                              <li class="list-group-item"><i class="fa fa-envelope"></i> <? echo $this->session->userdata('user_email'); ?> </li>
                              <li class="list-group-item"><i class="fa fa-birthday-cake"></i> <? echo $this->session->userdata('age'); ?> </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div><br> <div>
                 <div id="postdiv" style="display:none;"> 
               <form id="postform" class="form-signin"  method="post" enctype="multipart/form-data" action="/profile/new_post"  >
                <input id="post_text" name="post_text" type="text" class="form-control" placeholder="post" required autofocus>
                <br>
                 <input type="file" id="myfile" name="myfile">

                <br>
                <button class="btn btn-lg btn-primary btn-block" value="send" onclick="" type="submit"> send</button>
                <br>

                </form>
                 </div>

                <?php
          if($posts->num_rows() > 0){
							foreach($posts->result_array() as $posts_row){
				   ?>
               <div class="bs-callout bs-callout-danger">
                 <h4><? echo $this->model->select_single_field('user_name','users',array('user_id'=>$posts_row['user_id'])); ?> </h4>
                              <?php if($posts_row['photo'] != ""){ ?>                  
                                  <img style="height: 100px;" src="<? echo base_url() ?>/uploads/<?echo $posts_row['photo']; ?>" alt="">
                                  <? } ?>
                  <p>
                      <?=$posts_row['post_text']?>
                  </p>
               </div>
   <? }} ?>


    </div>
</div>
</div>

<script>
  function show(){
    $("#postdiv").toggle();
  }
  function new_post(){
    			var po = $("#post_text").val();
                var myfile = document.getElementById("myfile").value;

	var is_error = false;
	if($.trim(po) === ''){
             toastr.error('Error!', 'text box cannot be empty');   
		is_error = true;
	}

	
	if(is_error == false){
		
		
		$.ajax({
			url:'<?php echo base_url()?>/Profile/new_post',
			type:'POST',
			data:{"po":po , "myfile" : myfile},
             processData: false,
             contentType: false,
			success:function(result){
				 if(result.indexOf("sucsses")){					 
                     toastr.success('sucsses!', 'post sent sucssesfully');
                     $("#post_text").val('');
				 }else{
                     toastr.error('Error!', 'please retry again');
					return false;
				}				
			}

	});	
		
	}	
  }
</script>

  </body>
</html>
