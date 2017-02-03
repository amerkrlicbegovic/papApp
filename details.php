<?php
include("inc/data.php");
include("inc/functions.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($catalog[$id])) {
        $item = $catalog[$id];
    }
}

if (!isset($item)) {
    header("location:catalog.php");
    exit;
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>

<div class="section page">

    <div class="wrapper">

        <div class="breadcrumbs">
            <a href="catalog.php">Full Catalog</a>&gt;
            <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>">
                <?php echo $item["category"]; ?></a>
            &gt;<?php echo $item["title"]; ?>
        </div>

        <div class="media-picture">

            <span>

                <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>"/>

            </span>
        </div>
        <div class="media-details">

            <h1><?php echo $item["title"]; ?></h1>
            <table>
                <tr>
                    <td>Catagory</td>
                    <td><?php echo $item["category"]; ?></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><?php echo $item["genre"]; ?></td>
                </tr>
                <tr>
                    <td>Format</td>
                    <td><?php echo $item["format"]; ?></td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><?php echo $item["year"]; ?></td>
                </tr>
                <?php if (strtolower($item["category"]) == "books") { ?>
                    <tr>
                        <td>Authors</td>
                        <td><?php echo implode(", ", $item["authors"]); ?></td>
                    </tr>
                    <tr>
                        <td>Publisher</td>
                        <td><?php echo $item["publisher"]; ?></td>
                    </tr>
                    <tr>
                        <td>ISBN</td>
                        <td><?php echo $item["isbn"]; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>

    </div>

</div>

