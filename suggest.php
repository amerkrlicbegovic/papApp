<?php
$pageTitle = "Suggest a media Item";
$section = "suggest";
include("inc/header.php"); ?>

<div class="section page">
    <div class="wrapper">
        <h1>Suggest a media Item</h1>
        <p>if you thing there is something I&rsqou;m missin, let me know! Complete the form to send me an email.</p>
        <form action="process.php" method="post">
            <table>
                <tr>
                    <th><label for="name">Name</label></th>
                    <td><input type="text" id="name" name="name"/></td>
                </tr>
                <tr>
                    <th><label for="email">Emal</label></th>
                    <td><input type="text" id="email" name="email"/></td>
                </tr>
                <tr>
                    <th><label for="details">Suggest Item Details</label></th>
                    <td><textarea name="details" id="details"></textarea></td>
                </tr>
            </table>

            <input type="submit" value="Send"/>
        </form>
    </div>
</div>

<?php include("inc/footer.php"); ?>
