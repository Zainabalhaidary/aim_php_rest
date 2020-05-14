<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include_once '../../config/Database.php';
  include_once '../../models/PrayerTimes.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate prayer object
  $prayer = new PrayerTimes($db);
  // Get city & date
  $prayer->City = isset($_GET['Date1']) ? $_GET['Date1'] : die();
  $prayer->Date = isset($_GET['Date2']) ? $_GET['Date2'] : die();
  //Get id
  // $prayer->id = isset($_GET['id']) ? $_GET['id'] : die();
  //$prayer->read_single_by_id();

  // Get prayer
    try{
        $prayer->read_single();
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

  // Create array
  $prayer_arr = array(
    'id' => $prayer->id,
    'City' => $prayer->City,
    'Date' => $prayer->Date,
    'Day' => $prayer->Day,
    'Imsak' => $prayer->Imsak,
    'Dawn' => $prayer->Dawn,
    'Sunrise' => $prayer->Sunrise,
    'Noon' => $prayer->Noon,
    'Sunset' => $prayer->Sunset,
    'Maghrib' => $prayer->Maghrib,
    'Midnight' => $prayer->Midnight
  );

  // Make JSON
  print_r(json_encode($prayer_arr));
