<!DOCTYPE html>
<html>
  <head>
      <?php include 'header.php'; ?>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>

    


     <div class="container">
	<div class="row">

		<section class="content">
			<h1>Results</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
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

						<div class="pull-right">
		
					
						</div>
					<?php
						if(!isset($search))
						die('');
						
							if($search !== false && $search->num_rows() > 0 ){
							foreach($search->result_array() as $search_row){
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
													<span class="media-meta pull-right"><a  class="btn btn-success" href="<?echo base_url().'/search/send_invite/'. $this->session->userdata('user_id') .'/'. $search_row['user_id']; ?>" >send invite</a></span>
													<h4 class="title">
														<? echo $search_row['user_name'] ?>
													</h4>
													<p class="summary">	<? echo $search_row['user_email'] ?></p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<? } } else { ?>
						       <div class="alert alert-danger">
  <strong>oops! </strong> there is no result found.
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
