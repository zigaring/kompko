<?php if($this->session->userdata('logged_in')){ ?>

<h2 style="text-align: center">Uredi</h2>

  <div class="container">
    <form class="form-group" method="post" action="<?php echo site_url('admin/komponenta_update'); ?>">
        <input type="hidden" name="id" value="<?php echo $komponenta['id'] ?>">
        <label>Serijska</label>
        <input type="number" class="form-control" name="date" value="<?php echo $komponenta['serijska'] ?>">
        <label>Tip</label>
        <select class="form-control" name="komponenta" value="<?php echo $komponenta['tip'] ?>">
                <option value="cpu">Cpu</option>
                <option value="motherboard">Motherboard</option>
                <option value="graphic">Graphic</option>
                <option value="memory">Memory</option>
                <option value="storage">Storage</option>
                <option value="power">Power</option>
                <option value="pc_case">PC Case</option>
            </select>
        <label>Ime</label>
        <input type="text" class="form-control" name="country" value="<?php echo $komponenta['ime'] ?>">
        <label>Garancija</label>
        <input type="text" class="form-control" name="venue" value="<?php echo $komponenta['garancija'] ?>">
        <br>
        <button type="submit" class="btn btn-secondary" name="submit" value="Submit">Submit</button>
    </form>
  </div>

<h2>TEST TEST</h2>

<?php } ?>