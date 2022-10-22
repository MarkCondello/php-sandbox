<?php
/* ---------- File Handling --------- */

/* 
  File handling is the ability to read and write files on the server.
  PHP has built in functions for reading and writing files.
*/
// $file = 'php-crash-main/extras/users_list.txt';
// $file = 'php-crash-main/extras/users.txt';

// if (file_exists($file)) {
//   // echo readfile($file);
//   $handle = fopen($file, 'r');
//   $contents = fread($handle, filesize($file));
//   fclose($handle);
//   echo $contents;
// } else {
//   $handle = fopen($file, 'w');
//   $contents = 'Leo'. PHP_EOL . 'Jarvis' . PHP_EOL . 'Bosco';
//   fwrite($handle, $contents);
//   fclose($handle);
// }
// echo '<p>This script looks to open a file if it exists. If it does not, it will be created and populated with content.</p>';
$success = false;
if(isset($_POST['upload'])) {
  $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
  if(!empty($_FILES['upload']['name'])) {
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    $fileName = $_FILES['upload']['name'];
    $fileSize = $_FILES['upload']['size'];
    $fileTemp = $_FILES['upload']['tmp_name'];
    // Where we upload the file
    $target_dir = "uploads/${fileName}";
    $fileExt = explode('/', $_FILES['upload']['type']);
    $fileExt = strtolower(end($fileExt));

    if(in_array($fileExt, $allowed_ext)) {
      if ($fileSize <= 1000000) {
        move_uploaded_file($fileTemp, $target_dir);
        $success = true;
        $message = '<p style="color: green;">The file was uploaded.</p>';
      } else {
        $message = '<p style="color: red;">The file is too large.</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type.</p>';
    }
    // echo $fileExt;
  } else {
    $message = '<p style="color: red;">Please choose a file.</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File upload</title>
</head>
<body>
  <?php echo $message ?? null; 
  
    if (isset($target_dir) && $success) {
      echo '<img src="'.$target_dir.'" alt="'.$fileName.'" width="200"/>';
    }
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
    method="POST"
    enctype="multipart/form-data"
    >
    <!-- enctype is required for uploading files -->
    <div>
      <label>select image to upload</label>
      <input type='file' name='upload' />
    </div>
    <input type="submit" value="Upload file" name="upload">
  </form>
</body>
</html>