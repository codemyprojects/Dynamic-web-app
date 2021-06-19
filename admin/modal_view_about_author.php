    <div id="about_author<?php echo $a_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">

    <h3 id="myModalLabel">About <?php echo $author_row['firstname']." ". $author_row['middlename']." ". $author_row['lastname'];?></h3>
    </div>
    <div class="modal-body">
    <?php echo $author_row['about_author'];?>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
    </div>
    </div>