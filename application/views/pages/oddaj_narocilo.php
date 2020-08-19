<h2 class="h1">Vnesite Svoje Podatke</h2>

<div class="container" style="margin-top: 30px">
	<div class="col-md-5 mx-auto text-center">
<?php echo $cpu; ?><br>
<!-- <?php echo $motherboard; ?><br>
<?php echo $graphic; ?><br> 
<?php echo $memory; ?><br> 
<?php echo $storage; ?><br> 
<?php echo $power; ?><br> 
<?php echo $pc_case; ?><br>  -->
</div>

<div class="col-md-5 mx-auto text-center" style="margin-top: 30px">
	<?php echo form_open(); ?>
	<div class="form-group">
		<input class="form-control" type="text" name="ime" placeholder="Ime">
    </div>
    <div class="form-group">
		<input class="form-control" type="text" name="priimek" placeholder="Priimek">
    </div>
    <div class="form-group">
		<input class="form-control" type="email" name="email" placeholder="Email">
    </div>
    <input class="btn btn-primary" type="submit" value="Oddaj">
</div>
</div>