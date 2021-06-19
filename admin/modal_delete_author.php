<div id="delete_author<?php echo $a_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <br>
  <div class="modal-body">
  Are you sure you want to delete<strong> <img class="img-polaroid" src="<?php echo $author_row['image']; ?>" width="50" height="50"> <?php echo $author_row['firstname']." ".$author_row['middlename']." ".$author_row['lastname'];?>?</strong>
  </div>
  <br>
  <div class="modal-footer">
      <a href="delete_author.php<?php echo '?id='.$a_id; ?>" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;Yes</a>
	        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

  </div>
</div>



