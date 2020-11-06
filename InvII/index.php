<!DOCTYPE html>
<html lang="esp">
    <head>
     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src='scriptPrincipal.js'></script>
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
                  <a href="showDepartments.php" class="w3-bar-item w3-button">Show Departments</a>
                  <a href="showWorkers.php" class="w3-bar-item w3-button">Show Workers</a>
                  <a href="#" class="w3-bar-item w3-button">Developers</a>
                </div>

                <!-- Page Content -->
                <div style="margin-left:25%">

                <div class="w3-container w3-teal">
                  <h1>Future of Tecnology</h1>
                </div>

            </div>
        
        </body>

</html>

<script> 
    document.getElementById("buscarPartida").addEventListener("click", function(){
        var idPartida= document.getElementById("idPartida").value;
        location.href="historialPartida.php?idPartidaABuscar="+idPartida;     
    });
</script> 



