<!DOCTYPE html>
<html lang="esp">
    <head>
     
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
                  <a href="editWorker.php" class="w3-bar-item w3-button">Edit Worker</a>
                  <a href="editDeparment.php" class="w3-bar-item w3-button">Edit Deparment</a>

                  <a href="deleteWorker.php" class="w3-bar-item w3-button">Delete Workers</a>
                  <a href="developers.php" class="w3-bar-item w3-button">Developers</a>

                </div>

                <!-- Page Content -->
                <div style="margin-left:25%">

                <div class="w3-container w3-teal">
                  <h1>Delete by ID Deparment</h1>
                </div>
                <br></br>
                 
                ID:<input type="text" id="input"/><br/><br/>
                <br></br>
                <button type="button" id="buttonSave" class="w3-button w3-teal w3-button">Save</button>


            </div>
        
        </body>

</html>

<script> 
    document.getElementById("buttonSave").addEventListener("click", function(){
        var idDeparment = document.getElementById("input").value;
        var baseurl = "http://localhost:5000/deparments";
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', baseurl, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify({
            "idDeparment": idDeparment
        }));
    });
</script> 



