<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 7 DWES</title>
    <style type="text/css">
        html, body {
            height: 100%;
        }
        html {
            display: table;
            margin: auto;
        }
        body {
            font-family: Arial, Verdana, sans-seriff;
            font-size: 90%;
            display: table-cell;
            vertical-align: middle;
        }
        fieldset {
            width: 300px;
            margin-top: 20px;
            border: 1px solid #d6d6d6;
            background-color: #f5f5f5;
            line-height: 1.6em;
            border-radius: 10px;
            padding: 20px;
        }
        legend {
            font-style: italic;
            color: #666666;
        }
        input[type="text"] {
            width: 120px;
            border: 1px solid #d6d6d6;
            padding: 2px;
            outline: none;
        }
        input[type="text"]:focus,
        input[type="text"]:hover {
            background-color: #d0e2f0;
            border: 1px solid #999999;
        } 
        #cabecera {
            text-transform: uppercase;
        }
        .title {
            float: left;
            width: 43px;
            clear: left;
        }
        .exit {
            color: #0080FF;
        }
     
    </style>
</head>
<body>
    <p id="cabecera"><b>Rastreautores:</b></p>
    <form id="formulario">
    <!--Cada vez que tecleamos algo en este field se mostrarán sugerencias-->
        <fieldset>
            <legend>Introduce el autor que deseas buscar</legend>
            <p><label class="title "for="texto" id="label">Autor: </label></p>
               <input type="text" id="texto">
            <!-- En el span con id="sugerencias" mostraremos las coincidencias -->
            <p><strong>Sugerencias:</strong><br/> <span class="exit" id="sugerencias""></span></p>
        </fieldset>
    </form>    
    <!-- cargamos biblioteca AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
    <script type="text/javascript">	
        // Jquery para cargar los libros       
        $(document).ready(function(){   
            // Función para permitir sólo texto en el input del formulario  
            $("#texto").keypress(function(event) {
                var regex = new RegExp("^[a-zA-Z ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });      
            /* Se lanza la función que mostrará las sugerencias a partir 
                de lo introducido en el input  del formulario */
           $("#texto").keyup(function(){
                $("#sugerencias").load("cargarAutores.php?q=" + $("#texto").val());
            });           
        });
     </script>
</body>
</html>