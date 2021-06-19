<?php
$id = $_POST['id'];
//echo $id;
?>
<select name="sta" onChange="ajaxupdate(<?php echo $id;?>,this.value)">
	<option>select</option>
	<option>new</option>
	<option>junk</option>
	<option>following</option>
	<option>cashed</option>
</select>