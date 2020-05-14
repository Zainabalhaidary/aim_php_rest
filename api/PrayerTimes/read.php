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
  // prayer query
  $result = $prayer->read();
  // Get row count
  $num = $result->rowCount();
  // Check if any prayers
  if($num > 0) {
    // Prayer array
    $prayers_arr = array();
    // $prayers_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $prayer_item = array(
        'id' => $id,
        'City' => $City,
        'Date' => $Date,
        'Day' => $Day,
        'Imsak' => $Imsak,
        'Dawn' => $Dawn,
        'Sunrise' => $Sunrise,
        'Noon' => $Noon,
        'Sunset' => $Sunset,
        'Maghrib' => $Maghrib,
        'Midnight' => $Midnight
      );
      // Push to "data"
      array_push($prayers_arr, $prayer_item);
      // array_push($prayers_arr['data'], $prayer_item);
    }
    // Turn to JSON & output
    echo json_encode($prayers_arr);
  } else {
    // No Prayers
    echo json_encode(
      array('message' => 'No Prayers Found')
    );
  }

