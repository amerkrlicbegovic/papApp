<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $details = trim(filter_input(INPUT_POST, "details", FILTER_SANITIZE_SPECIAL_CHARS));

    if ($name == "" || $email == "" || $details == "") {
        echo "Please fill out the form in a corect way!";
        exit;
    }

    if ($_POST["address"] != "") {
        echo "Bad robot";
        exit;
    }

    require("inc/phpmailer/class.phpmailer.php");

    $mail = new PHPMailer;

    if (!$mail->ValidateAddress($email)) {
        echo "Invalid Email Adress";
        exit;
    }


    $email_body = "";
    $email_body .= "Name " . $name . "\n";
    $email_body .= "Email " . $email . "\n";
    $email_body .= "Details " . $details . "\n";


    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

    $mail->isHTML(false);                                  // Set email format to HTML

    $mail->Subject = 'Personal media library' . $name;
    $mail->Body = $email_body;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }

    header("location:suggest.php?status=thanks");

}
$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("inc/header.php"); ?>

    <div class="section page">
        <div class="wrapper">
            <h1>Suggest a Media Item</h1>
            <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
                echo "<p>Thanks for the email!</p>";
            } else { ?>
                <p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an
                    email.</p>
                <form method="post" action="suggest.php">
                    <table>
                        <tr>
                            <th><label for="name">Name</label></th>
                            <td><input type="text" id="name" name="name"/></td>
                        </tr>
                        <tr>
                            <th><label for="email">Email</label></th>
                            <td><input type="text" id="email" name="email"/></td>
                        </tr>
                        <tr>
                            <th><label for="name">Suggest Item Details</label></th>
                            <td><textarea name="details" id="details"></textarea></td>
                        </tr>
                        <tr style="display:none">
                            <th><label for="address">Address</label></th>
                            <td><textarea name="address" id="address"></textarea></td>
                            <p>Please leve this feald blank</p>
                        </tr>
                    </table>
                    <input type="submit" value="Send"/>
                </form>
            <?php } ?>
        </div>
    </div>

<?php include("inc/footer.php"); ?>