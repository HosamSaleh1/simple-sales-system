<?php
$title = 'Sales';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/Sales.php';
include_once 'app/database/models/User.php';
include_once 'app/database/models/Product.php';

$fill = True;

$userObject = new User;
$userData = $userObject->read();
if (empty($userData)) {
  $message = "<div class='alert alert-danger text-center'>There's No Users Exist.<br> Please add User first.</div>";
} else {
  $users = $userData->fetch_all(MYSQLI_ASSOC);
  // echo "<pre>";
  // print_r($users);die;
}

$productObject = new Product;
$productData = $productObject->read();
if (empty($productData)) {
  $message = "<div class='alert alert-danger text-center'>There's No Products Exist.<br> Please add Product first.</div>";
} else {
  $products = $productData->fetch_all(MYSQLI_ASSOC);
  $jsProducts = json_encode($products);
}

if ($_POST) {
  $salesObject = new Sales;
  $requiredResult = $salesObject->fieldRequired($_POST['user_id'], $_POST['product_id'], $_POST['date_time'], $_POST['quantity'], $_POST['tax'], $_POST['tax_price'], $_POST['paid'], $_POST['charge']);
  if ($requiredResult) {
    $message = $requiredResult['required'];
  } else {
    $salesObject->setUser_id($_POST['user_id'])->setProduct_id($_POST['product_id'])->setDate_time($_POST['date_time'])
      ->setQuantity($_POST['quantity'])->setTax($_POST['tax'])->setTax_price($_POST['tax_price'])->setPaid($_POST['paid'])->setCharge($_POST['charge']);
    $addResult = $salesObject->create();
    if (!$addResult) {
      $message = "<div class='alert alert-danger text-center'>SomeThing Went Wrong</div>";
    } else {
      $message = "<div class='alert alert-success text-center'>The Sales Info Added Successfuly</div>";
      $fill = False;
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
          <label for="">إسم العميل</label>
          <select class="form-control" name="user_id" id='user'>
            <?php if (!empty($users)) {
              foreach ($users as $key => $user) {
                echo  "<option value='$user[id]'>$user[name_en]</option>";
              }
            }

            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">إسم المنتج</label>
          <select class="form-control" name="product_id" id='product' onchange="showProduct(this.value)">
            <?php if (!empty($products)) {
              foreach ($products as $key => $product) {
                echo  "<option value='$product[id]'>$product[name_en]</option>";
              }
            }

            ?> </select>
        </div>
        <div class="form-group">
          <label for="">التاريخ والوقت</label>
          <input type="datetime-local" class="form-control" name="date_time" placeholder="من فضلك أدخل التاريخ والوقت" value="<?php if ($_POST && $fill) {
                                                                                                                                echo $_POST['date-time'];
                                                                                                                              } ?>">
        </div>
        <div class="form-group">
          <label for="">الكميه</label>
          <input type="text" class="form-control" name="quantity" id='quantity' onkeyup="changeQuantity(this.value)" placeholder="من فضلك أدخل الكميه المطلوبه" value="<?php if ($_POST && $fill) {
                                                                                                                        echo $_POST['quantity'];
                                                                                                                      } ?>">
        </div>
        <div class="form-group">
          <label for="">الضريبه</label>
          <input type="text" class="form-control" name="tax" id='tax' onkeyup="changeTax(this.value)" value="<?php if ($_POST && $fill) {
                                                                                            echo $_POST['tax'];
                                                                                          } ?>">
        </div>
        <div class="form-group">
          <label for="">قيمة الضريبه</label>
          <input type="text" class="form-control" name="tax_price" id='tax_price' placeholder="قيمة الضريبه" value="<?php if ($_POST && $fill) {
                                                                                                          echo $_POST['tax_price'];
                                                                                                        } ?>">
        </div>
        <div class="form-group">
          <label for="">المبلغ المدفوع</label>
          <input type="text" class="form-control" name="paid" id='paid' placeholder="من فضلك أدخل المبلغ المدفوع" value="<?php if ($_POST && $fill) {
                                                                                                                    echo $_POST['paid'];
                                                                                                                  } ?>">
        </div>
        <div class="form-group">
          <label for="">المبلغ المتبقي</label>
          <input type="text" class="form-control" name="charge" id='charge' placeholder="من فضلك أدخل المبلغ المتبقي" value="<?php if ($_POST && $fill) {
                                                                                                                      echo $_POST['charge'];
                                                                                                                    } ?>">
        </div>
        <button type='submit' class='btn btn-primary btn-block'>أتمم الشراء</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once 'layouts/footer.php';
?>

<script src="assets/js/productDetails.js"></script>