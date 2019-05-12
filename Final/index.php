<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="js/dashboard.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <!--google sign in-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="771332740040-qi086mo1v2le0en46h0ot5v1es8t7u19.apps.googleusercontent.com">
  
</head>
<body>

<header>
    <form class="navigationBar">
      <div id = "logo">
          <h3 style = "color:white;">Invitation Link</h3>
      </div>
      <input type="text" placeholder="Enter something fawg" name="search" id = "searchQ">
      <button type="button" id ="searchButton"><i class="fas fa-copy"></i></button>
      
      <a href="login.php" onclick="signOut()">Sign Out</a>
      
    </form>

</header>
<div class = "space">.</div>
<center>
<div id = "dateSection">

    <table id = "dateTable">
      <tr>
        <th>Date</th>
        <th>Start Time</th> 
        <th>Duration</th>
        <th>Booked By</th>
        <th>Add Time Slots <button id = "addDates"><i class="fas fa-plus"></i></button></th>
      </tr>
    </table>
        
</div>
</center>
  

<div id="myModal" class="modal">
  <div class="modal-content">
      <h3>Add Time Slot</h3>
      </hr>
      <form id = "timeForm" >
        
        <p>Date <input type="date" id="datepicker"> <i class="far fa-calendar-alt"></i></p>
        <p>Start Time <input type="time" id="startPicker"> <i class="far fa-clock"></i></p>
        <p>End Time <input type="time" id="endPicker"> <i class="far fa-clock"></i></p>
        <div id = "errorText"></div>
        <button class = "cancelModal">Cancel</button> <button class = "okModal">Ok</button>
        
      </form>
      
  </div>
</div>

<div id = confirmModal class = "cModal">
  <div class = "cModal-content">
    <p>Start Time  <div class = "startTimeToShow"></div><i class="far fa-clock"></i></p>
    <p>End Time <div class = "endTimeToShow"></div> <i class="far fa-clock"></i></p>
    <h3>Are you sure you want to remove the time slot?</h3>
    <button class = "cancelConfirm">Cancel</button><button id = "okConfirm">yes</button>
    
  </div>
</div>







</body>
<div class="g-signin2" style = "visibility:hidden;"></div>
</html>

