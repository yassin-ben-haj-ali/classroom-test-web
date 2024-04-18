<?php
session_start();
$idp = $_GET['id'];
include "../../inc/functions.php";
$conn = connect();
$req = "DELETE FROM products WHERE id='$idp'";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?delete=ok');
}

?>