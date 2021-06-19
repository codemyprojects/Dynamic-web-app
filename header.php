					<h1>
                    <!--<div class="logo"><a href="index.php"><img src="images/timilsinasamaj.png" height="73px"></a> -->
                    
                   

                                     
					</h1>
					  
              

<?php
							mysql_query ("set character_set_client='utf8'"); 
                            mysql_query ("set character_set_results='utf8'"); 
							$sql = "select * from menu_pages where ppid=0 and status=1";
							$respage = executequery($sql);
							while($datapage = mysql_fetch_assoc($respage)) { 
							$pid = $datapage['pid'];
							?>
								<li>
                               
								<a href="pages.php?pid=<?php echo $pid;?>"><?php echo $datapage['pagetitle'];?></a>
                                
								<?php
									$sql = "select * from menu_pages where ppid='$pid' and status=1";
									$resc = executequery($sql);
									$no = mysql_num_rows($resc);
									if($no > 0) {
										echo "<ul>"; 
											while($datacpage = mysql_fetch_assoc($resc)) { 
											$cpid = $datacpage['pid'];
									?>
                                    
									<li><a href="hims_pages.php?pid=<?php echo $cpid;?>"><?php echo $datacpage['pagetitle'];?></a></li>
                                    
									<?php } //end of while?>	
									</ul>
									<?php }//end of if ?>
								</li>
								
								<?php }//end of while ?>