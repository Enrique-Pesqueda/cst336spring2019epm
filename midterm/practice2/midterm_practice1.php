<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        
        <style>
        
        </style>
    </head>
    <body>
<table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
        <tr style="background-color:#FFC0C0">
            <td>1</td>
            <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
            <td width="20" align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>2</td>
            <td>Errors are displayed if month or number of locations are not submitted.</td>
            <td width="20" align="center">5</td>
        </tr> 
        <tr style="background-color:#FFC0C0">
            <td>3</td>
            <td>Header and Subheader are displayed with info submitted. </td>
            <td align="center">5</td>
        </tr>    
    	<tr style="background-color:#FFC0C0">
            <td>4</td>
            <td>A table with days and weeks is displayed when submitting the form</td>
            <td align="center">5</td>
        </tr> 
        <tr style="background-color:#FFC0C0">
            <td>5</td>
            <td>The number of days in the table correspond to the month selected</td>
            <td align="center">10</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>6</td>
            <td>Random images are displayed in random days</td>
            <td align="center">5</td>
        </tr>       
        <tr style="background-color:#FFC0C0">
            <td>7</td>
            <td>The number of random images correspond to the number of locations and country submitted</td>
            <td align="center">10</td>
        </tr>  
        <tr style="background-color:#FFC0C0">
            <td>8</td>
            <td>The proper name of the location is displayed below the image 
          		(e.g. "New York", "Las Vegas")</td>
            <td align="center">10</td>
        </tr>  
        <tr style="background-color:#FFC0C0">
            <td>9</td>
            <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
            <td align="center">15</td>
        </tr>    
        <tr style="background-color:#FFC0C0">
            <td>10</td>
            <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
            <td align="center">15</td>
        </tr>        
        <tr style="background-color:#FFC0C0">
            <td>11</td>
            <td>The web page uses Bootstrap and has a nice look. </td>
            <td align="center">5</td>
        </tr>
        <tr>
            <td></td>
            <td>T O T A L </td>
            <td width="20" align="center"><b></b></td>
        </tr> 
    </tbody>
  </table>
  
        <div class="jumbotron">
            <h1> Winter Vacation Planner ! </h1>
        </div>
        <div id="wrapper">
            <form>
                Select Month: 
                    <select name = "months">
                        <option value = "">Select One</option>
                        <option value = "Nov">November</option>
                        <option value = "Dec">December</option>
                        <option value = "Jan">January</option>
                        <option value = "Feb">Febuary</option>
                    </select>
                <br/>
                
                Number of Locations: 
                
                    <input type = "radio" name = "orderBy" value = "three"/>Three
                    <input type = "radio" name = "orderBy" value = "four"/>Four
                    <input type = "radio" name = "orderBy" value = "five"/>Five
                
                <br/>
                Select Country: 
                    <select name = "country">
                        <option value = "USA">USA</option>
                        <option value = "MEX">Mexico</option>
                        <option value = "FRA">France</option>
                    </select>
                <br/>
                <br/>
            </form>
        </div>

        
    </body>
</html>

