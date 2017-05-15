<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
  <head>
	  
    <meta charset="utf-8">
    <title>Request</title>

  </head>
  <body>
  <div class="container">
	<div class="row">

		<section class="content">
			<h1>Friend requests</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							
						</div>
					<?php
							if($requests->num_rows() > 0){
							foreach($requests->result_array() as $requests_row){
				   ?>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr>	
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right"><a  class="btn btn-success" href="<?echo base_url().'/requests/change_status/'. $requests_row['request_id'] . '/1'; ?>" >accept</a></span>
													<h4 class="title">
														<? echo $requests_row['user_name'] ?>
														<span class="pull-right pagado"><a  class="btn btn-danger" href="<?echo base_url().'/requests/change_status/'. $requests_row['request_id']  .'/2'; ?>" >Deny</a></span>
													</h4>
													<p class="summary"><? echo $requests_row['user_email'] ?></p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<? } } else { ?>
						       <div class="alert alert-info">
  <strong>info:</strong> you do not have any requests yet.
        </div>
        <? } ?>
					</div>
				</div>
				
			</div>
		</section>

	</div>
</div>



  </body>
</html>
