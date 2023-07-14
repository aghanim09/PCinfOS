<?php
  session_start();

  $pageTitle = 'Home';
  include_once("templates/header.php");
  
  include("db.php");

  $query = "SELECT * FROM Foods";
  $result = $connect->query($query);
  $foods = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $foods[] = $row;
    }
  }
?>

<!-- content -->
<div class="container">
<h2>What did you eat today?</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <ul class="checklist">
      <?php foreach ($foods as $food): ?>
        <li class="checklist-item">
          <input type="checkbox" id="<?php echo $food['foodId']; ?>" name="foods[]" value="<?php echo $food['foodId']; ?>">
          <label for="<?php echo $food['foodId']; ?>"><?php echo $food['name']; ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

   <!-- symptoms today -->
   <h2>How were your Acne today?</h2>
  <div class="likert-scale d-flex align-items-center">
    <label><img src="images/sad.png" width="40" height="40" alt="sad icon"></label>
    <input type="radio" name="likert" value="1" id="option1">
    <label for="option1">1</label>
    <input type="radio" name="likert" value="2" id="option2">
    <label for="option2">2</label>
    <input type="radio" name="likert" value="3" id="option3">
    <label for="option3">3</label>
    <input type="radio" name="likert" value="4" id="option4">
    <label for="option4">4</label>
    <input type="radio" name="likert" value="5" id="option5">
    <label for="option5">5</label>
    <label><img src="images/smile.png" width="40" height="40" alt="smile icon"></label>
  </div>

  <h2>How was your Hairloss today?</h2>
  <div class="likert-scale d-flex align-items-center">
    <label><img src="images/sad.png" width="40" height="40" alt="sad icon"></label>
    <input type="radio" name="likert2" value="12" id="option12">
    <label for="option12">1</label>
    <input type="radio" name="likert2" value="22" id="option22">
    <label for="option22">2</label>
    <input type="radio" name="likert2" value="32" id="option32">
    <label for="option32">3</label>
    <input type="radio" name="likert2" value="42" id="option42">
    <label for="option42">4</label>
    <input type="radio" name="likert2" value="52" id="option52">
    <label for="option52">5</label>
    <label><img src="images/smile.png" width="40" height="40" alt="smile icon"></label>
  </div>

  <h2>Did you have your period today?</h2>
    <ul class="checklist">
      <li class="checklist-item">
        <input type="checkbox" id="item1" name="period" value="1">
        <label for="item1">Yes</label>
      </li>
    </ul>
</div>

   <!-- Submit button -->
   <button type="submit" class="btn btn-primary">Save</button>
  </form>

  <br><br><br><br><br><br><br><br><br><br>

</div>

<!-- include footer -->
<?php
include_once("templates/footer2.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the selected foods from the form
  $selectedFoods = isset($_POST['foods']) ? $_POST['foods'] : [];

  // Retrieve the selected symptoms from the form (likert scale values)
  $acneRating = $_POST['likert']; 
  $hairlossRating = $_POST['likert2']; 

  // Determine if the user had their period
  $period = isset($_POST['period']) ? $_POST['period'] : '0';

  // Retrieve the user's profileId (assuming it's stored in the session)
  $profileId = $_SESSION['profileId'];

  // Save the selected foods
  foreach ($selectedFoods as $food) {
    $query = "INSERT INTO FoodTracking (profileId, foodId, date) VALUES ('$profileId', '$food', CURDATE())";
    mysqli_query($connect, $query);
  }

  // Save the selected symptoms (likert scale values)
  $query = "INSERT INTO AcneTracking (profileId, value, date) VALUES ('$profileId', '$acneRating', CURDATE())";
  mysqli_query($connect, $query);
 
  $query = "INSERT INTO HairLossTracking (profileId, value, date) VALUES ('$profileId', '$hairlossRating', CURDATE())";
  mysqli_query($connect, $query);

  $query = "INSERT INTO HairGrowthTracking (profileId, value, date) VALUES ('$profileId', '$hairlossRating', CURDATE())";
  mysqli_query($connect, $query);
  
  // Save the period information
  $query = "INSERT INTO MenstruationTracking (profileId, status, date) VALUES ('$profileId', '$period', CURDATE())";
  mysqli_query($connect, $query);

  echo "Data saved successfully!";
}
  
  $connect->close();
?>
