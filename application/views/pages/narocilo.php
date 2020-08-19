<div class="mx-auto">
	<h2 class="h1">Sestavi si računalnik</h2>
</div>
<div class="container"> <!-- CONTAINER -->
	<br>
	<br><br>
	<div class="row">  <!-- ROW -->
		<div class="col-md-7"> <!-- DIV ZA SELECT KOMPONENT -->
			<div class="col-md">
			<select name="komponente" class="form-control" id="komponente">
			  <option disabled selected value> -- izberi si komponento -- </option>
			  <option value="cpu">CPU</option>
			  <option value="motherboard">Motherboard</option>
			  <option value="graphic">Graphic</option>
			  <option value="memory">Memory</option>
			  <option value="storage">Storage</option>
			  <option value="power">Power</option>
			  <option value="pc_case">PC Case</option>
			</select>
			</div>
			<br />
			<div class="row" id="komponenta">
					<!-- PRAZEN DIV ZA IZBRANE SKUPINE KOMPONENT -->
			</div>
		</div>
		<div class="cart-items col-md-5">  			<!-- KOŠARICA -->
			<?php echo form_open('narocila/oddaj_narocilo')?>
				<h3 id="cart" align="center">Košarica</h3>
					<div class="cart-total" align="right">
						<strong class="cart-total-title">Skupaj:</strong>
						<span class="cart-total-price text-danger">0€</span>
						<br>
						<button type="submit" class="btn btn-primary">Oddaj</button>
					</div>
		</div>
		</form>
	</div>
	
	<div class="row" id="cpu" style="display: none">  <!-- DIV ZA POSAMEZNO KOMPONENTO (HIDDEN) -->
		<h3>CPU</h3>
		<?php foreach($k_cpu as $cpu): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">  			<!-- ROW -->
		    	<div class="col-md-2">  <!-- SLIKA -->
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $cpu['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">  
			    	<h5 class="title komponenta-title" ><?php echo $cpu['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $cpu['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $cpu["id"];?>')">Info</button><!--MODAL -->
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br /> <!-- DIV ZA KOLIČINO -->
			    	<!--id $cpu[id] smo tukaj zbrisali zarad MODALA(isti id)-->
			    </div>
		     	<div class="col-md-3 button">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $cpu['id'];?>" class="modal"> <!-- MODAL CONTENT -->
					<div class="modal-content">
			    		<span class="<?php echo $cpu['id'];?> close">&times;</span> <!-- &times = x -->
			    		<h3><?php echo $cpu['ime']; ?></h3>  <!-- naslov komponente -->
			    		<br>
			    		<p><?php echo $cpu['opis'];?></p>  <!-- vsebina modala -->
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="motherboard" style="display: none">
		<h3>MOTHERBOARD</h3>
		<?php foreach($k_motherboard as $motherboard): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $motherboard['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $motherboard['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $motherboard['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $motherboard["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
				<div id="<?php echo $motherboard['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $motherboard['id'];?> close">&times;</span>
			    		<h3><?php echo $motherboard['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $motherboard['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="graphic" style="display: none">
		<h3>GRAPHIC</h3>
		<?php foreach($k_graphic as $graphic): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $graphic['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $graphic['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $graphic['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $graphic["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $graphic['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $graphic['id'];?> close">&times;</span>
			    		<h3><?php echo $graphic['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $graphic['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="memory" style="display: none">
		<h3>MEMORY</h3>
		<?php foreach($k_memory as $memory): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $memory['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $memory['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $memory['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $memory["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $memory['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $memory['id'];?> close">&times;</span>
			    		<h3><?php echo $memory['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $memory['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="storage" style="display: none">
		<h3>STORAGE</h3>
		<?php foreach($k_storage as $storage): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $storage['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $storage['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $storage['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $storage["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $storage['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $storage['id'];?> close">&times;</span>
			    		<h3><?php echo $storage['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $storage['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="power" style="display: none">
		<h3>POWER</h3>
		<?php foreach($k_power as $power): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $power['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $power['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $power['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $power["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $power['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $power['id'];?> close">&times;</span>
			    		<h3><?php echo $power['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $power['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row" id="pc_case" style="display: none">
		<h3>PC CASE</h3>
		<?php foreach($k_pc_case as $pc_case): ?>
			<div class="col-md-12 komponenta-content" align="center">
			<div class="row">
		    	<div class="col-md-2">
		     		<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $pc_case['image'];?>" class="img-thumbnail" />
			    </div>
			    <div class="col-md-7 komponenta-text">
			    	<h5 class="title komponenta-title"><?php echo $pc_case['ime']; ?></h5>
				    <p class="price text-danger komponenta-price"><?php echo $pc_case['cena']; ?>€</p>
				    <button id="myBtn" onclick="showModal('<?php echo $pc_case["id"];?>')">Info</button>
				</div>
			    <div>
			    	<input type="hidden" class="item-quantity form-control"><br />
			    </div>
		     	<div class="col-md-3">
				    <button type="button" class="btn btn-success komponenta-addcart"/>Add to Cart</button>
			 	</div>
			 	<div id="<?php echo $pc_case['id'];?>" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
			    		<span class="<?php echo $pc_case['id'];?> close">&times;</span>
			    		<h3><?php echo $pc_case['ime']; ?></h3>
			    		<br>
			    		<p><?php echo $pc_case['opis'];?></p>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>





<!--

<h1 class="h1">Izdelaj si računalnik</h1>

<div class="col-md-5 mx-auto text-center" style="margin-top: 60px">
	<?php echo form_open('narocila/oddaj_narocilo')?>
	<div class="form-group">
		<h3>Procesor</h3>
	  	<select class="form-control" name="cpu" >
	  		<?php foreach($k_cpu as $cpu): ?>
	  			<option value="<?php echo $cpu['ime'];?>"><?php echo $cpu['ime'];?></option>
	  			<img src="<?php echo base_url();?>assets/images/komponente/<?php echo $cpu['image'];?>">
	  		<?php endforeach; ?>
	  	</select>
	</div>
  	<div class="form-group">
  		<h3>Matična plošča</h3>
	  	<select class="form-control" name="motherboard" >
	  		<?php foreach($k_motherboard as $motherboard): ?>
	  			<option value="<?php echo $motherboard['ime'];?>"><?php echo $motherboard['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  	<div class="form-group">
  		<h3>Grafična kartica</h3>
	  	<select class="form-control" name="graphic" >
	  		<?php foreach($k_graphic as $graphic): ?>
	  			<option value="<?php echo $graphic['ime'];?>"><?php echo $graphic['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  	<div class="form-group">
  		<h3>Spomin (RAM)</h3>
	  	<select class="form-control" name="memory" >
	  		<?php foreach($k_memory as $memory): ?>
	  			<option value="<?php echo $memory['ime'];?>"><?php echo $memory['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  	<div class="form-group">
  		<h3>Pomnilnik</h3>
	  	<select class="form-control" name="storage" >
	  		<?php foreach($k_storage as $storage): ?>
	  			<option value="<?php echo $storage['ime'];?>"><?php echo $storage['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  	<div class="form-group">
  		<h3>Napajalnik</h3>
	  	<select class="form-control" name="power" >
	  		<?php foreach($k_power as $power): ?>
	  			<option value="<?php echo $power['ime'];?>"><?php echo $power['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  	<div class="form-group">
  		<h3>Ohišje</h3>
	  	<select class="form-control" name="pc_case" >
	  		<?php foreach($k_pc_case as $pc_case): ?>
	  			<option value="<?php echo $pc_case['ime'];?>"><?php echo $pc_case['ime'];?></option>
	  		<?php endforeach; ?>
	  	</select>
  	</div>
  		<button class="btn btn-primary" type="submit">Oddaj</button>
	</form>
</div>

