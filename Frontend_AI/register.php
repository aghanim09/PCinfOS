<?php
$pageTitle = 'register';
include_once("templates/header.php");
?>

<!-- Register -->
<div class="container">
  <h2>Registration</h2>
  <form>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter your password">
    </div>
    <div class="button-right">
      <button type="submit" class="btn btn-outline-secondary">
        <a href="info.php">Register</a>
      </button>
    </div>
  </form>
</div>

<!--include footer-->
<?php
include_once("templates/footer.php");
?>



