

<div class="col-md-5 mx-auto text-center" style="margin-top: 20px">
	<h2>Dodaj komponento</h2>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/komponenta_insert') ?> <!-- multipart for image upload -->
		<div class="form-group">
		  	<select class="" name="komponenta" >
		  		<option value="cpu">Cpu</option>
		  		<option value="motherboard">Motherboard</option>
		  		<option value="graphic">Graphic</option>
		  		<option value="memory">Memory</option>
		  		<option value="storage">Storage</option>
		  		<option value="power">Power</option>
		  		<option value="pc_case">PC Case</option>
		  	</select>
	  	</div>
		<div class="form-group">
			<input class="form-control" type="number" name="serial" placeholder="Serijska Številka">
	  	</div>
	  	<div class="form-group">
			<input class="form-control" type="text" name="ime" placeholder="Ime">
	  	</div>
	  	<div class="form-group">
			<textarea class="form-control" type="text" name="opis" placeholder="Opis"></textarea>
	  	</div>
	  	<div class="form-group">
			<input class="form-control" type="number" step="0.01" name="cena" placeholder="Cena">
	  	</div>
	  	<div class="form-group">
			<input class="form-control" type="text" name="garancija" placeholder="Garancija">
	  	</div>
	  	<div class="form-group">
	  		<input type="file" name="userfile"> <!-- name mora biti userfile -->
	  	</div>
	  	<input class="btn btn-primary" type="submit" value="Oddaj">
	</form>
</div>

<div class="container" style="margin-top: 20px">
	<table id="myTable" class="table table-hover">
		<thead>
			<tr class="table-active">
				<th skope="col"><button onclick="sortTable(0)" class="btn-primary" id="tip">Tip</button></th>
				<th skope="col"><button onclick="sortTable(1)" class="btn-primary" id="tip">Ime</button></th>
				<th skope="col">Serijska</th>
				<th skope="col">Garancija</th>
				<th skope="col">Edit/Delete</th>
			</tr>
		</thead>
		<?php foreach($komponente as $komponenta): ?> <!-- Izpis vsake komponente posebi -->
		<tbody>
			<tr>
				<td><?php echo $komponenta['tip']; ?></td>
				<td><?php echo $komponenta['ime']; ?></td>
				<td><?php echo $komponenta['serijska']; ?></td>
				<td><?php echo $komponenta['garancija']; ?></td>
				<td>
					<button class="btn btn-secondary">
              		<a href="<?php echo base_url();?>admin/komponenta_edit/<?php echo $komponenta['id'] ?>">Edit</a></button>  <!-- Prek url posredujemo ID -->
            		<button class="btn btn-danger">
              		<a href="<?php echo base_url();?>admin/komponenta_delete/<?php echo $komponenta['id'] ?>">Delete</a>
              		</button>
				</td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>
</div>


<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>