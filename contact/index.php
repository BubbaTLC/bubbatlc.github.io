<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Declare variables
$name = isset($_POST['nameInput']) ? htmlentities($_POST['nameInput']) : "Name not given";
$nameIsSet = !isset($_POST['nameInput']);
$org = isset($_POST['orgInput']) ? htmlentities($_POST['orgInput']) : "Company not given";
$orgIsSet = !isset($_POST['orgInput']);
$message = isset($_POST['msgInput']) ? htmlentities($_POST['msgInput']) : "Message not given";
$messageIsSet = !isset($_POST['msgInput']);

$isPosted = $_SERVER['REQUEST_METHOD'] == 'POST';
$mail = new PHPMailer(true);

if ($isPosted && $nameIsSet && $orgIsSet && $messageIsSet) {
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                             // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                     // Enable SMTP authentication
        //$mail->Username = '${{ secrets.senderEmail }}';             // SMTP username
        //$mail->Password = '${{ secrets.password }}';                // SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
//        $mail->setFrom('${{ secrets.senderEmail }}', $name);
//        $mail->addAddress('${{ secrets.receiverEmail }}', 'Bubba');      // Add a recipient

        // Content
        $mail->isHTML(true);                                                     // Set email format to HTML
        $mail->Subject = 'Portfolio Contact' . $orgIsSet;
        $mail->Body = $message;

        //$mail->send();
        $mail->smtpClose();

        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <!-- https://bootswatch.com themes: cerulean cosmo cyborg darkly flatly journal litera lumen lux
	materia	minty pulse sandstone simplex sketchy slate solar spacelab superhero united yeti -->
    <link rel="stylesheet" href="../bootstrap.min.lux.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="../images/favicons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="../images/favicons/source-code-icon-152-213242.png">
    <title>Tristan Chabot Projects</title>
</head>
<body>
<div id="navigation">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand">Tristan Chabot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../resume">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../projects">Projects</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../contact">Contact <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="navbar-nav my-2 my-lg-0">
                <a href="https://github.com/BubbaTLC" class="nav-link mr-sm-2">GitHub <i
                            class="fab fa-github fa-lg"></i></a>
                <a href="https://www.linkedin.com/in/tristan-chabot-2b9319181" class="nav-link mr-sm-2">LinkedIn <i
                            class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>
    </nav>
</div>

<div class="container-sm" id="contact" style="padding-top: 150px">
    <form method="post" class="needs-validation" novalidate>
        <div class="form-group has-danger">
            <label class="form-control-label" for="nameInput">Name</label>
            <?php if ($isPosted && !$orgIsSet) { ?>
                <input type="text" class="form-control is-invalid" name="nameInput" id="nameInput" required
                       maxlength="25"
                       minlength="1"
                       placeholder="Bubba Chabot">
                <div class="invalid-feedback">Please specify a name.</div>
            <?php } else { ?>
                <input type="text" class="form-control" name="nameInput" id="nameInput" required maxlength="25"
                       minlength="1"
                       placeholder="Bubba Chabot">
            <?php } ?>
            <!--            <span class="text-danger">Please specify a name.</span>-->
        </div>

        <div class="form-group">
            <label class="form-control-label" for="orgInput">Organization</label>
            <?php if ($isPosted && !$orgIsSet) { ?>
                <input type="text" class="form-control is-invalid" name="orgInput" id="orgInput" required maxlength="25"
                       minlength="1"
                       placeholder="SpaceX">
                <span class="text-danger">Please specify an organization.</span>
            <?php } else { ?>
                <input type="text" class="form-control" name="orgInput" id="orgInput" required maxlength="25"
                       minlength="1"
                       placeholder="SpaceX">
            <?php } ?>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="msgInput">Message</label>
            <?php if ($isPosted && !$orgIsSet) { ?>
                <textarea class="form-control is-invalid" id="msgInput" name="msgInput" required maxlength="1000"
                          placeholder="Got some questions?"></textarea>
                <span class="text-danger">Please say something nice.</span>
            <?php } else { ?>
                <textarea class="form-control" id="msgInput" name="msgInput" required maxlength="1000"
                          placeholder="Got some questions?"></textarea>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    var_dump($_POST);
    ?>
</div>
</bod>
</html>
