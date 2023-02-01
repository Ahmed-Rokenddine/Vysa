<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/tls.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog tls object
  $tls = new TLS($db);

  // Get ID
  $tls->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get tls
  $tls->read_single();

  // Create array
  $tls_arr = array(
    'id' => $tls->id,
    'Nom' => $tls->Nom,
    'Prénom' => $tls->Prénom,
    'Birthday' => $tls->Birthday,
    'Nationalite' => $tls->Nationalite,
    'Situation' => $tls->Situation
  );

  // Make JSON
  print_r(json_encode($tls_arr));