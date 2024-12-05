<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petición
    y guardamos el resultado
*/
$result = curl_exec($ch);

//una alternativa file_get_contents
// $result = file_get_contents(API_URL) //Si solo quiero hacer un GET de una API
$data = json_decode($result, true);

curl_close($ch);

// var_dump($data);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próxima peli de MCU</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <img 
            src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]?>"
            style="border-radius: 16px;" 
        />
    </section>

    <hgroup>
        <h2><span><?= $data["title"]; ?></span> se estrena en <span><?= $data["days_until"]?></span> días</h2>
        <h3>Fecha de estreno: <?= $data["release_date"]?></h3>
        <p>La siguiente película es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: grid;
        place-content: center;
    }

    img {
        border: 5px solid black;
    }

    hgroup {
        text-align: center;
    }

    span {
        color: crimson;
    }
</style>