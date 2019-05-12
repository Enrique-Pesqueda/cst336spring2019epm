var span;
var modal;
var modal2;
$(function() {
    
    showTimeSlots();
    $.ajax({
        url: "API/addUser.php",
        type: "POST",
        data: {
            "userName": localStorage.userName,
            "userId" : localStorage.userId
        },
        dataType: "json",
        success: function(data, status) {
            console.log("success");
        },
        complete: function(data, status) {
            console.log(data)
        }
    });
    
    
    
    $("#addDates").on("click",function(){
        modal = document.getElementById('myModal');
        span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        
    });
    $(".startPicker").timepicker();
    $(".endPicker").timepicker();
    
    $(".okModal").on("click",function(){
        
        var date = $("#datepicker").val();
        var d = new Date(date);
        date = d.getMonth()+1 + "/"  + (d.getDate()+1) + "/" + d.getFullYear();
        
        var timeEnd = $("#endPicker").val();
        var timeStart = $("#startPicker").val();
        
        var hourDifference = parseTime(timeEnd)["hh"] - parseTime(timeStart)["hh"];
        var minDifference = (parseTime(timeEnd)["mm"] - parseTime(timeStart)["mm"]) + 60;
        var dType = " hour";
        var tType = " AM";
        var duration = hourDifference;
        var startTimeToSend = parseTime(timeStart)["hh"];
        
        
        
        if(date.length != 0 || timeEnd.length != 0 || timeStart.length != 0){
            if(hourDifference <= 1 && minDifference <= 60 && (parseTime(timeEnd)["mm"] - parseTime(timeStart)["mm"]) != 0){
                duration = minDifference;
                dType = " min"
            }
            if(parseTime(timeStart)["hh"] > 12){
                startTimeToSend = parseTime(timeStart)["hh"] - 12;
                tType = " PM";
            }
            
            duration = duration + dType;
            startTimeToSend = startTimeToSend + tType;

            $.ajax({
                url: "API/sendTimes.php",
                type: "POST",
                data: {
                    "date": date,
                    "sTime" : startTimeToSend,
                    "duration": duration,
                    "userId" : localStorage.userId
                },
                dataType: "json",
                success: function(data, status) {
                    console.log("success");
                },
                complete: function(data, status) {
                    console.log(data)
                }
            });
            
            
        }
        else{
            $("#errorText").innerHTML = "Fill in all fields!"
            $("#errorText").css("color","red");
            console.log("error");
        }
        
    });
    
    
    $(".cancelModal").on("click",function() {
       modal.style.display = "none"; 
    });
    $(".cancelConfirm").on("click", function() {
        modal2.style.display = "none"; 
    })
    
    // $("#timeForm").submit(function(e){
    //     e.preventDefault();
    // });
     
});
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
}
function parseTime(s) {
    var part = s.match(/(\d+):(\d+)(?: )?(am|pm)?/i);
    var hh = parseInt(part[1], 10);
    var mm = parseInt(part[2], 10);
    var ap = part[3] ? part[3].toUpperCase() : null;
    if (ap === "AM") {
        if (hh == 12) {
            hh = 0;
        }
    }
    if (ap === "PM") {
        if (hh != 12) {
            hh += 12;
        }
    }
    return { hh: hh, mm: mm };
}
function showTimeSlots(){
    $.ajax({
        url: "API/getTimes.php",
        type: "POST",
        data: {
            "userId" : localStorage.userId
        },
        dataType: "json",
        success: function(data, status) {
            for(var i = 0; i < data.length; i++){
                
                $("#dateTable").append(
                    "<tr>" 
                        + 
                        "<td id = 'date"+i+"'><center>"
                            +
                            data[i]["date"]
                            +
                        "</center></td>"
                        +
                        "<td id = 'sTime"+i+"'><center>"
                            +
                            data[i]["start_time"]
                            +
                        "</center></td>"
                        +
                        "<td id = 'duration"+i+"'><center>"
                            +
                            data[i]["duration"]
                            +
                        "</center></td>"
                        +
                        "<td><center>"
                            +
                            "Not Booked"
                            +
                        "</center></td>"
                        +
                        "<td><center>"
                            +
                            "<button class = 'details'>Details</button> <button class = deleteButton onclick = 'removeFromDB("+i+")'>Delete</button>"
                            +
                        "</center></td>"
                        +
                    "</tr>"
                )
            }
            
            
        },
        complete: function(data, status) {
            console.log(data)
        }
    });   
    
}
function removeFromDB(number){
    var dateId = "date" + number;
    var startId = "sTime" + number;
    var durationId = "duration" + number;
    
    var dateVal = document.getElementById(dateId).innerText;
    var startVal = document.getElementById(startId).innerText;
    var durationVal = document.getElementById(durationId).innerText;
    
    console.log(dateVal);
    console.log(startVal);
    console.log(durationVal);
    
    modal2 = document.getElementById('confirmModal');
    var span = document.getElementsByClassName("close")[0];
    modal2.style.display = "block";
    
        
    
    $(".startTimeToShow").append(dateVal + " " + startVal)
    $(".endTimeToShow").append(dateVal + " " + (Number(getNum(startVal)) + Number(getNum(durationVal))) + getAMPM(startVal));
    
    document.getElementById('okConfirm').onclick = function() {
        $.ajax({
            url: "API/removeTimes.php",
            type: "POST",
            data: {
                "date": dateVal,
                "sTime" : startVal,
                "duration": durationVal,
                "userId" : localStorage.userId  
            },
            dataType: "json",
            success: function(data, status) {
                console.log("success");
            },
            complete: function(data, status) {
                console.log(data)
            }
        });
        window.location.reload();
    };
    
    
    
}
function getNum(duration){
    var i = 0;
    while(duration[i] != ' '){
        i++;
    }
    
    var toReturn = duration.substring(0,i);
    
    return toReturn;
}
function getAMPM(someTime){
    var i = 0;
    while(someTime[i] != ' '){
        i++;
    }
    
    var toReturn = someTime.substring(i);
    
    return toReturn;
}