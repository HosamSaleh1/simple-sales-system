<?php
$title = 'ADD User';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/User.php';

$fill = True;

if ($_POST) {
  $userObject = new User;
  $requiredResult = $userObject->fieldRequired($_POST['name_ar'], $_POST['name_en'], $_POST['tax_num'], $_POST['address'], $_POST['phone'], $_POST['email']);
  if ($requiredResult) {
    $message = $requiredResult['required'];
  } else {
    $fieldPatternResult = $userObject->fieldPattern($_POST['email'], "Email");
    if ($fieldPatternResult) {
      $message = $fieldPatternResult['pattern'];
    } else {
      $userObject->setName_ar($_POST['name_ar'])->setName_en($_POST['name_en'])
        ->setTax_num($_POST['tax_num'])->setAddress($_POST['address'])
        ->setPhone($_POST['phone'])->setEmail($_POST['email']);
      $emailResult = $userObject->checkIfEmailExist();
      if ($emailResult) {
        $message = "<div class='alert alert-danger text-center'>This Email Is Already Exist</div>";
      } else {
        $phoneResult = $userObject->checkIfPhoneExist();
        if ($phoneResult) {
          $message = "<div class='alert alert-danger text-center'>This Phone Is Already Exist</div>";
        } else {
          $taxResult = $userObject->checkIfTaxNumExist();
          if ($taxResult) {
            $message = "<div class='alert alert-danger text-center'>This Tax Number Is Already Exist</div>";
          } else {
            $addResult = $userObject->create();
            if (!$addResult) {
              $message = "<div class='alert alert-danger text-center'>SomeThing Went Wrong</div>";
            } else {
              $message = "<div class='alert alert-success text-center'>The Client Added Successfuly</div>";
              $fill = False;
            }
          }
        }
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
          <label for="">?????? ????????????</label>
          <input type="text" class="form-control" name="name_ar" placeholder="???? ???????? ???????? ?????????" value="<?php if ($_POST && $fill) {
                                                                                                          echo $_POST['name_ar'];
                                                                                                        } ?>">
        </div>
        <div class="form-group text-left">
          <label for="">Client Name</label>
          <input type="text" class="form-control" name="name_en" placeholder="Please Enter The Full Name" value="<?php if ($_POST && $fill) {
                                                                                                                    echo $_POST['name_en'];
                                                                                                                  } ?>">
        </div>
        <div class="form-group">
          <label for="">?????????? ??????????????</label>
          <input type="text" class="form-control" name="tax_num" placeholder="???? ???????? ???????? ?????????? ??????????????" value="<?php if ($_POST && $fill) {
                                                                                                                    echo $_POST['tax_num'];
                                                                                                                  } ?>">
        </div>
        <div class="form-group">
          <label for="">??????????????</label>
          <input type="text" class="form-control" name="address" placeholder="???? ???????? ???????? ?????????????? ????????????????" value="<?php if ($_POST && $fill) {
                                                                                                                      echo $_POST['address'];
                                                                                                                    } ?>">
        </div>
        <div class="form-group">
          <label for="">?????? ????????????</label>
          <input type="number" class="form-control" name="phone" placeholder="???? ???????? ???????? ?????? ????????????????" value="<?php if ($_POST && $fill) {
                                                                                                                  echo $_POST['phone'];
                                                                                                                } ?>">
        </div>
        <div class="form-group">
          <label for="">???????????? ????????????????????</label>
          <input type="email" class="form-control" name="email" placeholder="???? ???????? ???????? ???????????? ???????????????????" value="<?php if ($_POST && $fill) {
                                                                                                                      echo $_POST['email'];
                                                                                                                    } ?>">
        </div>
        <button type='submit' class='btn btn-primary btn-block'>???????? ????????</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once 'layouts/footer.php';
?>