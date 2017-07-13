<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
</head>
	<body style="background:#1abc9c">
		<form action="<?php echo base_url('login/masuk/');?>" method="post">
			<div class="col-md-4 col-md-offset-4" style="margin-top:10%">
				<h3 align="center"><?php echo $judul;?></h3>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row form-group">
							<!-- <label class="col-md-3" for="username">Username
							</label> -->
							<div class="col-md-12">
								<input type="text" name="username" placeholder="Username anda" class="form-control input-sm"  id="username" required>
							</div>
						</div>


						<div class="row form-group">
							<!-- <label class="col-md-3" for="password">
							Password
							</label> -->
							<div class="col-md-12">
								<input type="password" name="password" placeholder="Password anda" class="form-control input-sm"  id="password" required>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-3"></label>
							<div class="col-md-9">
								<button type="submit" class="btn btn-info btn-sm">Login</button>
							</div>
						</div>
					</div>
				</div>

				<?php
				if($this->session->flashdata('pesan') <> ''){
				?>
					<div class="alert alert-dismissible alert-danger">
						<?php echo $this->session->flashdata('pesan');?>
					</div>
				<?php
				}
				?>
			</div>
		</form>
	</body>
</html>