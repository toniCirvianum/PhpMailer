<?php

function generateToken(){
        $caracters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr( str_shuffle( $caracters ), 0, 12);
        return $token;
    }


    ?>