<?php
class PrayerTimes{
 // DB stuff
 private $conn;
 private $table = 'PrayerTimes_App';
 // Prayer Properties
 public $id;
 public $City;
 public $Date;
 public $Day;
 public $Imsak;
 public $Dawn;
 public $Sunrise;
 public $Noon;
 public $Sunset;
 public $Maghrib;
 public $Midnight;

 public $Date1;
 public $Date2;

 // Constructor with DB
 public function __construct($db) {
   $this->conn = $db;
 }
 // Get Prayers
  // Get Prayers
  public function read() {
    // Create query
    $query = 'SELECT  * FROM ' . $this->table . ' p ORDER BY Day ASC';
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();
    return $stmt;
  }

  // City = 1   City = "birmingham" 
  // City = 2   City = "brighton" 
  // City = 3   City = "cardiff" 
  // City = 4   City = "glasgow" 
  // City = 5   City = "hull" 
  // City = 6   City = "leeds" 
  // City = 7   City = "liverpool" 
  // City = 8   City = "london" 
  // City = 9   City = "manchester" 
  // City = 10   City = "norwich" 
  // City = 11   City = "plymouth" 
  // City = 12   City = "portsmouth" 
  // City = 13   City = "sheffield" 
  // City = 14   City = "southampton" 
  // City = 15   City = "swansea" 
  
 // Get Single Prayer
 public function read_single() {
   try{
       // Create query
      $query = 'SELECT * FROM ' . $this->table . '  WHERE Date= '.$this->Date. ' AND City= ' .$this->City ;


       // Prepare statement
       $stmt = $this->conn->prepare($query);


      // print_r($this->Date);
      // print_r($this->City);


      //  print_r($stmt);
       // Execute query
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

      //  print_r($row);
       // Set properties
       $this->id = $row['id'];
       $this->City = $row['City'];
       $this->Date = $row['Date'];
       $this->Day = $row['Day'];
       $this->Imsak = $row['Imsak'];
       $this->Dawn = $row['Dawn'];
       $this->Sunrise = $row['Sunrise'];
       $this->Noon = $row['Noon'];
       $this->Sunset = $row['Sunset'];
       $this->Maghrib = $row['Maghrib'];
       $this->Midnight = $row['Midnight'];
   }
   catch(Exception $e)
    {
        echo "Error: " . $e->getMessage();
    }

 }

// Get Single Prayer
public function read_single_by_id() {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' p WHERE p.id = ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Bind ID
    $stmt->bindParam(1, $this->id);
    // Execute query
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // Set properties
    $this->id = $row['id'];
    $this->City = $row['City'];
    $this->Date = $row['Date'];
    $this->Day = $row['Day'];
    $this->Imsak = $row['Imsak'];
    $this->Dawn = $row['Dawn'];
    $this->Sunrise = $row['Sunrise'];
    $this->Noon = $row['Noon'];
    $this->Sunset = $row['Sunset'];
    $this->Maghrib = $row['Maghrib'];
    $this->Midnight = $row['Midnight'];
}




 // Get Single Prayer
 public function read_by_date_range() {
  // Create query
  $query = 'SELECT * FROM ' . $this->table . ' p WHERE p.Date >= ? AND  p.Date >= ? AND p.City = ?';
  // Prepare statement
  $stmt = $this->conn->prepare($query);
  // Bind ID
  $stmt->bindParam('Date1', $this->Date1);
  $stmt->bindParam('Date2', $this->Date2);
  $stmt->bindParam('City', $this->City);
  // Execute query
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // Set properties
  $this->id = $row['id'];
  $this->City = $row['City'];
  $this->Date = $row['Date'];
  $this->Day = $row['Day'];
  $this->Imsak = $row['Imsak'];
  $this->Dawn = $row['Dawn'];
  $this->Sunrise = $row['Sunrise'];
  $this->Noon = $row['Noon'];
  $this->Sunset = $row['Sunset'];
  $this->Maghrib = $row['Maghrib'];
  $this->Midnight = $row['Midnight'];

}
 
}