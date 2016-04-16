<?php include("header.php");?>

<main class="container" id="link_1">
	<article class="col-xs-12">
		<form class="search_form">
			<input type="textbox" id="searchitem" class="searchedTextBox" placeholder="Search Item...">
		</form>
	
		<div id="loading-indicator" style="width: 100%; background-color: white; border: 2px solid gray; border-radius: 3px;">
			<img id="#loading-indicator" src="img/ajax-loader.gif" id="loading-indicator"/>		
		</div>

		<div class="grid">
			<div class='item grid-sizer hidden'>
			</div>
		</div>
	</article>
	
</main>
<?php include("footer.php");?>
<!-- Local Javascript -->
 <script>
	function loadItems(searchVal){
		$("#loading-indicator").removeClass("hidden");

		console.log(searchVal);
		
		$.ajax({
		type: 'POST',
		url: 'ajax/ajax_loaditem.php',
		data: { searchtext: searchVal, myitemsonly: true},
		dataType: 'json',
		success: function (data) {
				$("#loading-indicator").addClass("hidden");
				
				if(data.itemCount > 0)
				{
					var node = "<div class='item grid-sizer hidden'></div>";
					
					//Clean Up the current div
					$(".grid").html(node);
					
					for(var i = 0; i < data.itemCount; i++){
						node += "<div class='item grid-item'>";

						node += "<div class='item-header'>";
						node += "<h2>" + data.itemName[i] + "</h2>";
						node += "</div>";

						node += "<div class='row'>";

						node += "<div class='col-xs-5'>"; 
						node += "<div class='item-picture'>"; 
						node += "<img src='img/" + data.itemImageLocation[i] + ".jpg' alt='"+ i +"'>"; 
						node += "</div>"; 
						node += "</div>"; 

						node += "<div class='col-xs-7'>"; 
						node += "<div class='item-description'>";
						node += "<p>" + data.itemDescription[i] + "</p>";
						node += "<p class='item-price'>$"+ data.itemPrice[i] +"</p>";
						node += "</div>";

						node += "<div class='item-call-now'>";
						node += "<p>Call Now: (416)-887-2369</p>";
						node += "</div>";
						node += "</div>"; 

						node += "</div>";
						node += "</div>";		
					}
				
					$(".grid").html(node);
					
					//Initialize Isotope Library
					$('.grid').isotope({
						  itemSelector: '.grid-item',
						  masonry: {
							columnWidth: '.grid-sizer',
							isFitWidth: true
						  }
					});		
				}
				else
				{
					$('.grid').html("<div class='col-xs-12 label label-warning'>No Results Found</div>");
				}
			}
		});
	}
 
	(function(){
		$(document).on("change keydown", "#searchitem", function(){
			loadItems($(this).val());
		});
		
		$(document).ready(function(){	
			loadItems("");
		});
	})();
 </script>
