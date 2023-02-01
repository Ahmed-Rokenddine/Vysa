<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/tls.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog tls object
  $tls = new TLS($db);

  // Get raw tlsed data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $tls->id = $data->id;

  $tls->Nom = $data->Nom;
  $tls->Prenom = $data->Prenom;
  $tls->Birthday = $data->Birthday;
  $tls->Nationalite = $data->Nationalite;

  // Update tls
  if($tls->update()) {
    echo json_encode(
      array('message' => 'tls Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'tls Not Updated')
    );
  }

