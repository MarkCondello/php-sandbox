<?php
if (isset($_POST['task']) && !empty($_POST['task'])) {
  $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
  $taskErr = 'A task must be included..';
}
if (isset($_POST['due'])  && !empty($_POST['due'])) {
  $due = filter_input(INPUT_POST, 'due', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
  $dueErr = 'A due date must be included..';
}
if (isset($task) && isset($due)) {
  include '../config/pdo.php';
// die($due);
  $sql = "INSERT INTO tasks (task, due) VALUES (:task, :due)";
  $qry = $pdo->prepare($sql)->execute([
    'task' => $task,
    'due' => $due
  ]);
  if ($qry) {
    header('Location: task-list.php');
  } else {
    echo "Unsuccesfull";
  }
  // $conn = new mysqli('db', 'MYSQL_USER', 'MYSQL_PASSWORD', 'MYSQL_DATABASE');
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // } else {
  //   $qry = "INSERT INTO tasks (name, due) VALUES ('$task', '$due')";
  //   if (mysqli_query($conn, $qry)) {
  //     header('Location: task-list.php');
  //   } else {
  //     echo "Unsuccesfull" .  mysqli_error($conn);;
  //   }
  // }
}

include './header.php';
?>
  <h1>Create A Task</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <div class="mb-3">
    <label for="task" class="form-label">Task</label>
    <input type="text"
      class="form-control <?php echo !$taskErr ?: 'is-invalid'; ?>"
      id="task" name="task"
      placeholder="Enter your task"
      value="<?php echo $task ?? null; ?>"
    >
    <div id="validationServerFeedbackEmail" class="invalid-feedback">
      <?= $taskErr ?? null ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="due" class="form-label">Due</label>
    <input type="date"
      class="form-control <?php echo !$dueErr ?: 'is-invalid'; ?>"
      id="due" name="due"
      placeholder="Enter your due date"
      value="<?php echo $due?? null; ?>"
    >
    <div id="validationServerFeedbackEmail" class="invalid-feedback">
      <?= $dueErr ?? null ?>
    </div>
  </div>
  <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
</form>
<!-- 
  CREATE THE FORM MARKUP,
  POST THE FORM TO PHP_SELF,
  CHECK THE NAME AND DUE VALUES EXIST,
  FILTER THE VALUES WITH PHP,
  THEN POST THE VALUES TO SQL
  PROVIDE FEEDBACK FOR SUCCESS OR FAILURE
-->
<?php
include '../partials/footer.php';
?>
