<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>
<style>
	body{
		background) -80% 20% no-repeat ;
	}
</style>

<body>
	
	<div id="container">
	
	<br>	<br>	<br>	<br>	<br>	<br>	<br>
	<div id="loginhead" style="background-color:#003333; color: #FFCC99;">
		<i class="icon-lock icon-large" style="color:#FFFFFF;"></i> HIMS NEPAL
	</div>
	<div id="login">
			<form method="POST" id="login_form">
						
				<div class="input-prepend">
						<span class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:8px; width:250px;" type="text" name="username" Placeholder="Username" / required><br><br>
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-key icon-2x"></i></span><input type="password" style="height:8px; width:250px;" name="password" Placeholder="Password" / required><br><br>
						</div>
						
		</div> <!-- end login -->
						
						<div id="loginfoot" style="background-color:#003333;">
						<div class="qwe">
						<button class="" name="login" type="submit"><i class="icon-signin icon-large" style="color:#006666;"></i> Login</button>
				</div>
				</div>
					
						</form><br>
						
						
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Loading File Please Wait......", { sticky: true });
						$.jGrowl("You have Successfully Login!", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  
		
		
		
		
		
	</div><!-- end container --->

<?php include('scripts.php');?>
</body>

</html>