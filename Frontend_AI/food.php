<!--include header-->
<?php
  $pageTitle = 'Home';
  include_once( "templates/header.php" );
?>

<!--form-->
<div class="container">
       
       <!-- Food preference selection -->
    <div class="form-group">
      <label for="diet"> Diet:</label>
        <select class="form-control" id="diet" name="diet">
            <option value="">Select an option</option>
            <option value="none">None</option>
            <option value="vegan">Vegan</option>
            <option value="keto">Keto</option>
            <option value="gluten-free">Gluten-free</option>
            <option value="paleo">Paleo</option>
            <option value="vegetarian">Vegetarian</option>
        </select>
    </div>

    <!-- Food allergy selection -->
    <div class="form-group">
      <label for="food-allergies">Food Allergies:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gluten" value="gluten">
            <label class="form-check-label" for="gluten">Gluten</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="dairy" value="dairy">
            <label class="form-check-label" for="dairy">Dairy</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="peanuts" value="peanuts">
            <label class="form-check-label" for="peanuts">Peanuts</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="tree-nuts" value="tree-nuts">
            <label class="form-check-label" for="tree-nuts">Tree Nuts</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="soy" value="soy">
            <label class="form-check-label" for="soy">Soy</label>
        </div>
    </div>

    <!-- Main Symptoms selection -->
    <div class="form-group">
      <label for="main-symptoms">Main Symptoms:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="no-menstruation" value="no-menstruation">
            <label class="form-check-label" for="no-menstruation">No Menstruation</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="hairloss" value="hairloss">
            <label class="form-check-label" for="hairloss">Hair Loss</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="acne" value="acne">
            <label class="form-check-label" for="acne">Acne</label>
    </div>

    <!-- Submit button -->
    <div class="button-right">
        <button type="submit" class="btn btn-outline-secondary">
          <a href="suggestions.php">Next</a>
        </button>
    </div>
</div>