<?php
session_start();
$name = $_POST['name'];
$description = $_POST['description'];
$creator = $_SESSION['id'];
include "../../inc/functions.php";
$conn = connect();
$req = "INSERT INTO categories(name,description,creator) VALUES ('" . $name . "','" . $description . "','" . $creator . "')";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?ajout=ok');
}

?>