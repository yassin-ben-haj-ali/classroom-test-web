<?php

session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
include "../../inc/functions.php";

$products = getAllProducts();
$categories = getAllCategories();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>


    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <?php include "../template/navigation.php" ?>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="../profile.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="list.php">
                                <span data-feather="shopping-cart"></span>
                                products<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../categories/list.php">
                                <span data-feather="file"></span>
                                categories
                            </a>
                        </li>


                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <div class="d-flex justify-content-between">
                    <div>
                        <h2>products list</h2>

                    </div>
                    <div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">create</a>
                    </div>
                </div>
                <?php
                if ((isset($_GET['ajout'])) && $_GET['ajout'] == "ok") {
                    print ' <div class="alert alert-success">
                              product created with success
                          </div>';
                }
                ?>

                <?php
                if ((isset($_GET['delete'])) && $_GET['delete'] == "ok") {
                    print ' <div class="alert alert-success">
                              product deleted with success
                          </div>';
                }
                ?>

                <?php
                if ((isset($_GET['update'])) && $_GET['update'] == "ok") {
                    print ' <div class="alert alert-success">
                              product updated with success
                          </div>';
                }
                ?>


                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>price</th>
                                <th>image</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) {
                                print '<tr>
<td>' . $product['id'] . '</td>
<td>' . $product['name'] . '</td>
<td>' . $product['description'] . '</td>
<td>' . $product['price'] . '</td>
<td><img src="../images/' . $product['image'] . '" /></td>


<td><a href="update.php" data-toggle="modal" data-target="#editModal' . $product['id'] . '" class="btn btn-success">update</a> <a href="delete.php?id=' . $product['id'] . '" class="btn btn-danger" >delete</a></td>
 </tr>';
                            }
                            ; ?>

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <!-- create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="create.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="product name" />
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control"
                                placeholder="product description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" step="0.01" name="price" class="form-control"
                                placeholder="product price" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" placeholder="product image" />
                        </div>
                        <div class="form-group">
                            <select name="category" class="form-control">
                                <?php foreach ($categories as $category) {
                                    print '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                }
                                ; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <?php foreach ($products as $product) { ?>
        <!-- update Modal -->
        <div class="modal fade" id="editModal<?php echo $product['id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">update product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="update.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>" class="form-control"
                                placeholder="product id" />
                            <div class="form-group">
                                <input type="text" name="name" value="<?php echo $product['name'] ?>" class="form-control"
                                    placeholder="product name" />
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control"
                                    placeholder="product description"><?php echo $product['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="<?php echo $product['price'] ?>" placeholder="product price" />
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" placeholder="product image" />
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <?php foreach ($categories as $category) {
                                        print '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                    }
                                    ; ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

</body>

</html>