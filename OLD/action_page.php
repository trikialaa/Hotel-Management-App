
<?php

require 'db.php';
session_start();
?>

<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$id = $conn->escape_string($_POST['username']);
$result = $conn->query("SELECT * FROM users WHERE id='$id'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo "User with that id doesn't exist!";

}
else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password']==$user['password'])  {

        $_SESSION['id'] = $user['id'];
        $_SESSION['Nom'] = $user['Nom'];
        $_SESSION['Prenom'] = $user['Prenom'];


        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        echo "welcome " .$user['Nom'] .' ' . $user['Prenom'] ;

    }
    else {
        echo  "You have entered wrong password, try again!";
        echo "password is " .$user['password'] .$_POST['password'] ;
         }
}

