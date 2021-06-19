<script SRC="js/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="administrator/media/js/jquery.dataTables.js"></script>
<link rel='stylesheet' id='style-css'  href='scripts/diapo.css' type='text/css' media='all' /> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='scripts/diapo.js'></script> 
		
		<div id="sidebar">
		
	
		
					<div class="serts" style="margin-top:0px;">
							<form method="post" action="search.php"><br>
							<div style="font:bold 15px 'arial';"> </div>
							
							</form>
					</div>
					<div class="text-right" style="margin-top: -23px; background-color:;">
					
					
					
					<font style=" color: #930; font:bold 24px 'cambria';">Program Completion </font><hr style="margin:8px; border-bottom:1px solid #ccc;">
							
								<?php
								$r_query = mysql_query("select * from research where category = 'News' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">	
									<i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div>
							
								<?php } ?>
								<div class="line-block"></div>
								<font style=" color: #930; font:bold 24px 'cambria';">Programs Running</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
								<?php
								$r_query = mysql_query("select * from research where category = 'Programme' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">
									<div class="ellipsis-text"> <i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div></div>
							
								<?php } ?>
					</div>
                    
                    
                    
                    
                    <div class="text-right" style="margin-top: -23px; background-color:#9CC;">
					
					
					
					<font style=" color: #930; font:bold 24px 'cambria';">Achievement </font><hr style="margin:8px; border-bottom:1px solid #ccc;">
							
								<?php
								$r_query = mysql_query("select * from research where category = 'News' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">	
									<i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div>
							
								<?php } ?>
								<div class="line-block"></div>
								<font style=" color: #063; font:bold 24px 'cambria';">Running Programs</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
								<?php
								$r_query = mysql_query("select * from research where category = 'Programme' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">
									<div class="ellipsis-text"> <i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div></div>
							
								<?php } ?>
					</div>
                    
                    
                    
                    
					
			
					<br>
						

									<?php include ("slide.php"); ?>	
 
    <h3 style="background-color:#003333;">Contact Us</h3>
    <?php include('message.php'); ?>
    


							
					
							
							
				</div>