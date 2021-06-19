

<ul id="da-thumbs" class="da-thumbs">
					
                    
                    
						<a href="">
							                <?php 
											$sql="select * from ols_gallery";
											$resulgallery=mysql_query($sql);
											while($data=mysql_fetch_assoc($resulgallery))
											
											{ ?>
                                           
								
                                
                                <a href="gallery/<?php echo $data['imgname'];?>" class="highslide" onclick="return hs.expand(this)">
                                 <img src="gallery/<?php echo $data['imgname']; ?>" alt="Highslide JS" width=150px height=150px
		title="Click to enlarge" />
                                
								
                                
                                	
									
							
                              <?php } ?>
                
 
						</a>
					
</ul>
					
					
					<?php include('scripts.php'); ?>
