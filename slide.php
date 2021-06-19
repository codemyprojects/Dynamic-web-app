  
  <style type="text/css" media="screen">
			#list{
				margin:0;
				height:275px;
				width:390px;
				overflow:hidden;
				position:relative;
				border-radius:5px;
				border:1px solid #fff;
				box-shadow:2px 2px 2px #aaa;
				background: #009999;
				
			}
			#list ul,
			#list li{
				list-style:none;
				margin:0;
				padding:0;
			}
			#list a{
				position:absolute;
				text-decoration: none;
				color: #FFFF00;
			}
			#list a:hover{
				color:#FFF;
				text-decoration: underline;
			}
			
			.type_search{
			float:left;
			width:300px;
			}
		</style>
  
  <div class="home_stat">
  <div class="books_stat">
	<div id="list" class="tag_holder">
	<ul>
		<?php 
		$counter = 0;
		$stat = mysql_query("SELECT * FROM research where status != 'Archive' GROUP BY research_id ASC LIMIT 10") or die(mysql_error());
		WHILE($stats = mysql_fetch_array($stat)){
		$counter++;
		?>
		<li class="ctag tag<?php echo $counter; ?>" id="<?php echo $counter; ?>"><a href="#"><?php echo $stats['research_title']; ?></a></li>
		<?php } ?>
	</ul>
	
	</div>
  </div>

  </div>
  
 
<script type="text/javascript">


$(document).ready(function(){

	$('#sample').show();
	$('.click_me').click( function() {
		var item = $(this).attr('href')
		$('.search_desc').hide()
		$(item).fadeIn();
	})
	
	$('.ctag').click( function() {
	var id = $(this).attr('id')
	$.ajax({		
	type: "POST",
	data: ({id: id}),	
	url: "get_tag_data.php",	
	cache: false,
	success: function(response){
	$('.tag_result').fadeTo('slow', 0.8).html(response)
	}
	})
	return false
	})

	var element = $('#list a');;
	var offset = 0; 
	var stepping = 0.01;
	var list = $('#list');
	var $list = $(list)
	
	$list.mousemove(function(e){
		var topOfList = $list.eq(0).offset().top
		var listHeight = $list.height()
		stepping = (e.clientY - topOfList) /  listHeight *  0.01;
		
	});
	

	for (var i = element.length - 1; i >= 0; i--)
	{
		element[i].elemAngle = i * Math.PI * 2 / element.length;
	}
	
	
	setInterval(render, 20);
	
	
	function render(){
		for (var i = element.length - 1; i >= 0; i--){
			
			var angle = element[i].elemAngle + offset;
			
			x = 100 + Math.sin(angle) * 5;
			y = 40 + Math.cos(angle) * 40;
			size = Math.round(18 - Math.sin(angle) * 5 );
			
			var elementCenter = $(element[i]).width() / 2;
	
			var leftValue = (($list.width()/2) * x / 90 - elementCenter) + "px"
	
			$(element[i]).css("fontSize", size + "pt");
			$(element[i]).css("opacity",size/50);
			$(element[i]).css("zIndex" ,size);
			$(element[i]).css("left" ,leftValue);
			$(element[i]).css("top", y + "%");
		}
		
		offset += stepping;
	}
	
	
});


</script>
