<?php

include("connection.php");

// if the submit button is pressed...

if (isset($_POST['Submit'])) {

    // grabbing the form data (trimming any whitespace from beginning and end of string)

    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $telephone = trim($_POST["telephone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // initialising variables

    $fn_error = "";
    $ln_error = "";
    $email_error = "";
    $phone_error = "";
    $subject_error = "";
    $msg_error = "";
    $is_errors = false;

    // VALIDATION STAGE: if any errors arise, the boolean $is_errors is set to true, preventing the data from being sent to the database (see line 84)
    
    // first name validation

    if (empty($first_name)) {
        $fn_error = "<p class='error'>Please enter your first name!</p>";
        $is_errors = true;
    } 
    
    // last name validation

    if (empty($last_name)) {
        $ln_error = "<p class='error'>Please enter your last name!</p>";
        $is_errors = true;
    }
    
    // email validation, checks if empty, then validates using regular expression

    if (empty($email)) {
        $email_error = "<p class='error'>Please enter your email!</p>";
        $is_errors = true;
    } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
        $email_error = "<p class='error'>Please enter a valid email (abc@example.com)!</p>";
        $is_errors = true;
    }
    
    // telephone validation, checks if empty, then checks the value is numeric, then checks the length (max length: 11)

    if (empty($telephone)) {
        $phone_error = "<p class='error'>Please enter your telephone number!</p>";
        $is_errors = true;
    } else if (!is_numeric($telephone)) {
        $phone_error = "<p class='error'>Please enter a valid telephone number (numeric values only)</p>";
        $is_errors = true;
    } else if (strlen($telephone) > 11) {
        $phone_error = "<p class='error'>Please enter a valid telephone number (max length: 11)</p>";
        $is_errors = true;
    }

    // subject validation

    if (empty($subject)) {
        $subject_error = "<p class='error'>Please select a subject!</p>";
        $is_errors = true;
    }

    // message validation

    if (empty($message)) {
        $msg_error = "<p class='error'>Please enter a message!</p>";
        $is_errors = true;
    }

    // if there are no errors, submit the form data to the database
    // also using prepared statements to mitigate SQLi attacks

    if (!$is_errors) {
        try {
            $sql = $db->prepare("INSERT INTO messages (first_name, last_name, email, telephone, msg_subject, msg) 
                                VALUES (?, ?, ?, ?, ?, ?);");
            $sql->bindParam(1, $first_name, PDO::PARAM_STR);
            $sql->bindParam(2, $last_name, PDO::PARAM_STR);
            $sql->bindParam(3, $email, PDO::PARAM_STR);
            $sql->bindParam(4, $telephone, PDO::PARAM_STR);
            $sql->bindParam(5, $subject, PDO::PARAM_STR);
            $sql->bindParam(6, $message, PDO::PARAM_STR);
            $sql->execute(); 
            echo "<p class='success'>Your form has been submitted successfully!</p>";
        } catch (Exception $e) {
            echo "bad query";
        }
    }
}
?>