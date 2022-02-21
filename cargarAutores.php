<?php
// variable para guardar resultado
$nombre = "";
$obra= "";

if (isset($_GET["q"])) {
    // Obtenemos el parámetro GET de la URL (Ej: ".php?q=El hobbit")
    $Nombre = $_GET["q"];
    $Nombre = strtolower($Nombre);
  
    // conectamos con la BD libros
    $mysqli = new mysqli("localhost", "otro", "otro", "libros");

    // Realizamos la consulta a la BD
    if (!$mysqli->connect_error){
        $mysqli->set_charset("utf8");
        $sql="SELECT Nombre, Apellidos, L.ID, Titulo, f_publicacion
        FROM autor A INNER JOIN libro L ON A.ID = L.id_autor WHERE (Nombre LIKE '%$Nombre%') ORDER BY Titulo";

        if (($resultado = $mysqli->query($sql)) && (!$mysqli->error)){
            //Trabajar con datos          
            
            //Procesar result set como asociativo
            while ($fila = $resultado->fetch_assoc()){
                 $nombre =  $fila['Nombre'] ." ". $fila['Apellidos'] . "<br>" ;
                  $obra = $obra . $fila['Titulo'] ."<br>" ;             
            }
            $resultado->free();
            $mysqli->close();
        }
        /*   si no hay coincidencias de nombre: "No se encuentran sugerencias"
             en caso contrario mostramos el resultado de la consulta */           
        if($nombre != "")
        {
            echo "<strong>Autor:</strong><br>" . $nombre;
            echo "<strong>Obra:</strong><br>" . $obra;
        
        }else echo "No se encuentran sugerencias";          
    }
}
?>

