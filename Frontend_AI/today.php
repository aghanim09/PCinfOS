<!-- include header -->
<?php
  $pageTitle = 'Profile';
  include_once("templates/header.php");
?>

<!-- form -->
<div class="container">

  <!-- eat today -->
  <h2>What did you eat today?</h2>
    <ul class="checklist">
      <li class="checklist-item">
        <input type="checkbox" id="item1" name="item1">
        <label for="item1">Chickpeas</label>
      </li>
      <li class="checklist-item">
        <input type="checkbox" id="item2" name="item2">
        <label for="item2">Salmon</label>
      </li>
      <li class="checklist-item">
        <input type="checkbox" id="item3" name="item3">
        <label for="item3">Grapefruit</label>
      </li>
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
        <input type="checkbox" id="item1" name="item1">
        <label for="item1">Yes</label>
      </li> 
    </ul>

  <!-- Submit button -->
  <div class="button-right">
      <button type="submit" class="btn btn-outline-secondary">
        <a href="progress.php">Next</a>
      </button>
  </div>
</div><br><br><br>

<!-- include footer -->  
<?php
  $pageTitle = 'Profile';
  include_once( "templates/footer2.php" );
?>

<!-- Likert scale -->  
<script>
    const likertInputs = document.querySelectorAll('.likert-scale input[type="radio"]');
  
  likertInputs.forEach(input => {
    input.addEventListener('change', () => {
      console.log('Selected value:', input.value);
    });
  });
</script>