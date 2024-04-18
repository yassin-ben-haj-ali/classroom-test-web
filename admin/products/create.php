<?php

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$creator = $_SESSION['id'];



$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
}
$createdAt = date('Y-m-d');

include "../../inc/functions.php";
$conn = connect();
$req = "INSERT INTO products(name,description,price,category,createdAt,creator) VALUES ('" . $name . "','" . $description . "','" . $price . "','" . $category . "','" . $createdAt . "','" . $creator . "')";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?ajout=ok');
}
?>