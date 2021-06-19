    <div id="add_author_photo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">

    <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
    <form  id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
			
				<div class="control-group">
                                   Image:
                                   
                                        <input type="file" name="image" class="font" required> 
                                    
                                </div>

					<?php
	if (isset($_POST['submit_cover'])) {
 
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
		$location = "images/" . $_FILES["image"]["name"];
		$conn->query("update author set photo = '$location' where author_id  = '$session_id' ");
				header('location:profile.php');

	?>
	
	<?php
	}
	?>
			</form>
			
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
    </div>
    </div>