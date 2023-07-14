<?php
session_start();
include("db.php");

$profileId = $_SESSION['profileId'];

// Fetch data from the database for each symptom
$acneRatings = [];
$query = "SELECT value FROM AcneTracking WHERE profileId = $profileId";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $acneRatings[] = $row['value'];
  }
}

$weightData = []; 
$query = "SELECT value FROM WeightTracking WHERE profileId = $profileId";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $weightData[] = $row['value'];
  }
}

$menstruationData = []; 
$query = "SELECT status FROM MenstruationTracking WHERE profileId = $profileId";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $menstruationData[] = $row['status'];
  }
}

$hairLossData = []; 
$query = "SELECT value FROM HairLossTracking WHERE profileId = $profileId";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $hairLossData[] = $row['value'];
  }
}

$hairGrowthData = []; 
$query = "SELECT value FROM HairGrowthTracking WHERE profileId = $profileId";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $hairGrowthData[] = $row['value'];
  }
}

$connect->close();

// Prepare the data to be sent as JSON response
$data = [
  'acneRatings' => $acneRatings,
  'weightData' => $weightData,
  'menstruationData' => $menstruationData,
  'hairLossData' => $hairLossData,
  'hairGrowthData' => $hairGrowthData
];

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Send the JSON response
echo json_encode($data);
?>
