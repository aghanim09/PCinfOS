<?php
require_once 'DEMO/app/db.php';


// JSON Response Function
function sendJsonResponse($data, $message = '', $status = 'success') {
    header('Content-Type: application/json');
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    echo json_encode($response);
    exit;
}

function processActivity($data) {
    global $connection;
    // Extracting data from $data array
    $activityDate = $data['activityDate'] ?? null;
    $selectedActivity = $data['activity'] ?? null;
    $otherActivity = $data['otherActivity'] ?? null;
    $distance = $data['distance'] ?? null;
    $duration = $data['duration'] ?? null;
    $intensity = $data['intensity'] ?? null;

    // Validate form data 
    $errors = [];
    if (!$activityDate) {
        $errors[] = "Date is required.";
    }
    if (!$selectedActivity) {
        $errors[] = "Activity is required.";
    }
    if ($selectedActivity === 'Other' && !$otherActivity) {
        $errors[] = "Please specify the other activity.";
    }

    // If errors, return them in JSON response
    if (count($errors) > 0) {
        sendJsonResponse($errors, "Validation failed", "error");
        return; // Stop execution after sending response
    }

    // Insert data into the database if there are no errors
    insertActivity($activityDate, $selectedActivity, $otherActivity, $distance, $duration, $intensity);
}

// Function to insert data into the database
function insertActivity($activityDate, $selectedActivity, $otherActivity, $distance, $duration, $intensity) {
    global $connection;

    // Determine the actual activity based on user selection
    $activity = ($selectedActivity === 'Other') ? $otherActivity : $selectedActivity;

    // SQL query to insert data
    $query = "INSERT INTO activity_data (activityDate, actvity_type, distance, duration, intensity) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "sssss", $activityDate, $activity, $distance, $duration, $intensity);

        if (mysqli_stmt_execute($stmt)) {
            sendJsonResponse(null, "Activity logged successfully");
        } else {
            sendJsonResponse(null, "Error logging activity: " . mysqli_error($connection), "error");
        }

        mysqli_stmt_close($stmt);
    } else {
        sendJsonResponse(null, "Error preparing statement: " . mysqli_error($connection), "error");
    }
}

// Main logic for handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rawData = file_get_contents('php://input');
    $decodedData = json_decode($rawData, true);
    if ($decodedData) {
        processActivity($decodedData);
    } else {
        sendJsonResponse(null, "Invalid JSON provided", "error");
    }
} else {
    sendJsonResponse(null, "Request method not supported", "error");
}

// Close the database connection 
mysqli_close($connection);

// Enable error reporting for debugging 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
 ?>
