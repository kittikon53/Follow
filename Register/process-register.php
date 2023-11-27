<?php
// Include the database connection file
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $username_account = mysqli_real_escape_string($conn, $_POST['username_account']);
    $email_account = mysqli_real_escape_string($conn, $_POST['email_account']);
    
    // Check if passwords match
    $password_account1 = $_POST['password_account1'];
    $password_account2 = $_POST['password_account2'];

    if ($password_account1 != $password_account2) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Perform basic validation
        if (empty($username_account) || empty($email_account) || empty($password_account1)) {
            echo "Please fill in all the fields.";
        } else {
            // Check if the username or email already exists in the database
            $check_query = "SELECT * FROM account WHERE username_account='$username_account' OR email_account='$email_account'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "Username or email already exists. Please choose a different one.";
            } else {
                // Determine the role based on the username (e.g., admin if username contains 'admin')
                $role_account = (strpos($username_account, 'admin') !== false) ? 'admin' : 'user';

                // Insert the user into the database with the determined role
                $insert_query = "INSERT INTO account (username_account, email_account, password_account, role_account) VALUES ('$username_account', '$email_account', '$password_account1', '$role_account')";
                $insert_result = mysqli_query($conn, $insert_query);

                if ($insert_result) {
                    // Display a JavaScript alert and redirect to the login page
                    echo "<script>
                            alert('Registration successful. You can now login.');
                            window.location.href = 'http://localhost/HomePage-Edit1-main/Login/form-login.php';
                          </script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>
