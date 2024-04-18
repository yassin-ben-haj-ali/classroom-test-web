<?php

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$idp = $_POST['id'];
$updatedAt = date('Y-m-d');

if (isset($_files['image'])) {
    $target_dir = "../../images/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $_FILES["image"]["name"];
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$createdAt = date('Y-m-d');

include "../../inc/functions.php";
$conn = connect();
$req = "UPDATE products SET name='$name',description='$description',price='$price','category'='$category','updatedAt'='$updatedAt' WHERE  id='$idp'";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?update=ok');
}
?>