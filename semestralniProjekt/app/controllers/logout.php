<?php
    session_start();    //přístup do dat session
    session_unset();     // smaže všechny session proměnné
    session_destroy();   // zničí session

    header("Location: ../views/other/home.php");
    exit();