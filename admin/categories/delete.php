<?php
session_start();
$idc = $_GET['id'];
include "../../inc/functions.php";
$conn = connect();
$req = "DELETE FROM categories WHERE id='$idc'";
$res = $conn->query($req);
if ($res) {
    header('location:list.php?delete=ok');
}

?>