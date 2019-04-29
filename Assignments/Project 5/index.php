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
</style>
</head>
<body>

<div style="text-align:center">
    <h2>UPLOAD FILES Dawg</h2>
    <br>
    <form action = "api/upload.php" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name ="file">
        <input type = "text" name ="caption">
        <input type = "text" name ="email">
        <button name = "submit" type = "submit">UPLOAD</button>
    </form>
    <br>
</div>






<div id="outer_wrapper">
    <div id="inner_wrapper">
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
        <div class="box">
            <img src="http://placehold.it/300x150" onclick="myFunction(this);"/>
        </div>
    </div>
</div>


<div class="container">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
</div>

<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  expandImg.parentElement.style.display = "block";
}
</script>

</body>
</html>
