<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: GET');
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

  // Get tls
  $tls->read_single();
  
  // Create array
  $tls_arr = array(
    'id' => $tls->id,
    'Nom' => $tls->Nom,
    'Prenom' => $tls->Prenom,
    'Birthday' => $tls->Birthday,
    'Nationalite' => $tls->Nationalite,
    'Situation' => $tls->Situation ,
    'adresse' => $tls->adresse,
    'Type' => $tls->Type,
    'Start' => $tls->Start,
    'End' => $tls->End,
    'Doctype' => $tls->Doctype,
    'Rendezvous' => $tls->Rendezvous,
    'Token' => $tls->Token
  );

  // Make JSON
  print_r(json_encode($tls_arr));