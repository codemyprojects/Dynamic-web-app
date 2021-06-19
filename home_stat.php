  <style type="text/css" media="screen">
			#list{
				margin:0 auto;
				height:335px;
				width:445px;
				overflow:hidden;
				position:relative;
				background:none repeat scroll 0 0 #581A05;
				
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
				color:#CCC;
			}
			#list a:hover{
				color:#FFF;
				text-decoration: underline;
			}
		</style>
  
  <div class="home_stat">
  <div class="books_stat">
  <h2>Most Viewed</h2>
	<div id="list" class="tag_holder">
	<ul>
		<?php 
		$counter = 0;
		$stat = mysql_query("SELECT *, count(book_stat.book_id) as count FROM book_stat LEFT JOIN books ON books.accession_no = book_stat.book_id GROUP BY book_stat.book_id ASC LIMIT 10") or die(mysql_error());
		WHILE($stats = mysql_fetch_array($stat)){
		$counter++;
		?>
		<li class="ctag tag<?php echo $counter; ?>" id="<?php echo $counter; ?>"><a href="#"><?php echo $stats['title']; ?></a></li>
		<?php } ?>
	</ul>
	
	</div>
  </div>
  <div class="tag_result">
 
  </div>
		<div class="type_search">
		<h2>Search Keywords</h2>
		<div class="group1 group">
		<strong>Search Options Information</strong>
		<ul>
		<li  class="click_me" href="#ac">Accession Number</a></li>
		<li  class="click_me" href="#tit">Title</li>
		<li  class="click_me" href="#au">Author</li>
		<li  class="click_me" href="#as">Advanced Search</li>
		</ul>
		</div>
		<div class="group2 group">
		<strong>Sections Information</strong>
		<ul>
		<li class="click_me" href="#fil">Filipiniana</li>
		<li class="click_me" href="#cir">Circulation</li>
		<li class="click_me" href="#fea">Feasibility</li>
		<li class="click_me" href="#mag">Magazines</li>
		<li class="click_me" href="#ref">Reference</li>
		</ul>
		</div>
			<div class="search_desc" id="mag">
			<h4>Magazine</h4>
			Generally published on a regular schedule, containing a variety of articles.
		</div>
			<div class="search_desc" id="fea">
		<h4>Feasibility</h4>
			It is the preliminary study to determine a project's viability.
		</div>
			<div class="search_desc" id="cir">
			<h4>Circulation</h4>
		 It houses and takes charge of the general collection of the library
		</div>
			<div class="search_desc" id="fil">
			<h4>Filipiniana</h4>
		 It refers to Philippine-related books and non-book materials (such as figurines, games, fashion and others).
		</div>
		<div class="search_desc" id="ac">
		<h4>Accession Number</h4>
			 Sequential number assigned to each record or volume as it is added to a database (such as a library catalog or index) and which indicates the chronological order of its acquisition. Compare with acquisition number
		</div>
		
	<div class="search_desc" id="tit">
		<h4>Title</h4>
			An identifying name given to a book, play, film, musical composition, or other work.
		</div>
		
		<div class="search_desc" id="au">
		<h4>Author </h4>
			The person who "originates or gives existence to anything"
		</div>
		
			<div class="search_desc" id="as">
		<h4>Advanced Search</h4>
			It is a very useful feature offered by most search engines and search tools on the Web. Advanced search gives the Web searcher the ability to narrow their searches by a series of different filters
		</div>
		
		<div class="search_desc" id="ref">
		<h4>Reference</h4>
			This is where you can find books such as encyclopedia, dictionary, etc.,
		</div>
		
		<div class="search_desc" id="sample">
			Please Click the items to show Description
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
	url: "app/content/cms/get_tag_data.php",	
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
