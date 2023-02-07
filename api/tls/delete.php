<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/tls.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog tls object
  $tls = new TLS($db);

    // Get ID
    $tls->token = isset($_GET['token']) ? $_GET['token'] : die();

    

  // Delete tls
  if($tls->delete()) {
    echo json_encode(
      array('message' => 'tls Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'tls Not Deleted')
    );
  }

