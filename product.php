<?php
$title = 'ADD Product';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/Product.php';

$fill = True;

if ($_POST) {
    $productObject = new Product;
    $requiredResult = $productObject->fieldRequired($_POST['name_ar'], $_POST['name_en'], $_POST['desc_ar'], $_POST['desc_en'], $_POST['price'], $_POST['barcode']);
    if ($requiredResult) {
        $message = $requiredResult['required'];
    } else {
        $productObject->setName_ar($_POST['name_ar'])->setName_en($_POST['name_en'])
            ->setDesc_ar($_POST['desc_ar'])->setDesc_en($_POST['desc_en'])
            ->setPrice($_POST['price'])->setBarcode($_POST['barcode']);
        $barcodeResult = $productObject->checkIfBarcodeExist();
        if ($barcodeResult) {
            $message = "<div class='alert alert-danger text-center'>This Barcode Is Already Exist</div>";
        }
        if (empty($message)) {
            $addResult = $productObject->create();
            if (!$addResult) {
                $message = "<div class='alert alert-danger text-center'>SomeThing Went Wrong</div>";
            } else {
                $message = "<div class='alert alert-success text-center'>The Product Added Successfuly</div>";
                $fill = False;
            }
        }
    }
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3 text-right">
            <form method="POST">
                <?php if (isset($message)) {
                    echo $message;
                } ?>
                <div class="form-group">
                    <label for="">إسم المنتج</label>
                    <input type="text" class="form-control" name="name_ar" placeholder="من فضلك أدخل اﻹسم" value="<?php if ($_POST && $fill) {
                                                                                                                        echo $_POST['name_ar'];
                                                                                                                    } ?>">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name_en" placeholder="Please Enter The Full Name" value="<?php if ($_POST && $fill) {
                                                                                                                                echo $_POST['name_en'];
                                                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label for="">وصف المنتج</label>
                    <input type="text" class="form-control" name="desc_ar" placeholder="من فضلك أدخل التفاصيل" value="<?php if ($_POST && $fill) {
                                                                                                                            echo $_POST['desc_ar'];
                                                                                                                        } ?>">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Description</label>
                    <input type="text" class="form-control" name="desc_en" placeholder="Please Enter The Description" value="<?php if ($_POST && $fill) {
                                                                                                                                    echo $_POST['desc_en'];
                                                                                                                                } ?>">
                </div>
                <div class="form-group">
                    <label for="">سعر المنتج</label>
                    <input type="number" class="form-control" name="price" placeholder="من فضلك أدخل السعر" value="<?php if ($_POST && $fill) {
                                                                                                                        echo $_POST['price'];
                                                                                                                    } ?>">
                </div>
                <div class="form-group">
                    <label for="">الباركود</label>
                    <input type="text" class="form-control" name="barcode" placeholder="من فضلك أدخل الباركود" value="<?php if ($_POST && $fill) {
                                                                                                                            echo $_POST['barcode'];
                                                                                                                        } ?>">
                </div>
                <button type='submit' class='btn btn-primary btn-block'>صنف جديد</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once 'layouts/footer.php';
?>