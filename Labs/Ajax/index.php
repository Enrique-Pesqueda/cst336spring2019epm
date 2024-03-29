<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>AJAX: Sign Up Page</title>
  <!--<link href="css/styles.css" rel="stylesheet" type="text/css" />-->
</head>
<style>
  #dummybodyid{
    color:teal;
    background-color:yellow;
  }
  fieldset{
    text-align:center;
  }
  h1{
    text-align: center;
  }
  form{
    padding-left:35%;
    padding-right:35%;
  }
  #zipOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #cityOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #latOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #longOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #firstNameOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #lastNameOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #emailOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #phoneNumberOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #zipOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #cityOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #latOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #longOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #stateOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #countyOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #validUser:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #passwordOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #validPasswordOut:hover{
    color:black;
    text-decoration:underline;
    text-decoration-color:teal;
  }
  #check{
    width:90px;
    height:50px;
    border-radius: 10px;
  }
  
</style>
<body id="dummybodyid">
  <h1> Sign Up Form </h1>
  <form>
    <fieldset>
      <legend>Sign Up</legend>
      <div id = "firstNameOut"><label>First Name:</label><input id = "firstName" type="text"></div>
      <div id = "lastNameOut"><label>Last Name:</label><input id = "lastName" type="text"></div>
      <div id = "emailOut"><label>Email:</label><input id="email" type="text"></div>
      <div id = "phoneNumberOut"><label>Phone Number:</label><input id= "phoneNumber" type="text"></div>
      <div id = "zipOut"><label>Zip Code:</label><input id= "ZP" type="text" value= ""><div id="invalidZip"></div></div>
      <div id = "cityOut"><label>City:</label><div id= "showCity"></div></div>
      <div id = "latOut"><label>Latitude:</label> <div id= "lat"></div></div>
      <div id = "longOut"><label>Longitude:</label><div id= "long"></div></div>
      <div id = "stateOut"><label>State:</label><input id = "showState" type="text" value =""></div>
      <div id = "countyOut"><label>Select a County:</label><select id = "counties"><option id='displayCounty' value=''></option></select></div>
      <div id = "validUser"><label>Desired Username:</label><input id= "userName"type="text"><div id="invalid"></div></div>
      <div id = "passwordOut"><label>Password:</label><input id="userPassword" type="password"></div>
      <div id= "validPasswordOut"><label>Type Password Again:</label><input id = "userPassword2" type="password"><div id="invalidPassword"></div></div>
      <div><input id = "check" type="button" value="Sign up!"></div>
    </fieldset>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
    var userNames = [];
    
    $("#ZP").on("input",getZP);
    $("#showState").on("input", getCounties);
    
    $("#buttoncheck").on("click", function(){
      $("#invalid").html("")
      $("#invalidPassword").html("")
      var userNameInfo = document.getElementById('userName');
      alphaNum(userNameInfo);
      
    });
    
    function alphaNum(inputtext) {
      var passwordOne = $("#userPassword").val();
      var passwordTwo = $("#userPassword2").val();
      
      var alphaExp = /^[0-9a-zA-Z]+$/;
      if (inputtext.value.match(alphaExp)) {
        for(var i = 0; i< userNames.length; i++){
          if(userNames[i] == inputtext.value){
            if(inputtext.value == ""){
              $("#invalid").html("No username input!").css("color","red");
              return;
            }
            $("#invalid").html("Username already exists!").css("color","red");
            return;
          }
        }
        if(passwordOne != passwordTwo){
          $("#invalidPassword").html("Does not mach Password Entered above.").css("color","red");
          return;
        }
        if(passwordOne =="" && passwordTwo==""){
          $("#invalidPassword").html("No Password input").css("color","red");
          return;
        }
        userNames.splice(1,0,inputtext.value);
        document.getElementById("firstName").value = "";
        document.getElementById("lastName").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phoneNumber").value = "";
        document.getElementById("ZP").value = "";
        document.getElementById("lastName").value = "";
        $("#lat").html("");
        $("#long").html("");
        document.getElementById("showState").value = "";
        document.getElementById("showState").value = "";
        $('#counties option:not(:first)').remove();
        
        document.getElementById("userName").value = "";
        document.getElementById("userPassword").value = "";
        document.getElementById("userPassword2").value = "";
      }
      else {
        $("#invalid").html("Username already exists!").css("color","red");
      }
    }
    function getZP(){
        $.ajax({
          type: "GET",
          url:"http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
          dataType: "json",
          data:{
          "zip": $("#ZP").val()
          },
          
          success: function(data, status){
            if(data === false){
              $("#invalidZip").html("Zip code not found").css("color","red");
            }
            else{
            $("#invalidZip").html("");
            $("#lat").html(data["latitude"]);
            $("#long").html(data["longitude"]);
            $("#showCity").html(data["city"]);
            $("#showState").val(data['state']);
            getCounties();
            }
          }
      });
    }
      
      function getCounties(){
        $.ajax({
          type: "GET",
          url:"http://itcdland.csumb.edu/~milara/ajax/countyList.php",
          dataType: "json",
          data:{
          "state": $("#showState").val()
          },
          success: function(data, status){
            $('#counties option:not(:first)').remove();
            if(data === false){
              $("#display").val("State not found").css("color","red");
            }
            else{
              for(var i = 0; i < data.length; i++){
                $("#counties").append("<option>" + data[i]['county'] + "</option>");
              }
            }
          }
      });
    }
    
    
    
  </script>
  
  
</body>
</html>



