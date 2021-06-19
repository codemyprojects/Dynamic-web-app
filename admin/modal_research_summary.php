    <div id="view_summary<?php echo $r_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">

    <h3 id="myModalLabel">Summary of <a><?php echo $row['research_title'];?></a></h3>
    </div>
    <div class="modal-body">
    <?php echo $row['research_summary'];?>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
    </div>
    </div>