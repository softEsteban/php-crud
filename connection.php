<?php

function connection()
{
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $bd = "dataclau";

    $connect = mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);

    return $connect;
}
;

?>