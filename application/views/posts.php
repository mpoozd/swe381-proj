
<head>
    <title>Post</title>
  <?php include 'header.php'; ?>
	<title></title>
  <meta charset="UTF-8">

</head>

 <?php
          if($posts->num_rows() > 0){
							foreach($posts->result_array() as $posts_row){
				   ?>
	


<div class="container">
  <blockquote contenteditable="true">
                <img src="http://placehold.it/260x180" alt="">
	  <p> "<?=$posts_row['post_text']?>" </p>
	  <small>Enter your comments <cite title="Source Title">here</cite></small>
    </blockquote>
    
</div>

<?php	} } ?>

<div class="col-xs-9 col-md-9 section-box">
                        <h2>
                            Bootsnipp <a href="http://bootsnipp.com/" target="_blank"><span class="glyphicon glyphicon-new-window">
                            </span></a>
                        </h2>
                        <p>
                            Design elements, playground and code snippets for Bootstrap HTML/CSS/JS framework</p>
                        <hr />
                        <div class="row rating-desc">
                            <div class="col-md-12">
                                <span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart">
                                </span><span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart">
                                </span><span class="glyphicon glyphicon-heart"></span>(36)<span class="separator">|</span>
                                <span class="glyphicon glyphicon-comment"></span>(100 Comments)
                            </div>
                        </div>
                    </div>
					
                <form id="postform" class="form-signin"  method="post" enctype="multipart/form-data" action=""  >
                <input id="post_text" "name="post_text" type="text" class="form-control" placeholder="post" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" value="send" onclick="new_post()" type="button"> send</button>


                </form>







<script>
  function new_post(){
    			var po = $("#post_text").val();

	var is_error = false;
	if($("input[name=post_text]").val() == ""){
		$("input[name=post_text]").addClass('error');	
		is_error = true;
	}

	
	if(is_error == false){
		
		
		$.ajax({
			url:'<?php echo base_url()?>/Posts/new_post',
			type:'POST',
			data:{"po":po},
			success:function(result){
				 if(result.indexOf("sucsses")){					 
                     alert('sents');
					 //window.location.href= "<?php echo base_url() ?>/login" ;
				 }else{
					$("#message_error").html(result);
					return false;
				}				
			}

	});	
		
	}	
  }
</script>