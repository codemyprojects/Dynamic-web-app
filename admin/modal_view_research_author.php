    <div id="view_research_author<?php echo $r_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
    <h3 id="myModalLabel">Authors of <a><?php echo $row['research_title'];?></a></h3>
    </div>
				<?php 
				$research_query=mysql_query
				("SELECT * FROM author_has_research INNER JOIN research ON author_has_research.research_id=research.research_id 
				INNER JOIN author ON author_has_research.author_id=author.author_id
				where author_has_research.author_id='$r_id' and author.author_id = author_has_research.research_id
				OR author_has_research.research_id = '$r_id' and author.author_id = author_has_research.author_id") or die (mysql_error());
				
				while ($a_row=mysql_fetch_array($research_query)){
			?>
    <div class="modal-body">
	
    <a style="float:left; margin-bottom:-15px; font:bold 20px 'Aleo';"><img src="<?php echo $a_row['image'];?>" class="img-polaroid" style="width:80px; height:60px;"> <?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname'] ;?></a>
    <div class="pull-right">
	<a href="#delete_author_research<?php echo $a_row['author_has_research_id']; ?>" a data-toggle="modal" class="btn btn-danger">  <i class="icon-trash icon-large"></i></a>
	</div><hr>
	</div>
		  <?php include('modal_delete_author_research.php');?>

	<?php } ?>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
    </div>
    </div>
	
	
	