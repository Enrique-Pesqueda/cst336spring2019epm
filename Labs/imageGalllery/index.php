<!DOCTYPE html>
<html>
    <head>
        <title> Finstagram </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body {
              font-family: Arial;
            }
            
            * {
              box-sizing: border-box;
            }
            
            form.example input[type=text] {
              padding: 10px;
              font-size: 17px;
              border: 1px solid grey;
              float: left;
              width: 40%;
              background: #f1f1f1;
            }
            
            form.example button {
              float: left;
              width: 20%;
              padding: 10px;
              background: #2196F3;
              color: white;
              font-size: 17px;
              border: 1px solid grey;
              border-left: none;
              cursor: pointer;
            }
            
            form.example button:hover {
              background: #0b7dda;
            }
            
            #theImg0,#theImg1,#theImg2,#theImg3,#theImg4,#theImg5,#theImg6,#theImg7,#theImg8{
                width:100%; 
                height:40%;
            }
            
            #img0,#img1,#img2,#img3,#img4,#img5,#img6,#img7,#img8{
                width:30px;
                height:30px;
            }
            
        </style>
        
    </head>
    <body>
        <div id = "banner">
            <img id = "finsta" src = "img/fortniteBanner.png"/>
        </div>
        
        <form class="example">
            <input type="text" placeholder="Search.." name="search" id = "searchQ">
            <div class = "tab">
                <button type = "button" id="faveTab" >Favorites</button>
                <button type = "button" id="randTab" >Random</button>
            </div>
            <button type="button" id ="searchButton"><i class="fa fa-search"></i></button>
        </form>
        </br>
        </br>
        <div id = "picSection">
            <center><table id = "pictures"></table></center>
        </div>
        <!--<div id = "words"></div>-->


        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            $.ajax({
                type:"GET" ,
                url: "api/pixa.php",
                dataType: "json",
                data:{
                    "search": $("#searchExample").val()
                },
                success:function(data, status){
                    var links = [];
                    for(var i= 0; i < data.hits.length; i++){
                        links.push(data.hits[i]["largeImageURL"]);
                        if(i%3 === 0){
                            $("#pictures").append("<tr>");
                        }
                        console.log(data.hits[i]["largeImageURL"]);
                        $("#pictures").append("<td> <img id='theImg"+i+"' src="+data.hits[i]["largeImageURL"]+"/><br><center><button class ='heart' type='button' onclick = changeHeart('"+i+"','"+links+"','"+ $("#searchExample").val()+"')><img id='img"+i+"' src = 'img/notFave.png'/></button></center></td>");
                        if(i%3 === 0){
                            $("#pictures").append("</tr>");
                        }
                        
                    } 
                }
            });
            $(function() {
                $("#searchButton").on("click",function(){
                    $.ajax({
                        type:"GET" ,
                        url: "api/pixa.php",
                        dataType: "json",
                        data:{
                            "search": $("#searchExample").val()
                        },
                        success:function(data, status){
                            $("#pictures td").html("");
                            var links = [];
                            for(var i= 0; i < data.hits.length; i++){
                                links.push(data.hits[i]["largeImageURL"]);
                                if(i%3 === 0){
                                    $("#pictures").append("<tr>");
                                }
                                $("#pictures").append("<td> <img id='theImg"+i+"' src="+data.hits[i]["largeImageURL"]+"/><br><center><button class ='heart' type='button' onclick = changeHeart('"+i+"','"+links+"','"+ $("#searchExample").val()+"')><img id='img"+i+"' src = 'img/notFave.png'/></button></center></td>");
                                if(i%3 === 0){
                                    $("#pictures").append("</tr>");
                                }
                                
                            } 
                            
                        }
                    });
                        
                });
                // $("#faveTab").on("click",function(){
                //     $.ajax({
                //         type: "GET",
                //         url: "getQWord.php",
                //         dataType: "json",
                //         success: function(data, status) {
                //             // console.log(data);
                                    
                //             //clear old keys
                //             $('#words').html("");
                //             var str = "";
                //             for (var i = 0; i < data.length; i++) str += "<button class='keywordResultButton' value='" + data[i]['imgkey'] + "'>" + data[i]['imgkey'] + "</button><br>";
                //             //display keywords
                //             $('#words').html(str);
                //         },
                //         error: function (error) {
                //             console.log(error);
                //             $('#error').html("");
                //             $('#error').html(error['responseText']);
                //         },
                //         complete: function() {
                //             //console.log(arguments);
                //         },
                //     });
                // });
                
            });
            function changeHeart(i,plinks, imageQ){                    
                if(imageQ == undefined)
                    imageQ = "homepage";
                if($("#img" + i).attr("src") == "img/fave.png"){
                    $("#img" + i).attr("src","img/notFave.png");    
                    //remove plinks from data base
                    $.ajax({
                        type:"POST" ,
                        url: "addRemoveShow.php",
                        dataType: "json",
                        data:{
                            'searchKey': imageQ,
                            'operation': 'delete',
                            'link': plinks
                        },
                        success:function(data, status){
                             console.log(data);
                        }
                    });
                    
                }
                else if($("#img" + i).attr("src") == "img/notFave.png"){
                    $("#img" + i).attr("src","img/fave.png");    
                    //add plinks to data base
                    $.ajax({
                        type:"POST" ,
                        url: "addRemoveShow.php",
                        dataType: "json",
                        data:{
                            'searchKey': imageQ,
                            'link': plinks,
                            "operation": "insert"
                        },
                        success:function(data, status){
                             console.log(data);
                        }
                    });
                }
                
                
            }
            
        </script>

    </body>
</html>