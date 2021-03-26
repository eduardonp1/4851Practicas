<?php

$hostname = "localhost";
$username = "lalo";
$password = "";
$dbname   = "practicas4851";

$db = mysqli_connect($hostname,$username,$password)
or die ("<html><script language='JavaScript'>
    alert('!No se pudo realizar la conexion')</script>
    </html>");

mysqli_select_db($db,$dbname);

?>