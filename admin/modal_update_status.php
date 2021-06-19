	<div id="update_status<?php echo $r_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	<h3 id="myModalLabel"><i class="icon-user icon-large"></i> Update Status</h3>
    </div>
    <div class="modal-body">
                  <form class="form-horizontal" method="POST">
    <div class="control-group">
    <div class="controls">
    <input name="id" value="<?php echo $r_id;?>" type="hidden" id="inputEmail" placeholder="ID">
  
    </div>
    </div>

	  <div class="control-group">
    <div class="controls">
	<center>
   <select name="status" style="width:230px;">
   <center>
	<option><?php echo $row['status'];?></option>
			<option value="New">New</option>
			<option value="Old">Old</option>
			<option value="Lost">Lost</option>
			<option value="Damage">Damage</option>
			<option value="Subject for Replacement">Subject for Replacement</option></center>
   </select>
  </center>
    </div>
    </div>
	
    </div>

	 <div class="modal-footer">
	 
	<button name="edit_stats" type="submit" class="btn btn-warning"><i class="icon-save icon-large"></i>&nbsp;Save</button>
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Cancel</button>
			<?php
	if (isset($_POST['edit_stats'])){
	$id = $_POST['id'];
	$status = $_POST['status'];

	
	mysql_query("update research set status = '$status' where research_id = '$id' ")or die(mysql_error());
	header('location:research.php');
	?>
	
	<?php

	
	}
	?>
    </div>
  
    </form>	
	
	
</div>

</div>