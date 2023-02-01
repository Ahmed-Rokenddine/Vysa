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
          $query = 'SELECT *FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->Nom = $row['Nom'];
          $this->Prenom = $row['Prenom'];
          $this->Birthday = $row['Birthday'];
          $this->Nationalite = $row['Nationalite'];
          $this->Situation = $row['Situation'];
    }

    // Create TLS
    public function create() {
          // Create query
          $query = ('INSERT INTO ' . $this->table . ' (   Nom ,  Prenom   ,  Birthday , Nationalite   ) VALUES (  :Nom  , :Prenom , :Birthday , :Nationalite ) ');
          

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->Nom = htmlspecialchars(strip_tags($this->Nom));

          $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));

          $this->Nationalite = htmlspecialchars(strip_tags($this->Nationalite));
          
          $this->Birthday = htmlspecialchars(strip_tags($this->Birthday));
          

          // Bind data
          $stmt->bindParam(':Nom', $this->Nom);

          $stmt->bindParam(':Prenom', $this->Prenom);
          
          $stmt->bindParam(':Birthday', $this->Birthday);

          $stmt->bindParam(':Nationalite', $this->Nationalite);
          



          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update TLS
     public function update() {
           // Create query
           $query = 'UPDATE ' . $this->table . '
                                 SET Nom = :Nom, Prenom = :Prenom, Birthday = :Birthday, Nationalite = :Nationalite
                                 WHERE id = :id';

           // Prepare statement
           $stmt = $this->conn->prepare($query);

           // Clean data
           $this->Nom = htmlspecialchars(strip_tags($this->Nom));
           $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
           $this->Birthday = htmlspecialchars(strip_tags($this->Birthday));
           $this->Nationalite = htmlspecialchars(strip_tags($this->Nationalite));
           $this->id = htmlspecialchars(strip_tags($this->id));

           // Bind data
           $stmt->bindParam(':Nom', $this->Nom);
           $stmt->bindParam(':Prenom', $this->Prenom);
           $stmt->bindParam(':Birthday', $this->Birthday);
           $stmt->bindParam(':Nationalite', $this->Nationalite);
         $stmt->bindParam(':id', $this->id);

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
           $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

           // Prepare statement
           $stmt = $this->conn->prepare($query);

    //      // Clean data
           $this->id = htmlspecialchars(strip_tags($this->id));

           // Bind data
           $stmt->bindParam(':id', $this->id);

           // Execute query
           if($stmt->execute()) {
             return true;
           }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;
     }
    
  }