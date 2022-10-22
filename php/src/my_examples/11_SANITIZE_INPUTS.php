<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sanitize inputs</title>
</head>
<body>
  <h1>Sanitize inputs</h1>
<?php 
    if(isset($_GET['name'])):
      echo '<br>'.$_GET['name'] . '<br>';
    endif;
    if(isset($_GET['age'])):
      echo $_GET['age'] . '<br>';
    endif;
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
      <label for="name">Name</label>
      <input type="text" name="name">
    </div>
    <div>
      <label for="age">Age</label>
      <input type="text" name="age">
    </div>
    <input type="submit" name="submit" value="submit">
    </form>
    <?php 
    if(isset($_POST['submit'])):
      echo '<br>'. filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) . '<br>';
      echo filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS) . '<br>';
    endif;
    ?>

<?php include 'footer.php'; ?>

</body>
</html>