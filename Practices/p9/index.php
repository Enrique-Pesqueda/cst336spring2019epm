<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Exam</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

<script>


    $(document).ready(function(){
    
        
        $("#submit").click( function(){ 
                var points = 0;
                var one = document.querySelector('input[name="one"]:checked').value;
                var two = document.querySelector('input[name="two"]:checked').value;
                
                if(one =="otter"){
                    points = points+5;
                }
                if(two == "1994"){
                     points = points+5;
                }

                $.ajax({
                    type: "get",
                    url: "api/checkAnswer.php",
                    dataType: "json",
                    data: { 

                         
                        },
                    success: function(data,status) {
                      
                       
                      },
                      complete: function(data,status) { //optional, used for debugging purposes
                          //alert(status);
                      }
                  });//AJAX  
               
        });
      
    });
    
</script>

        <style>
            body{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <br>
        <br>
        
       <h1>Quiz </h1> 
        Email: <input type="text" id="email" name="email" ><br><br>

        What is the mascot for CSUMB?<br>
         <input type="radio" name="one" value="otter"> Otter<br>
         <input type="radio" name="one" value="dog"> Dog<br>
         <input type="radio" name="one" value="seal"> Seal<br>
         
         
        When was CSUMB Founded?<br>
         <input type="radio" name="two" value="1994"> 1994<br>
         <input type="radio" name="two" value="2000"> 2000<br>
         <input type="radio" name="two" value="1990"> 1990<br>


        <button id="submit"> Submit</button>

        
        
        </br>
        Previous Score<div id="preScore"></div>
        Times Taken:<div id="taken">
        
       
    </body>
</html>