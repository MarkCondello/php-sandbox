<?php
  include '../config/pdo.php';
  $sql = "SELECT * FROM tasks";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// //These are the defined authentication environment in the db service
// $host = 'db';
// // Database use name
// $user = 'MYSQL_USER';
// //database user password
// $pass = 'MYSQL_PASSWORD';
// //database name
// $db = 'MYSQL_DATABASE';
// // check the MySQL connection status
// // $conn = new mysqli($host, $user, $pass, $db);
// // if ($conn->connect_error) {
// //     die("Connection failed: " . $conn->connect_error);
// // } else {
// //     echo "Connected to MySQL server successfully!";
// // }
// $qry = "SELECT * FROM tasks";
// $res = $conn->query($qry);
// $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);

include './header.php';
?>

  <h1>Tasks</h1>
  <?php if(count($tasks)): ?>
 
    <ul>
      <?php foreach($tasks as $task):
       echo "<li>{$task['task']} | due {$task['due']}</li>";
      endforeach; ?>
    </ul>
<?php endif;
include '../partials/footer.php';
?>