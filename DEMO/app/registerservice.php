<?php
include("db.php");

// Handle the login process
function handleLogin($connect)
{
    // Retrieve the entered email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform the login process
    $result = verifyLogin($email, $password, $connect);

    if ($result === true) {
        // Login successful
        echo "<script>window.location.href = 'progress.php';</script>";
        exit();
    } else {
        // Login failed
        echo "Error: " . $result;
    }
}

// Handle the registration process
function handleRegistration($connect)
{
    // Retrieve the entered email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform the registration process
    $result = registerUser($email, $password, $connect);

    if ($result === true) {
        // Registration successful
        echo "<script>window.location.href = 'info.php';</script>";
        exit();
    } else {
        // Registration failed
        echo "Error: " . $result;
    }
}

// Verify the login credentials
function verifyLogin($email, $password, $connect)
{
    // Retrieve the user's data from the Login table based on the provided email
    $query = "SELECT * FROM Login WHERE email = '$email'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Set the session variables
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['profileId'] = $row['profileId'];

            // Return true to indicate successful login
            return true;
        }
    }

    // Return an error message if login fails
    return "Invalid email or password.";
}

// Register a new user
function registerUser($email, $password, $connect)
{
    // Check if the email already exists in the Login table
    $checkEmailQuery = "SELECT * FROM Login WHERE email = '$email'";
    $checkEmailResult = mysqli_query($connect, $checkEmailQuery);

    if ($checkEmailResult && mysqli_num_rows($checkEmailResult) > 0) {
        // Email already exists, return an error message
        return "Email already registered.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the Profile table
    $profileQuery = "INSERT INTO Profile () VALUES ()";
    $profileResult = mysqli_query($connect, $profileQuery);

    if ($profileResult) {
        // Get the newly inserted profile's ID
        $profileId = mysqli_insert_id($connect);

        // Insert the new user into the Login table with the generated profileId
        $insertLoginQuery = "INSERT INTO Login (email, password, profileId) VALUES ('$email', '$hashedPassword', '$profileId')";
        $insertLoginResult = mysqli_query($connect, $insertLoginQuery);

        if ($insertLoginResult) {
            // Get the newly inserted user's ID
            $userId = mysqli_insert_id($connect);

            // Set the session variables
            $_SESSION['userId'] = $userId;
            $_SESSION['profileId'] = $profileId;

            // Return true to indicate successful registration
            return true;
        }
    }

    // Return an error message if registration fails
    return "Registration failed.";
}
?>
