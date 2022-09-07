<?php
include("validation.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>

<body>
    <div class="form-container">
        <form method="post" name="contact_form" id="contact_form">

            <div class="form-element">
                <h1 class="form-title">Contact Form</h1>
                <label class="element-label" for="first_name">First Name:</label><br/>
                <div class="input">
                    <input class="input-field" type="text" name="first_name" id="first_name"
                        placeholder="Enter your first name..." value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : ''; ?>"/> 
                    <?php if(!empty($fn_error)) {
                        echo $fn_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="form-element">
                <label class="element-label" for="last_name">Last Name:</label>
                <div class="input">
                    <input class="input-field" type="text" name="last_name" id="last_name"
                        placeholder="Enter your last name..." value="<?php echo isset($_POST["last_name"]) ? $_POST["last_name"] : ''; ?>"/> 
                    <?php if(!empty($ln_error)) {
                        echo $ln_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="form-element">
                <label class="element-label" for="email">Email:</label>
                <div class="input">
                    <input class="input-field" type="text" name="email" id="email"
                        placeholder="Enter your email address..." value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"/> 
                    <?php if(!empty($email_error)) {
                        echo $email_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="form-element">
                <label class="element-label" for="telephone">Telephone:</label>
                <div class="input">
                    <input class="input-field" type="text" name="telephone" id="telephone" 
                        placeholder="Enter your telephone number..." value="<?php echo isset($_POST["telephone"]) ? $_POST["telephone"] : ''; ?>"/> 
                    <?php if(!empty($phone_error)) {
                        echo $phone_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="form-element">
                <label class="element-label" for="subject">Subject:</label>
                <div class="input">
                    <select class="drop-down" id="subject" name="subject">
                        <option value="">Select one...</option>
                        <option value="Enquiry">Enquiry</option>
                        <option value="Callback">Callback</option>
                        <option value="Complaint">Complaint</option> 
                    </select> 
                    <?php if(!empty($subject_error)) {
                        echo $subject_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="form-element">
                <label class="element-label" for="message">Message:</label>
                <div class="input">
                    <textarea name="message" id="message" form="contact_form" class="text-container"
                        placeholder="Enter your message..." rows="10" ><?php echo isset($_POST["message"]) ? $_POST["message"] : ''; ?></textarea> 
                    <?php if(!empty($msg_error)) {
                        echo $msg_error;
                    } else {
                        echo "<br/><br/>";
                    }?>
                </div> 
            </div>

            <div class="submit-button"></div>
                <input class="submit" type="submit" name="Submit" value="Submit"/>
            </div>

        </form>
    </div>
</body>

</html>