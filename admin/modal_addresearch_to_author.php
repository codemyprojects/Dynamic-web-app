	<div id="add_author_to_research<?php echo $r_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	<h3 id="myModalLabel">Add Photo to <a><?php echo $row['research_title'];?></a></h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="POST" action="save_addresearchtoauthor.php">
    <div class="control-group">
    <label class="control-label" for="inputEmail"></label>
	<input type="hidden" name="research" value="<?php echo $r_id;?>"><br />
    <div class="controls">
    </div>
    </div>
	<center>
   <strong>Choose Author:</strong><br>
   
		<select style="width:250px; height:30px;" name="author_id">
		<option></option>
		<?php $a_query = mysql_query("SELECT * FROM author") or die (mysql_error());
			while ($a_row = mysql_fetch_array($a_query)){
		?>
			
			<option value="<?php echo $a_row['author_id'];?>"><?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname'];?></option>
			<?php }?>
		</select>
	</center>
  
    </div>

	 <div class="modal-footer">
	 
	<button name="save" type="submit" class="btn btn-warning"><i class="icon-save icon-large"></i>&nbsp;Save</button>
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Cancel</button>
		
    </div>
  
    </form>	
	
	
</div>
