<!-- include header -->
<?php
  $pageTitle = 'Profile';
  include_once( "templates/header.php" );
?>

<!-- suggestions -->
<div class="container">
  <h2>Food suggestions for you</h2><br>

  <!-- table -->
  <table class="table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Cart</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Path to the run_model.py script
        $runModelScript = 'C:\xampp\htdocs\final_frontend\PCOS_AI\run_model.py';

        // Path to the CSV file (you can provide a default file or an empty file)
        $csvFile = 'C:\xampp\htdocs\final_frontend\PCOS_AI\empty.csv';

        // User input (you can provide a default value or an empty string)
        $userInput = '';

        // Construct the command to execute the run_model.py script with the user input and CSV file
        $command = 'python3 ' . $runModelScript . ' "' . $csvFile . '" "' . $userInput . '"';

        // Execute the command and capture the output
        $output = shell_exec($command);

        // Parse the output to retrieve the food recommendations
        $recommendations = json_decode($output, true);

        // Check if any recommendations are found
        if (!empty($recommendations)) {
          // Iterate over the recommendations array and generate table rows
          foreach ($recommendations as $recommendation) {
            $item = $recommendation['item'];
            $quantity = $recommendation['quantity'];

            echo '<tr>';
            echo '<td>' . $item . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td><button class="btn btn-outline-secondary">Add to Cart</button></td>';
            echo '</tr>';
          }
        } else {
          // No recommendations found
          echo '<tr><td colspan="3">No recommendations found</td></tr>';
        }
      ?>
    </tbody>
  </table>
</div>

<!-- include footer -->
<?php
  $pageTitle = 'Profile';
  include_once( "templates/footer2.php" );
?>




<!-- 
  <table class="table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th> Cart</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Chickpeas</td>
        <td>100 grams</td>
        <td><button class="btn btn-outline-secondary">Add to Cart</button></td>
      </tr>
      <tr>
        <td>Salmon</td>
        <td>300 grams</td>
        <td><button class="btn btn-outline-secondary">Add to Cart</button></td>
      </tr>
      <tr>
        <td>Grapefruit</td>
        <td>200 grams</td>
        <td><button class="btn btn-outline-secondary">Add to Cart</button></td>
      </tr>

    </tbody>
  </table> -->
