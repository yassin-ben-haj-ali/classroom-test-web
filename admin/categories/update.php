<?php
session_start();
$idc = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
include "../../inc/functions.php";
$conn = connect();
$req = "UPDATE categories SET name='$name',description='$description' WHERE  id='$idc'";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?update=ok');
}

?>