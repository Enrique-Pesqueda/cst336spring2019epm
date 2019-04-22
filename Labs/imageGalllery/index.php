<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    
    <div id = "pictures"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
        $(function() {
            var priceOfProduct;
            $.ajax({
                type: "GET",
                url: "api/pixa.php",
                dataType: "json",
                success: function(data, status) {
                    for(var i= 0; i<data.hits.length; i++){
                        $("#pictures").append("'<img id='theImg' src='"+data.hits[i]["largeImageURL"]+"'/>'");
                    }
                    
                }
            });// end of getProduct
        });
        
    </script>

    </body>
</html>