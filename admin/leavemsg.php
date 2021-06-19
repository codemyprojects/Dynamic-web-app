    <div id="add_admin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	<center><h3 id="myModalLabel"><i class="icon-user icon-large"></i> Add Admin</h3></center>
    </div>
    <div class="modal-body">
     <form class="form-horizontal" method="POST">
	 <br>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Username:</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Username" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password:</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="Password" required>
    </div>
  </div>
  
   <div class="control-group">
    <label class="control-label" for="inputPassword">Full Name:</label>
    <div class="controls">
      <input type="text" id="inputPassword"  name="fullname" placeholder="Full Name" required>
    </div>
  </div>
 

  </div>
  <div class="modal-footer">
    <button name="save" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
    </form>  
	
	 <?php
		if(isset($_POST['save'])){
		$username=$_POST['username'];
		$password=($_POST['password']);
		$fullname=$_POST['fullname'];
		
		
		mysql_query("insert into user (username, password, fullname) values('$username','$password','$fullname')")or die(mysql_error());
		header('location:admin.php');
		}
		?>
    </div>
    </div>