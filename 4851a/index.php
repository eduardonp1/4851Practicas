<?php
require "conexion.php";
header('Content-Type: application/JSON'); 
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    if(isset($_GET['param'])&& isset($_GET['paramdos'])){
      $id   = intval($_GET['param']);
      $email =($_GET['paramdos']);
      $query = "SELECT * FROM alumnos where id_alumnos='$id' and email='$email' ";
      $result   = mysqli_query($db, $query);
      
      if($result->num_rows > 0 ){
        while ($row = mysqli_fetch_array($result)) {
          $id_alumnos = $row['id_alumnos'];
          $nombre = $row['nombre'];
          $escuela = $row['escuela'];
          $carrera = $row['carrera'];
          $email = $row['email'];
        }
        $datos = array(
          'id_alumnos' => $id_alumnos,
          'nombre' => $nombre,
          'escuela' => $escuela,
          'carrera' => $carrera,
          'email' => $email
        );
        $response = array(
          'response' => 'Success' ,
          'message' =>  $datos
        );
        header("HTTP/1.1 200 OK");
        echo json_encode($response);
      }else{
        header("HTTP/1.1 404 NOT FOUND");
        echo json_encode("");
      }
    }else{
        $response = array(
          'response' => 'Faild' ,
          'message' => "No enviaste la variable param en la url"
        );

        header("HTTP/1.1 400 BAD REQUEST");
        echo json_encode($response);
    }                
    break;
}
?>