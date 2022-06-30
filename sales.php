<?php
$title = 'Sales';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';



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
                    <input type="datetime-local" class="form-control" name="date_time" placeholder="من فضلك أدخل التاريخ والوقت">
                </div>
                <div class="form-group">
                    <label for="">الكميه</label>
                    <input type="number" class="form-control" name="quantity" placeholder="من فضلك أدخل الكميه المطلوبه">
                </div>
                <div class="form-group">
                    <label for="">الضريبه</label>
                    <input type="number" class="form-control" name="tex" placeholder="من فضلك أدخل نسبة الضريبه">
                </div>
                <div class="form-group">
                    <label for="">قيمة الضريبه</label>
                    <input type="number" class="form-control" name="tax_price" placeholder="قيمة الضريبه">
                </div>
                <div class="form-group">
                    <label for="">المبلغ المدفوع</label>
                    <input type="number" class="form-control" name="paid" placeholder="من فضلك أدخل المبلغ المدفوع">
                </div>
                <div class="form-group">
                    <label for="">المبلغ المتبقي</label>
                    <input type="number" class="form-control" name="charge" placeholder="من فضلك أدخل المبلغ المتبقي">
                </div>
                <button type='submit' class='btn btn-primary btn-block'>أتمم الشراء</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once 'layouts/footer.php';
?>