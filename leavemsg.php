    <div id="add_admin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	<center><h3 id="myModalLabel"><i class="icon-user icon-large"></i> Hims Nepal</h3></center>
    </div>
    <div class="modal-body">
     <form class="form-horizontal" method="POST">
	 <br>
  <div class="control-group">
    <label class="control-label" for="inputEmail">FUll NAME:</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Full Nmae" required>
    </div>
  </div>
  
  
  <div class="control-group">
    <label class="control-label" for="inputEmail">ADDRESS</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Place Address" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="inputEmail">EMAIL :</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Email Account" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="inputEmail">MOB/PHONE NUMBER</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Mobile Number" required>
    </div>
  </div>


 
  

  </div>
  <div class="modal-footer">
    <button name="save" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i> Send</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
    </form>  
	
	 <?php
		if(isset($_POST['save'])){
		$username=$_POST['username'];
		$password=($_POST['password']);
		$fullname=$_POST['fullname'];
		
		
		mysql_query("insert into user (username, password, fullname) values('$username','$password','$fullname')")or die(mysql_error());
		header('location:index.php');
		}
		?>
    </div>
    </div>