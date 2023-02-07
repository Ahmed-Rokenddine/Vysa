<?php 
  class TLS {
    // DB stuff
    private $conn;
    private $table = 'tls';

    // TLS Properties
    public $id;
    public $Nom;
    public $Prenom;
    public $Birthday;
    public $Nationalite;
    public $Situation;
    public $adresse;
    public $Type;
    public $Start;
    public $End;
    public $Doctype;
    public $Rendezvous;
    public $Token;
    
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get tls
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single TLS
    public function read_single() {
    
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE token = ? ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->token);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->Nom = $row['Nom'];
          $this->Prenom = $row['Prenom'];
          $this->Birthday = $row['Birthday'];
          $this->Nationalite = $row['Nationalite'];
          $this->Situation = $row['Situation'];
          $this->adresse = $row['adresse'];
          $this->Type = $row['Type'];
          $this->Start = $row['Start'];
          $this->End = $row['End'];
          $this->Doctype = $row['Doctype'];
          $this->Rendezvous = $row['Rendezvous'];
          $this->Token = $row['Token'];


    }

    // Create TLS
    public function create() {

    $query = (' SELECT id FROM ' . $this->table . ' WHERE id = (SELECT MAX(id) FROM tls);');
    
    $stmt = $this->conn->prepare($query);
    
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_OBJ);

    $idier = $row->id + 1;
    

    

    if($idier != ''){
          // Create query
          $query = ('INSERT INTO ' . $this->table . ' (   Nom ,  Prenom   ,  Birthday , Nationalite  , Situation , adresse , Type , Start , End , Doctype , Rendezvous , Token) VALUES (  :Nom  , :Prenom , :Birthday , :Nationalite , :Situation , :adresse , :Type , :Start , :End , :Doctype , :Rendezvous , :Token) ');
          

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->Nom = htmlspecialchars(strip_tags($this->Nom));

          $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));

          $this->Nationalite = htmlspecialchars(strip_tags($this->Nationalite));
          
          $this->Birthday = htmlspecialchars(strip_tags($this->Birthday));

          $this->Situation = htmlspecialchars(strip_tags($this->Situation));

          $this->adresse = htmlspecialchars(strip_tags($this->adresse));

          $this->Type = htmlspecialchars(strip_tags($this->Type));

          $this->Start = htmlspecialchars(strip_tags($this->Start));

          $this->End = htmlspecialchars(strip_tags($this->End));

          $this->Doctype = htmlspecialchars(strip_tags($this->Doctype));

          $this->Rendezvous = htmlspecialchars(strip_tags($this->Rendezvous));

          

           $hash = substr(hash("sha256", $idier), 0, 10);

          
          

          // Bind data
          $stmt->bindParam(':Nom', $this->Nom);

          $stmt->bindParam(':Prenom', $this->Prenom);
          
          $stmt->bindParam(':Birthday', $this->Birthday);

          $stmt->bindParam(':Nationalite', $this->Nationalite);

          $stmt->bindParam(':Situation', $this->Situation);

          $stmt->bindParam(':adresse', $this->adresse);

          $stmt->bindParam(':Type', $this->Type);

          $stmt->bindParam(':Start', $this->Start);

          $stmt->bindParam(':End', $this->End);

          $stmt->bindParam(':Doctype', $this->Doctype);

          $stmt->bindParam(':Rendezvous', $this->Rendezvous);

          $stmt->bindParam(':Token', $hash);


          



          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }

    // Update TLS
     public function update() {
           // Create query
           $query = 'UPDATE ' . $this->table . '
                                 SET Nom = :Nom, Prenom = :Prenom, Birthday = :Birthday, Nationalite = :Nationalite , Situation = :Situation, adresse = :adresse, Type = :Type, Start = :Start, End = :End, Doctype = :Doctype
                                 WHERE Token = :token';

           // Prepare statement
           $stmt = $this->conn->prepare($query);

           // Clean data
           $this->Nom = htmlspecialchars(strip_tags($this->Nom));
           $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
           $this->Birthday = htmlspecialchars(strip_tags($this->Birthday));
           $this->Nationalite = htmlspecialchars(strip_tags($this->Nationalite));
           $this->Situation = htmlspecialchars(strip_tags($this->Situation));
           $this->adresse = htmlspecialchars(strip_tags($this->adresse));
           $this->Type = htmlspecialchars(strip_tags($this->Type));
           $this->Start = htmlspecialchars(strip_tags($this->Start));
           $this->End = htmlspecialchars(strip_tags($this->End));
           $this->Doctype = htmlspecialchars(strip_tags($this->Doctype));
           
           

           // Bind data
           $stmt->bindParam(':Nom', $this->Nom);
           $stmt->bindParam(':Prenom', $this->Prenom);
           $stmt->bindParam(':Birthday', $this->Birthday);
           $stmt->bindParam(':Nationalite', $this->Nationalite);
           $stmt->bindParam(':Situation', $this->Situation);
           $stmt->bindParam(':adresse', $this->adresse);
           $stmt->bindParam(':Type', $this->Type);
           $stmt->bindParam(':Start', $this->Start);
           $stmt->bindParam(':End', $this->End);
           $stmt->bindParam(':Doctype', $this->Doctype);
           $stmt->bindParam(':token', $this->token);
         

           // Execute query
           if($stmt->execute()) {
             return true;
           }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

        return false;
     }

     // Delete TLS
     public function delete() {
           // Create query
           $query = 'DELETE FROM ' . $this->table . ' WHERE token = :token';

           // Prepare statement
           $stmt = $this->conn->prepare($query);

    //      // Clean data
           $this->token = htmlspecialchars(strip_tags($this->token));

           // Bind data
           $stmt->bindParam(':token', $this->token);

           // Execute query
           if($stmt->execute()) {
             return true;
           }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;
     }
    
  }