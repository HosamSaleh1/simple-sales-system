<?php
$title = 'ADD User';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/User.php';

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
        <?php if (isset($message)) {
          echo $message;
        }?>
        <div class="form-group">
          <label for="">إسم العميل</label>
          <input type="text" class="form-control" name="name_ar" placeholder="من فضلك أدخل اﻹسم" value="<?php if($_POST) {echo $_POST['name_ar'];} ?>">
        </div>
        <div class="form-group text-left">
          <label for="">Client Name</label>
          <input type="text" class="form-control" name="name_en" placeholder="Please Enter The Full Name" value="<?php if($_POST) {echo $_POST['name_en'];} ?>">
        </div>
        <div class="form-group">
          <label for="">الرقم الضريبي</label>
          <input type="text" class="form-control" name="tax_num" placeholder="من فضلك أدخل الرقم الضريبي" value="<?php if($_POST) {echo $_POST['tax_num'];} ?>">
        </div>
        <div class="form-group">
          <label for="">العنوان</label>
          <input type="text" class="form-control" name="address" placeholder="من فضلك أدخل العنوان بالتفصيل" value="<?php if($_POST) {echo $_POST['address'];} ?>">
        </div>
        <div class="form-group">
          <label for="">رقم الهاتف</label>
          <input type="number" class="form-control" name="phone" placeholder="من فضلك أدخل رقم التليفون" value="<?php if($_POST) {echo $_POST['phone'];} ?>">
        </div>
        <div class="form-group">
          <label for="">البريد الإلكتروني</label>
          <input type="email" class="form-control" name="email" placeholder="من فضلك أدخل البريد اﻹلكتروني" value="<?php if($_POST) {echo $_POST['email'];} ?>">
        </div>
        <button type='submit' class='btn btn-primary btn-block'>عميل جديد</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once 'layouts/footer.php';
?>