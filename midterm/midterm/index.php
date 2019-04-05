<!DOCTYPE html>
<html>
	<head>
		<title> Cinder</title>
		

		
		<style>
		    body{
		        text-align:center;
		    }
		    #content{
				display:flex;
		    }
		</style>
	</head>
	<script>
		
	</script>
	
	<body>

  
		<div class="navigator">
			<a href="index.php">Match</a> | <a href="history.php">History</a>
		</div>
		<div class="jumbotron">
			<h1>Match</h1>
		</div>
		
		<div id = "content">
			<div id = "profilePic"></div>
			<div id = "description"></div>
		</div>
		
		
		<div id = "interact">
			<button id = "dislike"><img src="pic_trulli.jpg" alt="dislike"> dislike</button> 
			<button id = "question"><img src="pic_trulli.jpg" alt="?"> questionmark</button> 
			<button id = "like"><img src="pic_trulli.jpg" alt="like"> like</button> 
		</div>
		<a href="rubric.php">Rubric</a>
		
		
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
    var total = 0;
    $(function() {
        $.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data, status) {
            	console.log(data);  
            	var randomValue = Math.floor(Math.random(0,data.length) * data.length);
            	// console.log(data[randomValue]['picture_url']);
            	$("#profilePic").html("<img src= '" + data[randomValue]['picture_url'] + "' alt = 'profile picture'>");
            	$("#description").html("<p>" + data[randomValue]["about_me"] + "</p>");
            	
            }
        });
        $("button").on("click", function(){
			console.log("button clicked")	
			$.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data, status) {
            	console.log(data);  
            	var randomValue = Math.floor(Math.random(0,data.length) * data.length);
            	// console.log(data[randomValue]['picture_url']);
            	$("#profilePic").html("<img src= '" + data[randomValue]['picture_url'] + "' alt = 'profile picture'>");
            	$("#description").html("<p>" + data[randomValue]["about_me"] + "</p>");
            	
            }
        });
    	});
        
    });
    

   
    
    

    </script>
	</body>
</html>

