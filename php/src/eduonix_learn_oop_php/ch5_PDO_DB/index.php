<?php 
require 'classes/database.php';
$database = new Database;
/*
$database->query("SELECT * FROM posts");
$database->execute();
$results = $database->resultset();
 echo "Result";
  echo "<pre>";
print_r($results);
"</pre>";   */
if(isset($_POST['delete'])){
    $post_id =  $_POST['delete_id'];
    $database->query('DELETE FROM posts WHERE id = :id');
    $database->bind(':id', $post_id);
    $database->execute();
}

//sanitize the data which is sent from the form
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
/* if($database->lastInsertId()){
    echo "<p>Post added</p>";
}   */
if(isset($post['submit']) && !empty($post['id'])){
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    // check to see if the id exists (otherwise it was deleted)
    $database->query("SELECT * FROM posts WHERE id = :id");
    $database->bind(':id', $id, PDO::PARAM_INT);
    $database->execute();
    $result = $database->resultset();
    // if there are results with that id, update
    if(count($result)):
        $database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id'  );
        $database->bind(':title', $title, PDO::PARAM_STR);
        $database->bind(':body', $body, PDO::PARAM_STR);
        $database->bind(':id', $id, PDO::PARAM_INT);
        $database->execute();
    //else insert data into the id selected
    else:
        $database->query('INSERT INTO posts(id, title, body) VALUES (:id, :title, :body)');
        $database->bind(':id', $id, PDO::PARAM_INT);
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        $database->execute();
    endif;
  
  } else if(isset($post['submit']) && empty($post['id'])){
    $title = $post['title'];
    $body = $post['body'];
    $database->query('INSERT INTO posts(title, body) VALUES (:title, :body)');
    $database->bind(':title', $title);
    $database->bind(':body', $body);
    $database->execute();
  }  
?>
<h1>Add Posts</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div>
        <label for="id">Post ID</label> 
        <input type="number" name="id"/> 
    </div>
    <div>
        <label for="title">Post title</label> 
        <input type="text" name="title" placeholder="Add a Title"/> 
    </div>
    <div>
        <label for="body">Post content</label> 
        <textarea name="body"></textarea>
    </div>
    <input type="submit" name="submit" value="Submit" />
</form>
<h1>Posts</h1>
<div>
<?php
$database->query("SELECT * FROM posts");
$rows = $database->resultset();
foreach($rows as $row): ?>
    <div>
        <h3><?php echo $row['title']; ?> | post id: <?php echo $row['id']; ?></h3>
        <p><?php echo $row['body']; ?></p>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"/>
            <input type="submit" name="delete" value ="DELETE" /> 
        </form>
    </div>
<?php endforeach; ?>
</div>