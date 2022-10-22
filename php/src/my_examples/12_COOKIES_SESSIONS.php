<?php
/* ------------- Cookies ------------ */

/*
  Cookies are a mechanism for storing data in the remote browser and thus tracking or identifying return users. You can set specific data to be stored in the browser, and then retrieve it when the user visits the site again.
*/
// setcookie('foo', 'something', time() + 86400);

// if (isset($_COOKIE['foo'])) :
//   //remove the cookie value
//   // setcookie('foo', '', time() - 86400);
//   echo $_COOKIE['foo'] . '<br>';
// endif;
// echo "COOKIES!";

/*
  Sessions are a way to store information (in variables) to be used across multiple pages.
  Unlike cookies, sessions are stored on the server.
*/

 
    if(isset($_POST['submit'])):
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
      $pw = $_POST['password'];
      if($username === 'John' && $pw === 'password'):
        session_start();
        $_SESSION['username'] = $username;
        header('Location: /php-crash-main/extras/dashboard.php');
      else: 
        echo 'Incorrect login';
      endif;
    endif;
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
      <label for="username">UserName</label>
      <input type="text" name="username">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="text" name="password">
    </div>
    <input type="submit" name="submit" value="submit">
    </form>
    <?php 
    if(isset($_POST['submit'])):
      echo '<br>'. filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS) . '<br>';
      echo filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) . '<br>';
    endif;
    ?>

