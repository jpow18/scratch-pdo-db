<?php
  $checkChoice = filter_input(INPUT_POST, 'checkchoice', FILTER_SANITIZE_SPECIAL_CHARS);
  $tableChoice = filter_input(INPUT_POST, "tablechoice", FILTER_SANITIZE_SPECIAL_CHARS);
  $columnChoice = filter_input(INPUT_POST, "columnchoice", FILTER_SANITIZE_SPECIAL_CHARS);
  $rowChoice = filter_input(INPUT_POST, "rowchoice", FILTER_SANITIZE_SPECIAL_CHARS);
  $valueChoice = filter_input(INPUT_POST, "valuechoice", FILTER_SANITIZE_SPECIAL_CHARS);
  include_once "./config/Database.php";
  var_dump($checkChoice);
  var_dump($tableChoice);
  var_dump($columnChoice);
  var_dump($valueChoice);
  // Conditional to build sql query/command
  if ($checkChoice && $tableChoice && $columnChoice && $valueChoice && $rowChoice) {
    switch($checkChoice) {
      case "insert":
        // first check if a row with same name already exists
        $check_sql = 'SELECT * FROM '.$tableChoice.' WHERE '.$columnChoice.' = ?';
        $check_stmt = $pdo->prepare($check_sql);
        $check_stmt->execute([$valueChoice]);
        $check_results = $check_stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($check_results);
        // If no matching rows were found, insert a new row
        if (empty($check_results)) {
          $sql = 'INSERT INTO '. $tableChoice .' ('.$columnChoice.') VALUES (?)';
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$valueChoice]);
          $stmt->closeCursor();
          break;
        } else {
          echo "<h1 style='text-align: center; color: red;'>Sorry, a row with that information already exists.</h1>";
          break;
        }
        break;
      
      case "select":
        $sql = "SELECT {$columnChoice} FROM {$tableChoice} WHERE Name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$rowChoice]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
          echo "<h2>{$rowChoice} {$columnChoice}: {$results[0][$columnChoice]}</h2>";
        }
        $stmt->closeCursor(); 
        break;
    }



}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL CRUD</title>
  <link rel="stylesheet" href="./css/main.css">
</head>

<body>

  <header>
    <h1>INSERT/SELECT/DELETE/UPDATE</h1>
  </header>
  <main>
    <form method="POST">
      <section class="checkbox">
        <label for="insert">Insert</label>
        <input type="checkbox" id="insert" name="checkchoice" value="insert">

        <label for="select">Select</label>
        <input type="checkbox" id="select" name="checkchoice" value="select">

        <label for="delete">Delete</label>
        <input type="checkbox" id="delete" name="checkchoice" value="delete">

        <label for="update">Update</label>
        <input type="checkbox" id="update" name="checkchoice" value="update">
      </section>

      <section class="text">
        <label for="table">Table</label>
        <input type="text" id="table" name="tablechoice" placeholder="country">

        <label for="row">Country Name</label>
        <input type="text" id="row" name="rowchoice" placeholder="Aruba">

        <label for="column">Column</label>
        <input type="text" id="column" name="columnchoice" placeholder="Population">

        <label for="value">Value</label>
        <input type="text" id="value" name="valuechoice" placeholder="100,000,999">
      </section>
      <input type="submit" value="submit">
    </form>
  </main>
  <footer>
    <p> Contact us at: createDBfromscratch@scratch.com</p>
    <p>copyright &copy 2023 Scratch</p>
  </footer>

</body>

</html>