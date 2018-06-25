<?php
require_once('config.php');
require_once('interaction.php');
require_once('authorisation.php');

if (isset($_POST["method"])) {
    $method = $_POST["method"];

    switch ($method) {
        case "login":
            login();
            break;
        case "register":
            register();
            break;
        case "registerinterest":
            registerInterest();
            break;
        case "compatiblematch":
            compatibleMatch();
            break;
        case "getinterests":
            getInterest();
            break;




    }
} else {
    echo "No method set";
}

