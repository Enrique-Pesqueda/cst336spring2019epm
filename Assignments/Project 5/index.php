<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#outer_wrapper {  
    overflow: scroll;  
    width:100%;
}
#outer_wrapper #inner_wrapper {
    display: flex;
}
#outer_wrapper #inner_wrapper div.box {
    float: left;
    padding:1px;
}
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}


/* Style the images inside the grid */
.box img {
  opacity: 0.8; 
  cursor: pointer; 
}

.box img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <!--<span class="close">&times;</span>-->
    <center>
    <p>Session will begin once you've entered your email</p>
    <p>OR login as Guess</p>
    Email: <input type = "text" id = "modalEmail">
    <button id = "go">GO!</button>
    <button id = "guess">Guess</button>
    </center>
  </div>

</div>
<div style="text-align:center">
    
    <br>
    <form id = "myOnlyForm" action = "api/upload.php" method = "POST" enctype = "multipart/form-data">
        <h2>Hello<div id = "email" name = "email"></div></h2>
        <input type = "file" name ="file">
        Caption: <input type = "text" name ="caption">
        <button name = "submit">UPLOAD</button>
    </form>
    <br>
</div>



<div id="outer_wrapper">
    <div id="inner_wrapper">
        
        <?php
        /**
         * username = b127922bd30d7f
         * password = 46ddc3fa
         * host = us-cdbr-iron-east-03.cleardb.net
         * data base name = heroku_4601ed3b57afd10
         * 
         */

        $db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b127922bd30d7f","46ddc3fa","heroku_4601ed3b57afd10"); //keep your db name
        $sql = "SELECT * from data_4";
        $sth = $db->query($sql);
        while($result=mysqli_fetch_array($sth)){
            echo '
                <div class="box">
                    <img style="width:300px; height:150px;"src="data:image/jpeg;base64,'.base64_encode( $result['media'] ).'" onclick="myFunction(this);"/>
                </div>
            ';    
        }
    ?>
    </div>
</div>

    
    



<div class="container">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">

var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
modal.style.display = "block";

$("#go").on("click",function() {
  function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else{
            return false;
        }
    
    }
    var sEmail = $('#modalEmail').val();
    
    if ($.trim(sEmail).length == 0) {
        alert('Please enter valid email address');
    }
    else if (!validateEmail(sEmail)) {
        alert('Invalid Email Address');
        e.preventDefault();
    }
    else if(validateEmail(sEmail)){
        modal.style.display = "none";
        $("#email").html(sEmail);
        e.preventDefault();
    }
    
    
});
$("#guess").on("click",function() {
    var form = document.getElementById("myOnlyForm");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].disabled = true;
    }
    
    modal.style.display = "none";
});

function myFunction(imgs,email,caption,timestamp) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  expandImg.parentElement.style.display = "block";
  console.log(email);
  console.log(caption);
  console.log(timestamp);
  
}
</script>

</body>
</html>
