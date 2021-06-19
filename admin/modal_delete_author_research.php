<div id="delete_author_research<?php echo $a_row['author_has_research_id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <br>
  <div class="modal-body">
  Are you sure you want to delete<strong> <a> <?php echo $a_row['firstname']." ". $a_row['lastname']." ". $a_row['lastname'];?></a>?</strong>
  

  </div>
  <br>
  <div class="modal-footer">
      <a href="delete_author_research.php<?php echo '?id='.$a_row['author_has_research_id']; ?>" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;Yes</a>
	        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

  </div>
</div>



