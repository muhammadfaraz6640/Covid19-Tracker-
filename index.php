<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>   
    <title>Covid-19 Tracker</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1 text-center text-success" >Covid-19 <span class="text-danger">Tracker</span></span>    
    <input type="text" id="search"  placeholder="Search By Country Name">
    <input type="submit" name="" id="search-button">
</nav>
<h1 class="text-center">Global Covid News</h1>
<header>
<div class="container">
        <div class="abc row">
            <div class="coll">            
                <img src="Images/Bcat.png" width="100" height="60" alt="">            
                <p id="counter1" class="count"></p>
                <p class="counter-text">Confirmed Global Cases</p>
            </div>
            <div class="coll">            
                <img src="Images/tution.png" width="100" height="60" alt="">            
                <p id="counter2" class="count"></p>
                <p class="counter-text">Total Global Deaths</p>
            </div>
            <div class="coll">            
                <img src="Images/future.png" width="100" height="60" alt="">            
                <p id="counter3" class="count"></p>
                <p class="counter-text">Total Global Recovered</p>
            </div>
            <div class="coll">            
                <img src="Images/online.png" width="100" height="60" alt="">            
                <p id="counter4" class="count"></p>
                <p class="counter-text">New Confirmed Cases Global</p>
            </div>
    </div>
    </div>    
</header>
<h1 class="text-center">Countries wise Covid News</h1>
<table class="table" width="60%" border="1px" cellspacing="0" cellpadding="2px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Country</th>
      <th scope="col">New Confirmed</th>
      <th scope="col">New Deaths</th>
      <th scope="col">New Recovered</th>
      <th scope="col">Total Confirmed</th>
      <th scope="col">Total Deaths</th>
      <th scope="col">Total Recovered</th>
    </tr>
  </thead>
  <tbody id="country-data">
  
  </tbody>
</table>

<script type="text/javascript">     
    $.ajax({
        url : "https://api.covid19api.com/summary",
        type : "GET",
        dataType : "JSON",
        success : function(data){
            var c1 = data.Global.TotalConfirmed;
            document.getElementById('counter1').innerHTML = c1;
            document.getElementById("counter1").style.color = "pink";
            var c2 = data.Global.TotalDeaths;
            document.getElementById('counter2').innerHTML = c2;
            document.getElementById("counter2").style.color = "pink";
            var c3 = data.Global.TotalRecovered;
            document.getElementById('counter3').innerHTML = c3;
            document.getElementById("counter3").style.color = "pink";
            var c4 = data.Global.NewConfirmed;
            document.getElementById('counter4').innerHTML = c4;
            document.getElementById("counter4").style.color = "pink";            
            var sno = 1;
            $.each(data.Countries, function(key , value){
                $("#country-data").append("<tr>"+
                                        "<td>" + sno + "</td>" +
                                        "<td>" + value.Country + "</td>" +
                                        "<td>" + value.NewConfirmed + "</td>" +
                                        "<td>" + value.NewDeaths + "</td>" +
                                        "<td>" + value.NewRecovered + "</td>" +
                                        "<td>" + value.TotalConfirmed + "</td>" +
                                        "<td>" + value.TotalDeaths + "</td>" +
                                        "<td>" + value.TotalRecovered + "</td>" +
                                        "</tr>");
                                        sno++;
            });           
            $("#search-button").on("click",function(e){  
                e.preventDefault();            
                var Searched_Item = document.getElementById("search").value;
                
                
        });
        }
    });
</script>    
</body>
</html>
