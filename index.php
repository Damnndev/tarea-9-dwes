<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Tarea 9 Dwes</title>
</head>
<body>
    <?php
        // Numero aleatorio para que con cada recarga se cargue un nuevo personaje
        $persona = rand(1, 826);
        // LLamamos a la API
        $api = curl_init("https://rickandmortyapi.com/api/character/$persona");
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($api);
        curl_close($api);
        // Decodificamos el JSON
        $personajes = json_decode($response, true);

        //var_dump($personajes);      
    ?>
    <main class="flex">
        <article class="card">
            <?php
            $personajeImg     = $personajes['image']; 
            $personajeNombre  = $personajes['name'];
            $personajeEspecie = $personajes['species'];
            $personajeID      = $personajes['id'];
            $personajeEstado  = $personajes['status'];
            $personajeGenero  = $personajes['gender'];
            ?>
            <img src="./img/bg-pattern-card.svg" alt="imagen header card" class="card-header">
            <div class="card-body">
                <img src="<?php echo $personajeImg ?>" alt="imagen de <?php echo $personajeNombre ?>" class="card-body-img">
                <h1 class="card-body-title">
                    <?php echo $personajeNombre ?>
                </h1>
                <p class="card-body-text"><?php echo $personajeEspecie ?></p>
            </div>
            <div class="card-footer">
                <div class="card-footer-social">
                    <h3>ID</h3>
                    <p><?php echo $personajeID?></p>
                </div>
                <div class="card-footer-social">
                    <h3>Estado</h3>
                    <p><?php echo $personajeEstado?></p>
                </div>
                <div class="card-footer-social">
                    <h3>Género</h3>
                    <p><?php echo $personajeGenero?></p>
                </div>
            </div>
        </article>
    </main>
</body>
</html>