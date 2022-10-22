<?php
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'MYSQL_ROOT_PASSWORD');
define('DB_NAME', 'MYSQL_DATABASE');

try {
  $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
  $pdo = new PDO($dsn, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // sets PDO to fetch data as an object
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // removed the emulated value so we use params for sql attributes like LIMIT
} catch (Exception $e) {
  die('Caught exception: '. $e->getMessage());
}

//select create update delete
$select = "SELECT * FROM posts WHERE is_published = :published AND author LIKE :author";
$stmt = $pdo->prepare($select);
$stmt->execute(['published' => true, 'author' => '%john%']);
$posts = $stmt->fetchAll();
foreach($posts as $post ) {
  echo "<p>".$post->body."</p>";
}
echo '<br><hr>';
$title = 'New one';
// $create = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
// $stmnt = $pdo->prepare($create);
// $stmnt->execute(['title' => 'New one', 'body' => 'New one body content', 'author' => 'Simone']);
// echo "Post added";

// $update = "UPDATE posts SET title = :title, body = :body WHERE title = :oldTitle";
// $state = $pdo->prepare($update);
// $state->execute([
//   'title' => $title . ' fooo..',
//   'body' => 'barr',
//   'oldTitle' => $title
// ]);
// echo "Post updated";

$delete = "DELETE FROM posts WHERE title = :title";
$pdo->prepare($delete)->execute(['title' => 'Blog 123']);
// $statement = $pdo->prepare($delete);
// $statement->execute(['title' => $title . ' fooo..']);
echo "Post Deleted";


// LIKE OPERATOR
// $search = '%post%';
// $sql = "SELECT * FROM posts WHERE title LIKE :name";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['name' => $search]);
// $posts = $stmt->fetchAll();
// foreach($posts as $post) {
//   echo '<p>'.$post->title . '-' . $post->author . '</p>';
// }

// DELETE DATA
// $sql = "DELETE from posts WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([
//   'id' => 5,
// ]);
// echo 'Post Deleted';

// // UPDATE DATA
// $title = 'New post updated';
// $body = 'This is the updated new post content ..';
// $author = 'Jamison';

// $sql = "UPDATE posts SET title = :title, body = :body, author = :author WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([
//   'id' => 5,
//   'title' => $title,
//   'body' => $body,
//   'author' => $author,
// ]);
// echo 'Post Updated';

// INSERT DATA
// $title = 'New post';
// $body = 'This is new post content..';
// $author = 'James';
// $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([
//   'title' => $title,
//   'body' => $body,
//   'author' => $author
// ]);
// echo 'Post Added';

// GET ROW COUNT
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
// $stmt->execute(['John Doe']);
// $postCount = $stmt->rowCount();
// echo $postCount;

// SINGLE QUERY
// $qry = "SELECT * FROM posts WHERE id = :id LIMIT 1";
// $stmt = $pdo->prepare($qry);
// $stmt->execute(['id'=> 4]);
// $post = $stmt->fetch(PDO::FETCH_ASSOC);
// echo '<p>'.$post['title'] . '-' . $post['body'] . '-' .  $post['created_at'] .'-' .  $post['author'] .'</p>';

// POSITIONAL PARAMS
// $author = 'John Doe';
// // $qry = "SELECT * FROM posts WHERE author = ?";
// $qry = "SELECT * FROM posts WHERE author = :author && is_published = :isPublished LIMIT :limit";
// //  die($qry);
// $stmt = $pdo->prepare($qry);
// // $stmt->execute([$author]);
// $stmt->execute([
//   'author' => $author,
//   'isPublished' => true,
//   'limit' => 1
// ]);
// $posts = $stmt->fetchAll();
// foreach($posts as $post) {
//   echo '<p>'.$post->title . '-' . $post->author . '</p>';
// }

#PDO QUERY
// $stmt = $pdo->query('SELECT * FROM posts');
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   echo '<p>'.$row['title'] . '-' . $row['author'] . '</p>';
// }
// while($row = $stmt->fetch()) {
//   echo '<p>'.$row->title . '-' . $row->created_at . '</p>';
// }

// print_r($stmt);
// if ($conn->connect_error) {
//   die('Connection failed: ' . $conn->connect_error);
// }


// https://www.youtube.com/watch?v=kEW6f7Pilc4