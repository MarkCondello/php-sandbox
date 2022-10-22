<?php 
// include '../config/database.php';
$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = '';
// Form submit
if (isset($_POST['submit'])) {
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required please...';
  } else {
    $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if (empty($_POST['body'])) {
    $bodyErr = 'Body is required';
  } else {
    $body = filter_input( INPUT_POST,'body',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
    include '../config/pdo.php';
    $sql = "INSERT INTO feedback (name, email, body) VALUES (:name, :email, :body)";
    try {
      $stmt = $pdo->prepare($sql);
      $qry = $stmt->execute([
        'name' => $name,
        'email' => $email,
        'body' => $body
      ]);
      header('Location: feedback.php');
    } catch (Exception $e) {
      echo "Unsuccessful: $e";
    }
    // MYSQLI VERSION BELOW
    // $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
    // if (mysqli_query($conn, $sql)) {
    //   header('Location: feedback.php');
    // } else {
    //   echo 'Error: ' . mysqli_error($conn);
    // }
  }
}
include './header.php';
?>
  <img src="/img/logo.png" class=" mb-3" alt="" width="20">
  <h2><a href="./feedback.php">Feedback</a></h2>
  <?php echo isset($name) ? $name : ''; ?>
  <p class="lead text-center">Leave feedback for Traversy Media</p>

  <form method="POST" action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
  ); ?>" class="mt-4 w-75">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control <?= !$nameErr ?:
        'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
      <div id="validationServerFeedback" class="invalid-feedback">
      <?= $nameErr ?: null ?>
    </div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control <?php echo !$emailErr ?:
        'is-invalid'; ?>" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
      <div id="validationServerFeedbackEmail" class="invalid-feedback">
        Please provide a valid email.
      </div>
  </div>
    <div class="mb-3">
      <label for="body" class="form-label">Feedback</label>
      <textarea class="form-control <?php echo !$bodyErr ?:
        'is-invalid'; ?>" id="body" name="body" placeholder="Enter your feedback"><?php echo $body; ?></textarea>
    <div id="validationServerFeedbackBody" class="invalid-feedback">
        Please provide feedback.
      </div> 
  </div>
    <div class="mb-3">
      <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
    </div>
  </form>
<?php include '../partials/footer.php'; ?>
