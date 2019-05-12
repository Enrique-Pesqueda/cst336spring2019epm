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
  <meta name="google-signin-client_id" content="771332740040-kknuvrsu53rbuegmr8qjjfbfrdfe1fh9.apps.googleusercontent.com">

</head>
<body>

<header>
    <form class="navigationBar">
      <div id = "logo">
          <h3 style = "color:white;">Invitation Link</h3>
      </div>
      <input type="text" placeholder="Enter something dawg" name="search" id = "searchQ">
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



<table id  = "rubric">
<thead>
<tr>
<th style="text-align:left">#</th>
<th style="text-align:left">Task Description</th>
<th style="text-align:left">Points</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left">1</td>
<td style="text-align:left; background-color:green">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">2</td>
<td style="text-align:left; background-color:green">Tables in MySQL match the ERD and support the requirements of the application</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">3</td>
<td style="text-align:left; background-color:green">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">4</td>
<td style="text-align:left; background-color:red">Available times with dates in the past do not show up in the Dashboard list</td>
<td style="text-align:left">5</td>
</tr>
<tr>
<td style="text-align:left">5</td>
<td style="text-align:left; background-color:green">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">6</td>
<td style="text-align:left; background-color:green">A user can remove an available time slot from MySQL using the API endpoint</td>
<td style="text-align:left">15</td>
</tr>
<tr>
<td style="text-align:left">7</td>
<td style="text-align:left; background-color:green">The user confirms the removal using the specified modal design</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">TOTAL</td>
<td style="text-align:left">100</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left; background-color:green">This rubric is properly included AND UPDATED (BONUS)</td>
<td style="text-align:left">2</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:red">Login works with a User table and BCrypt</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:green">Add Google Signin for app login</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:green">The app is deployed to Heroku</td>
<td style="text-align:left">15</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:red">A banner file can be uploaded and displayed</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:red">The user can add multiple available time slots as specified</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:red">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left; background-color:red">You correctly implement booking of the appointement, including all side effects</td>
<td style="text-align:left">30</td>
</tr>
</tbody>
</table>



</body>
<div class="g-signin2" style = "visibility:hidden;"></div>
</html>

