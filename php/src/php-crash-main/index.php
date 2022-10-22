<?php
echo "Hello from php8.0 apache container...";

// print_r(phpinfo());
echo '<hr>';

//These are the defined authentication environment in the db service
// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

//database name
$db = 'MYSQL_DATABASE';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $db);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected to MySQL server successfully!";
// }
$sql = 'SELECT * FROM users';
$users = [];
if ($result = $conn->query($sql)) {
  while ($data = $result->fetch_object()) {
    $users[] = $data;
  }
}
// print_r($users);
if (count($users)) {
echo "<h2>".count($users)." Condello Boys</h2>
   <ul>";
foreach ($users as $user) {
  echo "<li>{$user->name} - {$user->email} - {$user->created_at}</li>";
}
echo '</ul>';
}
?>