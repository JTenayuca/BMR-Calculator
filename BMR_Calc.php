<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>BMR Calculator</title>
  </head>
  <body>
      <?php
      $Description = "BMR Calculator!";
      function BMR_Calc($Gender, $Height, $Weight, $Age) {
        if ($Gender == "M") {
          $BMR = 66.47 + (6.24 * $Weight) + (12.7 * $Height) - (6.755 * $Age);
          echo "<p>Your BMR is $BMR calories per day</p>";
          //Add daily calorie needs based on activity level
        }
        elseif ($Gender == "F") {
            $BMR = 655.1 + (4.35 * $Weight) + (4.7 * $Height) - (4.7 * $Age);
            echo "<p>Your BMR is $BMR calories per day</p>";
        }
        else {
            echo "<p>Please select a valid value for gender";
            //Add daily calorie needs based on activity level
        }

      };

      ?>
      
    <h1><?php echo $Description ?></h1>
    <form action="BMR_Calc.php" method="post">
      <p>
        Gender: <input type="radio" name="Gender" value="M" />M
        <input type="radio" name="Gender" value="F" />F
      </p>
      <p>
        Height: <input type="number" name="height_feet" /> ft
        <input type="number" name="height_inches" /> inches
      </p>
      <p>Weight: <input type="number" name="weight" /> lbs</p>
      <p>Age: <input type="number" name="age" /> years</p>
      <p><input type="submit" name="submit" value="Calculate" /></p>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Form validation
            if(isset($_POST["Gender"], $_POST["height_feet"], $_POST["height_inches"], $_POST["weight"], 
            $_POST["age"]) && is_numeric($_POST["height_feet"]) && is_numeric($_POST["height_inches"]) && is_numeric($_POST["weight"]) 
            && is_numeric($_POST["age"])) {
                //Call the method to make the appropriate calculation
                $Gender = $_POST["Gender"];
                $Height = ($_POST["height_feet"] * 12) + $_POST["height_inches"];
                $Weight = $_POST["weight"];
                $Age = $_POST["age"];

              BMR_Calc($Gender, $Height, $Weight, $Age);

            } else {
              echo "<p>Please make sure you have entered valid values and that you have selected a gender</p>";
            }
        }
        ?>
  </body>
</html>
