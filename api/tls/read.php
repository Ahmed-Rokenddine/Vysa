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

  // Blog tls query
  $result = $tls->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any tlss
  if($num > 0) {
    // tls array
    $tlss_arr = array();
    // $tlss_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $tls_item = array(
        'id' => $id,
        'Nom' => $Nom,
        'Prenom' => $Prenom,
        'Birthday' => $Birthday,
        'Nationalite' => $Nationalite,
        'Situation' => $Situation,
        'adresse' => $adresse,
        'Type' => $Type,
        'Start' => $Start,
        'End' => $End,
        'Doctype' => $Doctype,
        'Rendezvous' => $Rendezvous,
        'Token' => $Token
        
      );

      // Push to "data"
      array_push($tlss_arr, $tls_item);
      // array_push($tlss_arr['data'], $tls_item);
    }

    // Turn to JSON & output
    echo json_encode($tlss_arr);

  } else {
    // No tlss
    echo json_encode(
      array('message' => 'No tlss Found')
    );
  }
