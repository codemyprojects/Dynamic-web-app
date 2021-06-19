 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid" style="background-color:#003333;">
          
          <a class="brand" href="#"><b>HIMS NEPAL ORGANIZATION</b>&nbsp &nbsp &nbsp  &nbsp <font size="+1">Programmed by : Indra Ale</font></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
			<?php 
			
			$user_id=$_SESSION['id'];
			$member_query = mysql_query("select * from user where user_id = '$user_id'")or die(mysql_error());
			$member_row = mysql_fetch_array($member_query);
			
			$fullname = $member_row['fullname'];
			?>
              <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $fullname; ?> </strong></a></li>
			 <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>