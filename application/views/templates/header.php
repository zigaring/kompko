
<html>
<head>
	<title>Kompko</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="<?php echo base_url(); ?>assets/store.js" async></script>
</head>
<body>

<div>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <b><a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>">Domov</a></b>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?php echo base_url();?>about">O nas</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?php echo base_url();?>narocila">Naročilo</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?php echo base_url();?>kontakt">Kontakt</a>
			  </li>
			<?php if($this->session->userdata('logged_in')) { ?>  <!-- Če je admin prijavljen -->
			  <li class="nav-item">
			   	<a class="nav-link" style="color: lightblue" href="<?php echo base_url();?>admin/komponenta_dodaj">Dodaj komponento</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" style="color: red" href="<?php echo base_url();?>admin/logout">Admin Logout</a>
			  </li>
			<?php } ?>
			</ul>
	</div>



