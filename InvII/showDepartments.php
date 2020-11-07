<!DOCTYPE html>
<html lang="esp">
    <head>
    <script>
      var baseurl = "http://localhost:5000";
      function loadDeparments(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET",baseurl + "/deparments",true);
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState ===4 && xmlhttp.status ===200){
            var persons = JSON.parse(xmlhttp.responseText);
            var tbltop = `<table>
			    <tr><th>Deparment ID</th><th>Deparment Name</th>`;
            //main table content we fill from data from the rest call
            var main ="";
            for (i = 0; i < persons.length; i++){
              main += "<tr><td>"+persons[i].idDeparment+"</td><td>"+persons[i].deparmentName;
            }
            var tblbottom = "</table>";
            var tbl = tbltop + main + tblbottom;
            document.getElementById("personinfo").innerHTML = tbl;
          }
        };
        xmlhttp.send();
      }
      window.onload = function(){
        loadDeparments();
      }

    </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

    </head>
        <body>
            <div id='Contenido'>
                <header>
                   <hgroup>
                       <h1>ATD32 system</h1>
                   </hgroup> 
                </header>
                <!-- Sidebar -->
                <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
                  <h3 class="w3-bar-item">Options</h3>
                  <a href="index.php" class="w3-bar-item w3-button">Home</a>
                  <a href="showWorkers.php" class="w3-bar-item w3-button">Show Workers</a>
                  <a href="insertWorkers.php" class="w3-bar-item w3-button">Insert Workers</a>
                  <a href="insertDeparments.php" class="w3-bar-item w3-button">Insert Deparments</a>
                  
                  <a href="#" class="w3-bar-item w3-button">Developers</a>
                </div>

                <!-- Page Content -->
                <div style="margin-left:25%">

                <div class="w3-container w3-teal">
                  <h1>All Deparments in the Company</h1>
                   
                </div>
                <div id="personinfo"> </div>

            </div>
        
        </body>

</html>
