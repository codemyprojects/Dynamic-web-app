<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

		
		<div id="sidebar">
					<div class="serts">
							<form method="post" action="search.php"><br>
							<div style="font:bold 15px 'arial';">Seach Here: </div>
								<input class="serts" style="padding:10px;" type="search" name="search" placeholder="Search by Title, Year, Author.......">
							</form>
					</div>
					<div class="text-right"  style="margin-top: -23px;">
					
						<font style=" color:darkblue; font:bold 24px 'cambria';">Author Overview</font><hr style="margin:8px; border-bottom:1px solid #ccc;">

								<?php
								$a_query = mysql_query("select * from author ORDER BY rand() LIMIT 6")or die(mysql_error());
								while($a_row=mysql_fetch_array($a_query)){
								$a_id = $a_row['author_id'];
								?>
									<script type="text/javascript">
											$(document).ready(function(){                                     
                                            $('#<?php echo $a_id; ?>').tooltip('show')
                                            $('#<?php echo $a_id; ?>').tooltip('hide')
                                        });
                                    </script>
												
								<a style ="color:blue; border-bottom:1px solid #aaa; font-size:16px; line-height:25px;" href="view_author_profile.php?id=<?php echo $a_id; ?>">
								<img class="img-polaroid" rel="tooltip"  data-placement="bottom"  title="<?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname']; ?>" id="<?php echo $a_id; ?>" src="admin/<?php echo $a_row['image']; ?>" style="width:110px; height:80px; padding:5px;">
								</a>
								
								<?php } ?>
								<br>
							
		
			
							
					</div>

					
					<br>
					<div class="text-right">
						<font style=" color:darkblue; font:bold 24px 'cambria';">
						<i class="icon-bullhorn"></i> 
						Latest News and Events</font><hr style="margin:8px; border-bottom:1px solid #ccc;">

						<?php $ann_query = mysql_query ("SELECT * FROM announcement");
						while ($ann_row = mysql_fetch_array($ann_query))
						{
						?>
								<font color="#000"><h3><?php echo $ann_row['title'];?></h3>
								<?php echo $ann_row['content'];?></font>
								<br>
								<div style="color:#000;" class="pull-right"><?php echo $ann_row['date'];?></div>
								<br>
							<?php } ?>
							</div>	
				</div>