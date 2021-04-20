
<?php

require_once 'database.php';

if(isset($_POST['submit_button'])){

    // get all values from form submitted using their names
    $username_or_email = $_POST['username']; // sends the data to the database to be checked
    $password = $_POST['password']; 


    // check if user exists in database
    $get_user_details = mysqli_query($connectionString,"SELECT * FROM informations WHERE `username`='{$username_or_email}'  AND `password` = '{$password}' LIMIT 1")or die(mysqli_error($connectionString));

    if(mysqli_num_rows($get_user_details) > 0){ //counts the number of rows in the database to see if any of them matches
        // user exists in the database

        $get_details = mysqli_fetch_array($get_user_details); // gets the users details takes the info from the database then put it in an array form
        $users_id = $get_details['user_id']; //array get keys...what should i use to seelect this

        setcookie("users_id",$users_id, time() + (86400 * 30), '/');// setcookie

        echo "<script>alert('Login Success');window.location.href='view_user.php'</script>"; // takes you in if succcefful
    }else{
        // user does not exist in the database
        echo "<script>alert('Login Failed');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <body>
      <div class="loginbox">
        <img src="../images/avatar1.png" class="avatar" />
        <h1>Login Here</h1>



        <form method="post">
          <p>Email/Username</p>
          <input required type="text" name="username" placeholder="Enter your Username or email" />
          <p>Password</p>
          <input required type="Password" name="password" placeholder="Enter your Password" />
          <button type="submit" name="submit_button">Sign In</button><br><br><br>
          <h3><a href="signup.php">Don't have an account?</a></h3>
        </form>
      </div>
    </body>
  </head>
</html>

