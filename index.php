<?php
$title = 'Home';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';


?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <button type='button' class='btn btn-outline-success btn-block' onclick="window.location.href='user.php'">ADD User</button>
            <button type='button' class='btn btn-outline-success btn-block' onclick="window.location.href='product.php'">ADD Product</button>
            <button type='button' class='btn btn-outline-success btn-block' onclick="window.location.href='sales.php'">Buy</button>
        </div>
    </div>
</div>


<?php
include_once 'layouts/footer.php';
?>