<html>
<head>
    <title>Shopping Cart</title>
   
    
</head>
    <style>
        body{
             text-align: center;
        }
        .checker{
            background-color: #59E83F;
            width:100px;
            height:50px;
            color:white;
            font-size:18px;
            border-radius:10px;
        }
        h1{
            width :100%;
            height:200px;
            background-color: #CFCFCE;
            
        }
        .block{
            display:inline-flex;
        }
        table, th, td {
          border: 1px solid black;
             border-collapse: collapse;
        }
        table{
            border: 1px solid black;
            width:60%;
        }
    

    </style>
    
<body>
    
    <h1> Spring Break Shopping  </h1>
    <center>
    <table>
        <tr>
            <th>Product</th>
            <th>Unit <br> Price</th>
            <th> Quantity </th>
            <th>Total</th>
        </tr>
        <tr>
            <td><div id = "product"></div></td>
            <td><div id = "productPrice"></div></td>
            <td><input type="number" id = "quantity" size="5"></td>
            <td><div id = "totalPrice"></div></td>
        </tr>
        <tr>
            <td>
                <select name = "category">
                    <option value = "">Select One</option>
                </select>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
       <tr>
            <td>Discount</td>
            <td></td>
            <td id = "discount"></td>
            <td id = "discountTotal"></td>
        </tr>    
            
        <tr>
            <td>Subtotal</td>
            <td></td>
            <td></td>
            <td id="subtotal"></td>
        </tr>             
            
        <tr>
            <td>Tax (10%)</td>
            <td></td>
            <td></td>
            <td id="tax"></td>
        </tr>
        
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td id="total"></td>
        </tr>
           
    </table>
    </center>
    
    <br/>
    <div id = "promoCodeOut"><label>Promo Code</label><input id="promoCode" type="text"></div>
    <div id = "expirationDate"></div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
    var total = 0;
    $(function() {
        var priceOfProduct;
        $.ajax({
            type: "GET",
            url: "api/getProduct.php",
            dataType: "json",
            success: function(data, status) {
                var randomValue = Math.floor(Math.random(0,data.length) * data.length);
                $("#product").html(data[randomValue]["productName"]);
                
                priceOfProduct = parseFloat(data[randomValue]["productPrice"]);
                $("#productPrice").html(data[randomValue]["productPrice"]);
                
                $("#totalPrice").html("$" + data[randomValue]["productPrice"]);
                data.forEach(function(key){
                             $("[name=category]").append("<option value=" + key["productId"] + ">" + key["productName"] + "</option>");
                });
            }
        });// end of getProduct
        // $.ajax({
        //     type: "GET",
        //     url: "api/getPromo.php",
        //     dataType: "json",
        //     success: function(data, status) {
        //         var randomValue = Math.floor(Math.random(0,data.length) * data.length);
        //         $("#promoCode").val(data[randomValue]["promoCode"]);
        //         $("#expirationDate").html("This will expire on " + data[randomValue]["expirationDate"]).css("color","red");
        //         $("#discount").html(data[randomValue]["discount"] + "%");
                
                
        //         //calculates total with discount
        //         console.log("calculated: " + parseFloat($("#productPrice").html()) * (parseInt(data[randomValue]["discount"])/100));
        //         console.log("product Price: " + priceOfProduct);
        //         console.log("product discount: " + (parseInt(data[randomValue]["discount"])/100));
        //         $("#discountTotal").html(priceOfProduct * (parseInt(data[randomValue]["discount"])/100));
                
        //         $("#subtotal").html("$" + parseInt($("#discountTotal").html()));
                
                
        //     }
        // });// end of getDiscount
        
    });
    
    //updates value in total price DIV
    $("#quantity").change(function(){
        $("#totalPrice").html("$" + parseFloat($("#productPrice").html()) * $(this).val());
    });
    $("#promoCode").change(function(){
       $.ajax({
           type: "GET",
           url: "api/getPromo.php",
           dataType: "json",
           data: {
               "promoCode": $("[name=promoCode]").val()
           },
            success: function(data,success){
                console.log(data);
                data.forEach(function(key){
                        if(key["promoCode"] === $("#promoCode").val()){
                            
                            console.log("FOUND");
                            console.log(key["expirationDate"]);
                            $("#expirationDate").html("This will expire on " + key["expirationDate"]);
                            return false;
                        }
                        else{
                            $("#expirationDate").html("This is not a promo code").css("color","red");
                        }
                             
                });
                    
               
           }
                        
       });  
    });
    
    
    

    </script>

</body>



</html>