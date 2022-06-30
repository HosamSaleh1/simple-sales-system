<?php
$title = 'ADD Product';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';



?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3 text-right">
            <form method="POST">
                <div class="form-group">
                    <label for="">إسم المنتج</label>
                    <input type="text" class="form-control" name="name_ar" placeholder="من فضلك أدخل اﻹسم">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name_en" placeholder="Please Enter The Full Name">
                </div>
                <div class="form-group">
                    <label for="">وصف المنتج</label>
                    <input type="text" class="form-control" name="desc_ar" placeholder="من فضلك أدخل التفاصيل">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Description</label>
                    <input type="text" class="form-control" name="desc_en" placeholder="Please Enter The Description">
                </div>
                <div class="form-group">
                    <label for="">سعر المنتج</label>
                    <input type="number" class="form-control" name="price" placeholder="من فضلك أدخل السعر">
                </div>
                <div class="form-group">
                    <label for="">الباركود</label>
                    <input type="text" class="form-control" name="barcode" placeholder="من فضلك أدخل الباركود">
                </div>
                <button type='submit' class='btn btn-primary btn-block'>صنف جديد</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once 'layouts/footer.php';
?>