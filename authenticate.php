<?php
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the email and password fields!');
} else {
    session_start();
    include "config.php";
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare("SELECT id, CONCAT(name,' ',middlename,' ',lastname) as name, email, password, userlevel FROM tbl_accounts WHERE email = ?")) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $password, $userlevel);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = $name;
                $_SESSION['id'] = $id;
                $_SESSION['userlevel'] = $userlevel;
                header('Location: home.php');
            } else {
                // Incorrect password
                echo 'Incorrect email and/or password!111';
            }
        } else {
            // Incorrect username
            echo 'Incorrect email and/or password!222';
        }
    }
}
?>
