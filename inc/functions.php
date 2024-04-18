<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=e-shop", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function getAllCategories()
{

    $conn = connect();

    $req = "SELECT * FROM categories";
    $res = $conn->query($req);
    $categories = $res->fetchAll();

    return $categories;

}

function getAllProducts()
{
    $conn = connect();

    $req = "SELECT * FROM products";
    $res = $conn->query($req);
    $products = $res->fetchAll();

    return $products;

}


function searchProducts($keyword)
{
    $conn = connect();

    $req = "SELECT * FROM products WHERE name LIKE '%$keyword%' ";
    $res = $conn->query($req);
    $products = $res->fetchAll();

    return $products;

}


function getProductById($id)
{
    $conn = connect();

    $req = "SELECT * FROM products WHERE id=$id";
    $res = $conn->query($req);
    $product = $res->fetch();

    return $product;

}


function addVisitor($data)
{
    $conn = connect();

    $req = "INSERT INTO visitors(email,password,firstName,lastName,phone) VALUES ('".$data["email"]."','".$data["password"]."','".$data["firstName"]."','".$data["lastName"]."','".$data["phone"]."')";
    $res = $conn->query($req);
    if($res){
return true;
    }else{
        return false;
    }


}

?>