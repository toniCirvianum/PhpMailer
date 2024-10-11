<?php

    $user=$_GET['user'];
    $token=$_GET['token'];

    if ($user=='toni' && $token=='token') {
        echo "Usuari verificat";
    } else {
        echo "usuari no verificat";
    }
     