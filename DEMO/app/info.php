<?php
  session_start();

  $pageTitle = 'Home';
  include_once("templates/header.php");
  
include("db.php");
?>

<!--form food-->
<div class="container">
    <form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <!-- Name selection -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <!-- Birthdate selection -->
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
        </div>

        <!-- Weight selection -->
        <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" class="form-control" id="weight" name="weight" min="0" step="0.1">
        </div>

        <!-- Weight selection -->
        <div class="form-group">
            <label for="height">Height (cm):</label>
            <input type="number" class="form-control" id="height" name="height" min="0" step="0.1">
        </div>

        <!-- Ethnicity selection -->
        <div class="form-group">
            <label for="ethnicity"> Ethnicity: </label>
            <select id="ethnicity" class="form-control" name="ethnicity">
                <option value="">Select an option</option>
                <option value="nonebirth"> Asian </option>
                <option value="hormonal"> Black </option>
                <option value="barrier"> Caucasian </option>
                <option value="iud"> Hispanic </option>
                <option value="sterilization"> Hindi </option>
                <option value="emergency"> Other </option>
            </select>
        </div>

        <!-- Birth control -->
        <div class="form-group">
            <label for="birthcontrol"> Do you take birth control?</label>
            <select id="birthcontrol" class="form-control" name="birthcontrol">
                <option value="">Select an option</option>
                <option value="nonebirth"> None </option>
                <option value="hormonal"> Hormonal methods </option>
                <option value="barrier"> Barrier methods </option>
                <option value="iud"> IUD </option>
                <option value="sterilization"> Sterilization </option>
                <option value="emergency"> Emergency contraception </option>
            </select>
        </div>

        <!-- Button function through JavaScript -->
        <button type="button" class="btn btn-outline-secondary float-right" onclick="submitForm()">Next</button>
    </form>
</div>

<!-- include footer -->
<?php
include_once("templates/footer.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $ethnicity = $_POST["ethnicity"];
    $birthcontrol = $_POST["birthcontrol"];

    // Retrieve the profileId from the session
    $profileId = $_SESSION["profileId"];

    // Insert form values into the Profile table for the corresponding profileId
    $sql = "UPDATE Profile SET name = '$name', dob = '$birthdate', ethnicity = '$ethnicity', height = '$height', weight = '$weight', birthcontrol = '$birthcontrol' WHERE profileId = '$profileId'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Form data saved successfully.";
        echo '<script>window.location.href = "food.php";</script>'; // Redirect to food.php
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    // Close the database connection
    mysqli_close($connect);
}
?>

<script>
    function submitForm() {
        // Perform form submission asynchronously
        var form = document.getElementById("myForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Successful submission
                console.log(xhr.responseText);
                window.location.href = "food.php"; // Redirect to food.php
            } else {
                // Error in submission
                console.error(xhr.responseText);
            }
        };
        xhr.send(formData);
    }
</script>
