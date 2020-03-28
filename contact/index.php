<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Declare variables
    $name = "";
    $company = "";
    $message = "";

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'chabot.tristan@gmail.com';                     // SMTP username
    $mail->Password   = 'Oilers12101119';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('chabot.tristan@gmail.com', $name);
    $mail->addAddress('chabot.tristan@gmail.com', 'Bubba');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Portfolio Contact' . $company;
    $mail->Body    = $message;

    //$mail->send();
    $mail->smtpClose();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    <form>
        <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput" required maxlength="25" minlength="1"
                   placeholder="Bubba Chabot">
        </div>

<!--        <div class="form-group">-->
<!--            <label for="emailInput">Email</label>-->
<!--            <input type="email" class="form-control" id="emailInput" required placeholder="example@mail.com">-->
<!--        </div>-->

        <div class="form-group">
            <label for="orgInput">Organization</label>
            <input type="text" class="form-control" id="orgInput" required maxlength="25" minlength="1"
                   placeholder="SpaceX">
        </div>

        <div class="form-group">
            <label for="msgInput">Message</label>
            <textarea class="form-control" id="msgInput" maxlength="1000" placeholder="Got some questions?"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" onclick="">Submit</button>
    </form>
</div>
</body>
</html>