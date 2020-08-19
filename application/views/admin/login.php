
<div class="container">
	<div class="col-md-5 mx-auto text-center">
		<h1><?= $title ?></h1>
		<form method="post" action="<?php echo base_url();?>admin/login">
			<div class="form-group">
				<input class="form-control" type="text" name="admin" placeholder="Admin">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<button type="submit" name="submit" value="login" class="btn btn-primary">Login</button>
			</div>
		</form>
	</div>
</div> 