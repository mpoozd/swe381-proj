<!DOCTYPE html>
<html>
	    <?php include 'header.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="messages.js" charset="utf-8"></script>
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
                              <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
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
                <?php
          if($posts->num_rows() > 0){
							foreach($posts->result_array() as $posts_row){
				   ?>
               <div class="bs-callout bs-callout-danger">
                  <h4>Posts</h4>
                  
                  <p>
                      "<?=$posts_row['post_text']?>"
                  </p>
               </div>
   <? }} ?>
        <!-- resume -->

    </div>
</div>
</div>


  </body>
</html>
