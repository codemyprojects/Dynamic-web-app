<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}
p{color: #990000; text-align:center; 
}
h3{ color: #FFFF99; background-color: #666666; text-align:center;}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 24.74%;
    padding: 10px;
    height: 400px; /* Should be removed. Only for demonstration */
	
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>


<div class="row">
<div class="column" style="background-color:#333333; color: #CCCCCC;">
<h3>Hims Nepal</h3>
<p style="text-align:left; color:#CCCCCC;">
Nilakantha Municipality-3  
Dhading, Nepal <br>
Telephone: <br> +997 (0) 10-520623  <br>
Email: himsnepal@yahoo.com <br>
Website: www.himsnepal.org.np <br>
Facebook: HIMSNepal, Twitter:HIMSNepal 
  </p>
  </div>
  <div class="column" style="background-color: #333333;">
    <h3>Quick Links</h3>
    <p><a href="#">About HIMS</a></p>
    <p><a href="#">What we do?</a></p>
    <p><a href="#">Where we Work?</a></p>
    <p><a href="#">Case Study</a></p>
    <p><a href="#">Work with us</a></p>
</p>
  </div>
  <div class="column" style="background-color:#333333;">
    <h3>Photo Gallery</h3>
    <div>
   <a href="hims_galleries.php"><img src="images/albimg.JPG" alt="Smiley face" height="400pz" width="300px"></a>
    </div>
  </div>


</div>

</body>
</html>
