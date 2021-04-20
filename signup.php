
<?php

require_once 'database.php'; // copy the contents of db.php come here

if(isset($_POST['submit_button'])){ // if some values dey there or if somebody press the submit button 

    // get all values from form submitted using their names
    $fname = $_POST['fname'];// getting data from submitted form
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];// not compulsory for the names to add up


    // insert into database now
    $add_user = mysqli_query($connectionString,"INSERT INTO `informations` (`user_id`, `fname`, `lname`, `username`, `email`, `password`, `timestamp`) VALUES (NULL, '{$fname}', '{$lname}', '{$username}', '{$email}', '{$password}', current_timestamp())") or die(mysqli_error($connectionString));//or die throws an error when there is an error in the connection string
//get something or put something into the database
//connection string ties appllication to the application to the database
//tick is advisable to use instead of the single quotation
//them for add to each other
    if($add_user) {
        echo "<script>alert('Sign Up Successful');window.location.href='login.php';</script>";//if sign up is succesful
    }else{
        echo "<script>alert('Sorry, Error Occured')"; //else this occurs
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign-up Form Design</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <body>
      <div class="Sign-upbox">
        <img src="../images/avatar1.png" class="avatar" />
        <h1>Sign-up Here</h1>
        
          <form method="post">
          
        <input required type="text" name="fname" placeholder="First Name">
        <input required type="text" name="lname" placeholder="Last Name">
        <input required type="text" name="username" placeholder="UserName">
        <input required type="email" name="email" placeholder="Email">
        <input required type="password" name="password" placeholder="Password">
        <button type="submit" name="submit_button">Sign-Up</button><br><br><br>
        
        <h3><a href="login.php">Already have an account?</a></h3>


        </form>
      </div>
    </body>
  </head>
</html>


