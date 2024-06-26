<?php
session_start();
if (isset($_SESSION['firstName'])) {
    header('location:profile.php');
}
include "inc/functions.php";

$categories = getAllCategories();
$showRegistrationAlert = 0;
if (!empty($_POST)) {
    if (addVisitor($_POST)) {
        $showRegistrationAlert = 1;
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.min.css"
        integrity="sha512-OWGg8FcHstyYFwtjfkiCoYHW2hG3PDWwdtczPAPUcETobBJOVCouKig8rqED0NMLcT9GtE4jw6IT1CSrwY87uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--start nav-->
    <?php
    include "inc/header.php";
    ?>
    <!--end nav-->

    <div class="col-12 p-5">
        <h1 class="text-center">Register</h1>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">firstName</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="firstName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">lastName</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="lastName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"
    integrity="sha512-ziDG00v9lDjgmzxhvyX5iztPHpSryN/Ct/TAMPmMmS2O3T1hFPRdrzVCSvwnbPbFNie7Yg5mF7NUSSp5smu7RA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
if ($showRegistrationAlert == 1) {
    print '<script>
        Swal.fire({
            title: "success",
            text: "Account Created with success!",
            icon: "success",
            confirmButtonText:"ok",
            timer:"2000"
          });
        </script>';
}

?>

</html>