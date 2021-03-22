<?php

header('Content-Type:aplication/Json');
$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
  case 'GET':
    $autorization = '';
    $headers = array();
    foreach (getallheaders() as $name => $value) {
      $headers[$name] = $value;
    }
    $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;
    $token = str_replace("Bearer ","",$autorization);
    if($token == "2j3h4j23h4j2h"){
    
      if (isset($_GET['name']) && isset($_GET['email'])) {
        $name = $_GET['name'];
        $email = $_GET['email'];

        // $mostrarDatos = "El nombre es: ".$name." color dos: ".$email;

        $response = array(
          'response' => 'Success',
          'data'  => array(
            'nombre' => $name,
            'email' => $email
          )
        );
        
        header("HTTP/1.1 200 OK");
        print json_encode($response);
      } else {
        $response = array('response' => 'Failed', 'message'  => 'Es necesario enviar nombre y correo');

        header("HTTP/1.1 400 BAD REQUEST");
        print json_encode($response);
      }

    } else {
      header("HTTP/1.1 405 AUTORIZATHED");
			print json_encode("");
    }

    break;

  case 'POST':

    $autorization = '';
    $headers = array();
    foreach (getallheaders() as $name => $value) {
      $headers[$name] = $value;
    }
    $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;
    $token = str_replace("Bearer ","",$autorization);
    if($token == "2j3h4j23h4j2h"){

      if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $escuela = $_POST['escuela'];

        $response = array(
          'response' => 'Success form-data',
          'data'  => array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'matricula' => $matricula,
            'email' => $email,
            'escuela' => $escuela
          )
        );
        
        header("HTTP/1.1 200 OK");
        print json_encode($response);
      } else {
        $postBody = file_get_contents("php://input");
        $data = json_decode($postBody);

        $nombre = $data->nombre;
        $apellidos = $data->apellidos;
        $matricula = $data->matricula;
        $email = $data->email;
        $escuela = $data->escuela;

        $response = array(
          'response' => 'Success RAW',
          'data'  => array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'matricula' => $matricula,
            'email' => $email,
            'escuela' => $escuela
          )
        );
        
        header("HTTP/1.1 200 OK");
        print json_encode($response);
      }
    } else {
      header("HTTP/1.1 405 AUTORIZATHED");
			print json_encode("");
    }

    break;
  case 'PATCH':
    $autorization = '';
    $headers = array();
    foreach (getallheaders() as $name => $value) {
      $headers[$name] = $value;
    }
    $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;
    $token = str_replace("Bearer ","",$autorization);
    if($token == "2j3h4j23h4j2h"){

      $postBody = file_get_contents("php://input");
      $data = json_decode($postBody);

      $datos = "Mi nombre es ".$data->user->nombre." Mi email es ".$data->user->email;

      $response = array(
        'response' => 'Success',
        'message'  => $datos
      );
      
      header("HTTP/1.1 200 OK");
      print json_encode($response);

    } else {
      header("HTTP/1.1 405 AUTORIZATHED");
			print json_encode("");
    }

    break;
  case 'PUT':
    $autorization = '';
    $headers = array();
    foreach (getallheaders() as $name => $value) {
      $headers[$name] = $value;
    }
    $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;
    $token = str_replace("Bearer ","",$autorization);
    if($token == "2j3h4j23h4j2h"){
        
      $postBody = file_get_contents("php://input");
      $data = json_decode($postBody);

      $datos = "Mi nombre es ".$data->user->nombre." Mi email es ".$data->user->email;

      $response = array(
        'response' => 'Success',
        'message'  => $datos
      );
      
      header("HTTP/1.1 200 OK");
      print json_encode($response);
    } else {
      header("HTTP/1.1 405 AUTORIZATHED");
			print json_encode("");
    }
    break;
}

?>