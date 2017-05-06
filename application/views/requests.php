<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
  <head>
	  
    <meta charset="utf-8">
    <title></title>
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
													<span class="media-meta pull-right"><a  class="btn btn-success" href="<?echo base_url().'/requests/status/1'; ?>" >accept</a></span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado"><a  class="btn btn-danger" href="<?echo base_url().'/requests/status/0'; ?>" >Deny</a></span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</section>

	</div>
</div>



  </body>
</html>
