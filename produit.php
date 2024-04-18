<?php


include "inc/functions.php";

$categories = getAllCategories();

if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!--start nav-->
    <?php
    include "inc/header.php";
    ?>
    <!--end nav-->
    <div class="row col-12 mt-4">
        <div class="card col-8 offset-2">
            <img src="images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name'] ?></h5>
                <p class="card-text"><?php echo $product['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $product['price'] ?></li>
                <li class="list-group-item"><?php echo $product['category'] ?></li>
            </ul>
        </div>
    </div>
    <!--start footer-->
    <div class="bg-dark text-center p-5 mt-4">
        <p class="text-white">all rights reserved 2024</p>
    </div>
    <!--end footer-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>