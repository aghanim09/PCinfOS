<!-- include header -->
<?php
  $pageTitle = 'Profile';
  include_once( "templates/header.php" );
?>

<!-- graph -->
<div class="graph-container">
  <h2> Keep track of your progress! </h2><br>
      <canvas id="line-chart" width="100%" height="80px"></canvas>
</div>

<!-- include footer -->  
<?php
  $pageTitle = 'Profile';
  include_once( "templates/footer2.php" );
?>

<!-- graph script -->  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>