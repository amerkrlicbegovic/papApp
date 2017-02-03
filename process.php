<?php
$name = $_POST["name"];
$email = $_POST["email"];
$details = $_POST["details"];

echo "<pre>";
$email_body = "";
$email_body .= "Name; " . $name . "\n";
$email_body .= "Email; " . $email . "\n";
$email_body .= "Details; " . $details . "\n";
echo "$email_body";
echo "</pre>";


$pageTitle = "Thank you";
$selection = null;

include("inc/header.php") ?>
<div class="section page">
    <h1>Thank you</h1>
    <p>Thanks for the email!</p>
</div>


<?php include("inc/footer.php") ?>

