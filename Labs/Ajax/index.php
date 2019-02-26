
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>AJAX: Sign Up Page</title>

</head>
  <body id="dummybodyid">
  <h1> Sign Up Form </h1>
  <div id = "thing">
    <form>
      <fieldset>
        <legend>Sign Up</legend>
        <div><label>First Name:</label><input type="text"></div>
        <div><label>Last Name:</label><input type="text"></div>
        <div><label>Email:</label><input type="text"></div>
        <div><label>Phone Number:</label><input type="text"></div>
        <div><label>Zip Code:</label><input id = "ZP" type="number"></div>
        <div><label>City:</label></div>
        <div><label>Latitude:</label></div>
        <div><label>Longitude:</label></div>
        <div><label>State:</label><input type="text"></div>
        <div><label>Select a County:</label><select></select></div>
        <div><label>Desired Username:</label><input type="text"></div>
        <div><label>Password:</label><input type="password"></div>
        <div><label>Type Password Again:</label><input type="password"></div>
        <div><input type="button" id = "buttons" value="Sign up!"></div>
      </fieldset>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript">
  
  //   $("#ZP").change(getCountyList);
  // 	function getCounty() { 

  //     $.ajax({
  //         type: "get",
  //         url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
  //         dataType: "json",
  //         data: {
  //           // "starttime":$("#starttime").val()
  //           "zip":"93955"
  //         },
  //         success: function(data,status) {
  //           console.log("Success");
  //           // $('#earthquakeResult').html(data["metadata"].title + "<br>");
            
  //         },
  //         complete: function(data,status) { //optional, used for debugging purposes
  //           console.log("Failure");
  //           //console.log(status);
  //         }
  //     });
  //   }
  
  $("#ZP").change(getZipCode);
      function getZipCode() {
        
        console.log($("#ZP").val());
          $.ajax({
              type: "GET",
              url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
              dataType: "json",
              data: {
                  "zip": $("#ZP").val()
              },
              success: function(data, status) {
                  console.log("Success");
                  console.log(data);
              },
              complete: function(data, status) {
                  //console.log("Complete");

                  //console.log(data);
                  console.log(status);
              },
             // timeout: 2000,
              
               
          });
      }
 
 	</script>
</body>
</html>

