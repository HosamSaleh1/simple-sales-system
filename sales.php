<?php
$title = 'Sales';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/Sales.php';
include_once 'app/database/models/User.php';
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
                  <label for="">إسم العميل</label>
                  <select multiple class="form-control" name="user_id">
                    <option></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">إسم المنتج</label>
                  <select multiple class="form-control" name="product_id">
                    <option></option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">التاريخ والوقت</label>
                    <input type="datetime-local" class="form-control" name="date_time" placeholder="من فضلك أدخل التاريخ والوقت" value="<?php if($_POST) {echo $_POST['date-time'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">الكميه</label>
                    <input type="number" class="form-control" name="quantity" placeholder="من فضلك أدخل الكميه المطلوبه" value="<?php if($_POST) {echo $_POST['quantity'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">الضريبه</label>
                    <input type="number" class="form-control" name="tax" placeholder="من فضلك أدخل نسبة الضريبه" value="<?php if($_POST) {echo $_POST['tax'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">قيمة الضريبه</label>
                    <input type="number" class="form-control" name="tax_price" placeholder="قيمة الضريبه" value="<?php if($_POST) {echo $_POST['tax_price'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">المبلغ المدفوع</label>
                    <input type="number" class="form-control" name="paid" placeholder="من فضلك أدخل المبلغ المدفوع" value="<?php if($_POST) {echo $_POST['paid'];} ?>">
                </div>
                <div class="form-group">
                    <label for="">المبلغ المتبقي</label>
                    <input type="number" class="form-control" name="charge" placeholder="من فضلك أدخل المبلغ المتبقي" value="<?php if($_POST) {echo $_POST['charge'];} ?>">
                </div>
                <button type='submit' class='btn btn-primary btn-block'>أتمم الشراء</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once 'layouts/footer.php';
?>