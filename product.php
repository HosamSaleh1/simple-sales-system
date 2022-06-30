<?php
$title = 'ADD Product';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/Product.php';

if ($_POST) {
    $userObject = new User;
    $requiredResult = $userObject->fieldRequired($_POST['name_ar'], $_POST['name_en'], $_POST['tax_num'], $_POST['address'], $_POST['phone'], $_POST['email']);
    if ($requiredResult) {
      $message = $requiredResult['required'];
    } else {
      $fieldPatternResult = $userObject->fieldPattern($_POST['email'], "Email");
      if ($fieldPatternResult) {
        $message = $fieldPatternResult['pattern'];
      }
      $userObject->setName_ar($_POST['name_ar'])->setName_en($_POST['name_en'])
        ->setTax_num($_POST['tax_num'])->setAddress($_POST['address'])
        ->setPhone($_POST['phone'])->setEmail($_POST['email']);
      $emailResult = $userObject->checkIfEmailExist();
      if ($emailResult) {
        $message = "<div class='alert alert-danger text-center'>This Email Is Already Exist</div>";
      }
      $phoneResult = $userObject->checkIfPhoneExist();
      if ($phoneResult) {
        $message = "<div class='alert alert-danger text-center'>This Phone Is Already Exist</div>";
      }
      $taxResult = $userObject->checkIfTaxNumExist();
      if ($taxResult) {
        $message = "<div class='alert alert-danger text-center'>This Tax Number Is Already Exist</div>";
      }
      if (empty($message)) {
        $addResult = $userObject->create();
        print_r($addResult);die;
        if (!$addResult) {
          $message = "<div class='alert alert-danger text-center'>SomeThing Went Wrong</div>";
        } else {
          $message = "<div class='alert alert-danger text-center'>The Client Added Successfuly</div>";
        }
      }
    }
  }
  
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3 text-right">
            <form method="POST">
                <div class="form-group">
                    <label for="">إسم المنتج</label>
                    <input type="text" class="form-control" name="name_ar" placeholder="من فضلك أدخل اﻹسم" value="<?php if($_POST) {echo $_POST['name_ar'];} ?>">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name_en" placeholder="Please Enter The Full Name" value="<?php if($_POST) {echo $_POST['name_en'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">وصف المنتج</label>
                    <input type="text" class="form-control" name="desc_ar" placeholder="من فضلك أدخل التفاصيل" value="<?php if($_POST) {echo $_POST['desc_ar'];} ?>">
                </div>
                <div class="form-group text-left">
                    <label for="">Product Description</label>
                    <input type="text" class="form-control" name="desc_en" placeholder="Please Enter The Description" value="<?php if($_POST) {echo $_POST['desc_en'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">سعر المنتج</label>
                    <input type="number" class="form-control" name="price" placeholder="من فضلك أدخل السعر" value="<?php if($_POST) {echo $_POST['price'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">الباركود</label>
                    <input type="text" class="form-control" name="barcode" placeholder="من فضلك أدخل الباركود" value="<?php if($_POST) {echo $_POST['barcode'];} ?>">
                </div>
                <button type='submit' class='btn btn-primary btn-block'>صنف جديد</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once 'layouts/footer.php';
?>