<?php
  $checkChoice = filter_input(INPUT_POST, 'checkchoice', FILTER_SANITIZE_SPECIAL_CHARS);
  $tableChoice = filter_input(INPUT_POST, "tablechoice", FILTER_SANITIZE_SPECIAL_CHARS);
  $columnChoice = filter_input(INPUT_POST, "columnchoice", FILTER_SANITIZE_SPECIAL_CHARS);
  $valueChoice = filter_input(INPUT_POST, "value_choice", FILTER_SANITIZE_SPECIAL_CHARS);
  include_once "./config/Database.php";

  


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