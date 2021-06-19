<div id="delete_research<?php echo $r_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <h3><font color="orange"><i class="icon-large icon-warning-sign"></i></font> Delete Research</h3>
  </div>
  <br>
  <div class="modal-body">
  Are you sure you want to delete<strong> <a><?php echo $row['research_title'];?>?</a></strong>
  </div>
  <br>
  <div class="modal-footer">
      <a href="delete_research.php<?php echo '?id='.$r_id; ?>" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;Yes</a>
	        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

  </div>
</div>



