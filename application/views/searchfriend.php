<!DOCTYPE html>
<html>
  <head>
      <?php include 'header.php'; ?>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    


    <div class="container">
        
         <?php
          if(isset($search) && $search->num_rows() > 0){
							foreach($search->result_array() as $search_row){
				   ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                <? echo $search_row['user_name'] ?>   </h4>
                            <small><cite title="San Francisco, USA"> <? echo $search_row['workplace']; ?> <i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"> </i><? echo $search_row['user_email']; ?>                                <br />
                                <i class="glyphicon glyphicon-globe"><? echo $search_row['gender']; ?>     </i>
                                <br />
                                <i class="glyphicon glyphicon-gift">  </i><? echo $search_row['age']; ?>    </p>
                            <!-- Split button -->
                            <div class="btn-group">
                                <a  class="btn btn-primary" href="<?echo base_url().'/search/send_invite/'. $this->session->userdata('user_id') .'/'. $search_row['user_id']; ?>">Send friend request</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? }}
        else { ?>
       <div class="alert alert-warning">
  <strong>oops!</strong> result no found or try to search again.
        </div>
        <? } ?>
    </div>


  </body>
</html>
