<div id="delete_admin<?php echo $u_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <br>
  <div class="modal-body">
  Are you sure you want to delete<strong> <?php echo $row['fullname'];?>?</strong>
  </div>
  <br>
  <div class="modal-footer">
      <a href="delete_admin.php<?php echo '?id='.$u_id; ?>" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;Yes</a>
	        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

  </div>
</div>



