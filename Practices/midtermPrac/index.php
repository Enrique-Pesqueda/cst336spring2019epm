<html>
<head>
    <title>Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
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
            <td><input type="number" id = "quantity"></td>
            <td><div id = "priceTotal"></div></td>
        </tr>
    
       <tr>
            <td>Shipping</td>
            <td></td>
            <td></td>
            <td id="shippingTotal"></td>
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
    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        

       

        $.ajax({
            type: "GET",
            url: "api/getProduct.php",
            dataType: "json",
            success: function(data,status) {
                console.log(data);
                $("#product").html(data['productName']);
                $("#productPrice").html(data['productPrice']);
                
                    
            },
            complete: function(data, status) {
                console.log(data);
            }
                
        });
        $("#quantity").change( function(e){
            var totalPrice = parseFloat($("#productPrice").html() * $(this).val());
            $("#priceTotal").html(totalPrice);
            $("#shippingTotal").html("5.99")
            $("#tax").html(totalPrice * 0.10);
            
            
        });
        
        

        
        // $("button#calculate").on("click",function(e) {
        //     if($("#shipping").val() == "0"){
        //           $("#shippingChose").html("A shipping option must be selected").css("color", "red"); 
        //     }
            
            
        //     total = 0;
        //     towelAmt = $("#towel").val();
            
        //     total += (towelAmt * 30);
        //     console.log(total);
            
        //     $("#towelTotal").html("$" + (towelAmt * 30));
            
        //     flipsAmt = $("#flips").val();
            
        //     total += (flipsAmt * 20);
        //     console.log(total);
            
        //     $("#flipsTotal").html("$" + flipsAmt * 20);

        //     sunScreenAmt = $("#sunscreen").val();
            
        //     total += (sunScreenAmt * 10);
        //     console.log(total);
            
        //     $("#ssTotal").html("$" + sunScreenAmt * 10);

            
            
        //     if($("#shipping").val() == "1"){
        //         $("#shippingTotal").html("$15");
        //         shippingAmt = 15;
        //     }
        //     if($("#shipping").val() == "2"){
        //         $("#shippingTotal").html("$10");
        //         shippingAmt = 10;
        //     }
        //     if($("#shipping").val() == "3"){
        //         $("#shippingTotal").html("$5");
        //         shippingAmt = 5;
        //     }
        //     tax = total * 0.1;
            
        //     $("#subtotal").html("$" + (shippingAmt + total));
        //     $("#tax").html("$" + (tax));
        //     total += tax + (shippingAmt + total);
        //     $("#total").html("$" + (total));
            
        // });
        //  $("button#confirm").on("click",function(e) {
        //      if($("#shipping").val() == "0"){
        //           console.log("asdfa");
        //           $("#shippingChose").html("A shipping option must be selected").css("color", "red"); 
        //     }
        //      if(!$("checkBox").prop('checked')){
        //         $("#thanks").html("Thanks for your purchase").css("color", "green");
                
        //      }
        //      else{
        //         $("#accept").css("color","red"); 
        //      }
        //  });
        
    </script>

</body>



</html>