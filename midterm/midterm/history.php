<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			table{
				border: 1px solid black;
				width:60%;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			body{
		        text-align:center;
		    }
		</style>
	</head>
	<body>
		<div class="navigator">
			<a href="index.php">Match</a> | <a href="history.php">History</a>
		</div>
		<div class="jumbotron">
			<h1>History</h1>
		</div>
		
		<table>
				<tr>
				
					<th>Username</th>
					<th>Status</th>
					<th>When</th>
					<th></th>
	
				</tr>
				<tr>
					<div id = "name"></div>
					<div id = "status"></div>
					<div id = "when"></div>
					<td></div><a href="history.html">Details</a></td>
				</tr>

				   
			</table>
	
		
			<a href="rubric.php">Rubric</a>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
    $(function() {
    	var names = [];
    	$.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data, status) {
            	console.log(data);
            	data.forEach(function(key){
            		console.log(key["username"]);
            		names.push(key["username"]);
            		$("#name").append("<td>" + key["username"] + "</td>");
            		$.ajax({
	            		type: "GET",
	            		url: "api/getMatch.php",
	            		dataType: "json",
	            		success: function(data, status) {
	            			data.forEach(function(key){
	            				$("#status").append("<td>" + key["answer_type_id"] + "</td>");
	            				$("#when").append("<td>" + key["answer_timestamp"] + "</td>");
	            			});
	            		}
	            		
                	});	
            		
                });
            	
            }
        });
            	
    });
        
        
    

    </script>
	</body>
	
</html>