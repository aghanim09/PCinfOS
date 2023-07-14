<?php
  session_start();

  $pageTitle = 'Home';
  include_once("templates/header.php");
  
  include("db.php");

  $profileId = $_SESSION['profileId'];

  $query = "SELECT * FROM Foodpreferences";
  $foodpreferences = mysqli_query($connect, $query);
  
  $query = "SELECT * FROM Foodrestrictions";
  $foodrestrictions = mysqli_query($connect, $query);

  // Handle form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save selected food restrictions
    $foodRestrictions = $_POST['restrictions'];
    foreach ($foodRestrictions as $restriction) {
      $query = "INSERT INTO SelectedFoodrestrictions (restrictionId, profileId) VALUES ('$restriction', '$profileId')";
      mysqli_query($connect, $query);
    }

    // Save selected food preferences
    $diet = $_POST['diet'];
    $query = "INSERT INTO SelectedFoodpreferences (preferenceId, profileId) VALUES ('$diet', '$profileId')";
    mysqli_query($connect, $query);

    // Close the database connection
    mysqli_close($connect);

    // Redirect to suggestions.php after form submission
    echo '<script>window.location.href = "suggestions.php";</script>';
    exit();
  }
?>


<!--form food-->
<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <!-- Food allergy selection -->
    <div class="form-group">
      <label for="food-allergies">Food Allergies:</label>
      <?php
      while ($row = mysqli_fetch_assoc($foodrestrictions)) {
        $restrictionName = $row['name'];
        $restrictionId = $row['restrictionId'];
        
        echo "<div class='form-group'>";
        echo "<input type='checkbox' id='$restrictionId' name='restrictions[]' value='$restrictionId'>";
        echo "<label for='$restrictionId'>$restrictionName</label>";
        echo "</div>";
      }
      ?>
    </div>

    <!-- Food preference selection -->
    <div class="form-group">
      <label for="diet">Diet:</label>
      <select class="form-control" id="diet" name="diet">
        <option value="">Select an option</option>
        <?php
        while ($row = mysqli_fetch_assoc($foodpreferences)) {
          $preferenceName = $row['name'];
          $preferenceId = $row['preferenceId'];

          echo "<option value='$preferenceId'>$preferenceName</option>";
        }
        ?>
      </select>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-outline-secondary float-right">Next</button>
  </form>
</div>


<?php
  include_once("templates/footer.php");
?>
