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
            var sel = document.getElementById('Combox');
            //main table content we fill from data from the rest cal
            for (i = 0; i < persons.length; i++){
                var opt = document.createElement('option'); 
                opt.appendChild( document.createTextNode(persons[i].deparmentName) );
                opt.value = 'option value';
                sel.appendChild(opt); 
            }
            
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
                  <a href="showDepartments.php" class="w3-bar-item w3-button">Show Departments</a>
                  <a href="showWorkers.php" class="w3-bar-item w3-button">Show Workers</a>
                  <a href="insertWorkers.php" class="w3-bar-item w3-button">Insert Workers</a>
                  <a href="insertDeparments.php" class="w3-bar-item w3-button">Insert Deparments</a>
                  <a href="editDeparment.php" class="w3-bar-item w3-button">Edit Deparment</a>
                  <a href="deleteWorker.php" class="w3-bar-item w3-button">Delete Workers</a>
                  <a href="deleteDeparments.php" class="w3-bar-item w3-button">Delete Deparments</a>
                  



                  <a href="developers.php" class="w3-bar-item w3-button">Developers</a>

                </div>

                <!-- Page Content -->
                <div style="margin-left:25%">

                <div class="w3-container w3-teal">
                  <h1>Add a new worker</h1>
                </div>
                <br></br>
                ID worker:<input type="text" id="idWorker"/><br/><br/>
                Worker Name:<input type="text" id="inputName"/><br/><br/>
                Worker Last Name:<input type="text" id="inputLast"/><br/><br/>
                Date of join:<input type="text" id="inputDate"/><br/><br/>
                <label for="combo">Choose a deparment:</label>

                <select id="Combox">
            
                </select>

                <br></br>
                <button type="button" id="buttonSave" class="w3-button w3-teal w3-button">Save</button>


            </div>
        
        </body>

</html>

<script> 
    document.getElementById("buttonSave").addEventListener("click", function(){

        var baseurl = "http://localhost:5000/workers";
        var xhr = new XMLHttpRequest();

        var id= document.getElementById("idWorker").value;
        var nameWorker= document.getElementById("inputName").value;
        var lastNameWorker= document.getElementById("inputLast").value;
        var dateOfJoinWorker= document.getElementById("inputDate").value;
        var combox= document.getElementById("Combox");
        var selectedText = combox.options[combox.selectedIndex].text;


        xhr.open('PUT', baseurl, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify({
            "idWorker": parseInt(id,10),
            "lastNameWorker":lastNameWorker,
            "nameWorker": nameWorker,
            "dateOfAdmisionWorker": dateOfJoinWorker,
            "nameDeparmentFk": selectedText
           
        }));
    });
</script> 



