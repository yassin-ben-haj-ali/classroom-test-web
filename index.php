<?php

include "inc/functions.php";

$categories = getAllCategories();

if (!empty($_POST)) {
    $products = searchProducts($_POST['search']);
} else {
    $products = getAllProducts();
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
    <?php
    include "inc/header.php";
    ?>
    <div class="row col-12 mt-3">
        <?php
        foreach ($products as $product) {
            print '<div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $product['name'] . '</h5>
                    <p class="card-text">' . $product['description'] . '</p>
                    <a href="#" class="btn btn-primary">details</a>
                </div>
            </div>
        </div>';
        }

        ?>
    </div>
    <div class="bg-dark text-center p-5 mt-4">
        <p class="text-white">all rights reserved 2024</p>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>